<?php
namespace App\Controllers;

use App\Core\Controller;

class CustomerSupportController extends Controller
{
    public function help()
    {
        $this->view('Customer Support.helpcenter');
    }

    public function faq()
    {
        $this->view('Customer Support.faq');
    }

    public function contact()
    {
        $this->view('Company.contact');
    }
}
