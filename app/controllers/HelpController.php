<?php
namespace App\Controllers;

use App\Core\Controller;

class HelpController extends Controller
{
    public function help()
    {
        $this->view('Customer Support.helpcenter');
    }
}
