<?php
namespace App\Controllers;

class RecommendationController
{
    public function recommendations()
    {
        require_once '../app/views/recommendations/recommendations.php';
    }
}

?>