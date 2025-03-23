<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Session;

class SessionController extends Controller
{
    public function dashboard()
    {
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../auth/login");
            exit();
        }

        $sessionModel = new Session();
        $sessions = $sessionModel->show();
        $sessionsUser = $sessionModel->findByUserID();

        $this->view('pages/dashboard', ['sessions' => $sessions, 'sessionsUser'=> $sessionsUser]);
    }
}
