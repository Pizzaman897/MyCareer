<?php
namespace App\Controllers;

use App\Core\Controller;

class MailController extends Controller
{
    public function mail()
    {
        $this->view('Company.mail');
    }

    public function favorite()
    {
        $this->view('Company.favorite');
    }

    public function about_us()
    {
        $this->view('Company.about-us');
    }
}
