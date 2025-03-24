<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Session;

class SessionController extends Controller
{
    public function show()
    {
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../auth/login");
            exit();
        }

        $sessionModel = new Session();

        if (isset($_SESSION['role_id']) && $_SESSION['role_id'] === 1) {
            $sessions = $sessionModel->show();
        } elseif(isset($_SESSION['role_id']) && $_SESSION['role_id'] === 2) {
            $sessions = $sessionModel->findByUserID();
        } else {
            $this->view('pages/logs');
        }
        

        $this->view('pages/logs', ['sessions' => $sessions]);
    }
}
