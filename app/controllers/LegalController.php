<?php
namespace App\Controllers;

use App\Core\Controller;

class LegalController extends Controller
{
    public function privacypolicy()
    {
        $this->view('Legal.privacy-policy');
    }

    public function termsofservice()
    {
        $this->view('Legal.terms-of-service');
    }

    public function cookiespolicy()
    {
        $this->view('Legal.cookies-policy');
    }
}