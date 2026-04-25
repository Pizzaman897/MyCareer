<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $this->view('home.home');
    }
}
