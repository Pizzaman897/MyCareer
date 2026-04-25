<?php
namespace App\Controllers;

use App\Core\Controller;

class InterestController extends Controller
{
    public function index()
    {
        $this->view('interests.index');
    }
}
