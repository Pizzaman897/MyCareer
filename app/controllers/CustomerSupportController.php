<?php
namespace App\Controllers;

use App\Core\Controller;

class CustomerSupportController extends Controller
{
    public function help_center()
    {
        $this->view('CustomerSupport/help-center');
    }

    public function faq()
    {
        $this->view('CustomerSupport/faq');
    }

    public function contact()
    {
        $this->view('CustomerSupport/contact');
    }
}
