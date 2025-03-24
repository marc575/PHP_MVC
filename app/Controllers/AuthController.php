<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Session;
use App\Models\User;
use DateTime;
use DateTimeZone;

class AuthController extends Controller
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $role_id = trim($_POST['role_id']);
            $status = trim($_POST['status']) ? "active" : "inactive";

            $errors = [];

            // Validation des entrées
            if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
                $errors[] = "Tous les champs sont obligatoires.";
            }
            if ($password !== $confirm_password) {
                $errors[] = "Les mots de passe ne correspondent pas.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'email n'est pas valide.";
            }
            if (strlen($password) < 8) {
                $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
            }

            // Vérification de l'existence de l'utilisateur
            $userModel = new User();
            if ($userModel->findByUsername($username)) {
                $errors[] = "Le nom d'utilisateur est déjà pris.";
            }
            if ($userModel->findByEmail($email)) {
                $errors[] = "L'email est déjà utilisé.";
            }

            // Enregistrement de l'utilisateur
            if (empty($errors)) {
                $userModel->create($username, $email, $role_id, $status, $password);
                $_SESSION['message'] = "Enregistrement réussi";
                header("Location: ../auth/login");
            }

            $this->view('auth/register', ['errors' => $errors]);
        } else {
            $this->view('auth/register');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $errors = [];

            // Validation des entrées
            if (empty($email) || empty($password)) {
                $errors[] = "Tous les champs sont obligatoires.";
            }

            if (empty($errors)) {
                $userModel = new User();
                $sessionModel = new Session();
                $user = $userModel->findByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role_id'] = $user['role_id'];
                    $_SESSION['status'] = $user['status'];

                    $sessionModel->create();

                    header("Location: ../users/show");
                } else {
                    $errors[] = "Nom d'utilisateur ou mot de passe incorrect.";
                }
            }

            $this->view('auth/login', ['errors' => $errors]);
        } else {
            $this->view('auth/login');
        }
    }

    public function logout()
    {
        $timezone = new DateTimeZone('GMT+1');
        $logout_time = new DateTime('now', $timezone);
        $logout_time = $logout_time->format('Y-m-d H:i:s');
        $sessionModel = new Session();
        $sessionModel->update($logout_time);

        session_start();
        session_unset();
        session_destroy();
        header("Location: ../auth/login");
    }

    public function show()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../auth/login");
            exit();
        }

        $userModel = new User();

        if (isset($_SESSION['role_id']) && $_SESSION['role_id'] === 1) {
            $users = $userModel->show();
            $this->view('pages/show', ['users' => $users]);
        } elseif(isset($_SESSION['role_id']) && $_SESSION['role_id'] === 2) {
            $user = $userModel->findById($_SESSION['user_id']);
            $this->view('pages/show', ['profil' => $user]);
        } else {
            header("Location: ../auth/login");
        }

    }
    
    public function update()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../auth/login");
            exit();
        }
        
        $id = $_GET['id'];
        $userModel = new User();
        $user = $userModel->findById($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $role_id = $_POST['role_id'] ?? $_SESSION['role_id'];
            if ($_POST['status']) {
                $status = trim($_POST['status']) ? "active" : "inactive";
            } else {
                $status = $_SESSION['status'];
            }

            $errors = [];

            // Validation des entrées
            if (empty($username) || empty($email)) {
                $errors[] = "Tous les champs sont obligatoires.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'email n'est pas valide.";
            }

            // Enregistrement du contact
            if (empty($errors)) {
                $userModel->update($username, $email, $role_id, $status, $id);
                $_SESSION['message'] = "Modification réussie";
                header("Location: ../users/show");
            }

            $this->view('pages/update', ['errors' => $errors]);
        } else {
            $this->view('pages/update', ['user' => $user]);
        }
    }

    public function delete()
    {

        if (!isset($_SESSION['user_id'])) {
            header("Location: ../auth/login");
            exit();
        }

        $id = $_GET['id'];
        $contactModel = new User();
        $contactModel->delete($id);

        $this->view('pages/delete');
    }
}
