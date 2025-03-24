<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $this->view('pages/home');
    }

    public function notfound()
    {
        $this->view('pages/404');
    }
}
