<?php
namespace App\Controllers;

use App\Core\Controller;

class LegalController extends Controller
{
    public function privacypolicy()
    {
        $this->view('Legal.privacypolicy');
    }

    public function termsofservice()
    {
        $this->view('Legal.termsofservice');
    }
}