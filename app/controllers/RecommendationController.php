<?php
namespace App\Controllers;

use App\Core\Controller;

class RecommendationController extends Controller
{
    public function recommendations()
    {
        $this->view('recommendations.recommendations');
    }
}
