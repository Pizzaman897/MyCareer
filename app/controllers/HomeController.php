<?php
namespace App\Controllers;

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Student.php';

use App\Core\Controller;
use App\Models\Student;

class HomeController extends Controller


{
    public function home()
    {
        session_start();

        $student = new Student();
        // Block guests (your Student::requireLogin redirects to /signin)
        $student->requireLogin();

        $userPrivateId = $student->getUserPrivateId();
        if (!$userPrivateId) {
            header('Location: /sign-in');
            exit;
        }

        $userInfoId = $student->getUserInfoId($userPrivateId);
        $profile = $student->getProfile($userPrivateId);
        $interests = $userInfoId ? $student->getInterestsByUserInfoId($userInfoId) : [];
        $recommended = $userInfoId ? $student->getRecommendationsByUserInfoId($userInfoId) : [];
        $favoriteIds = $student->getFavoriteIdsByUserPrivateId($userPrivateId);

        $this->view('home.home', [
            'profile' => $profile,
            'interests' => $interests,
            'recommended' => $recommended,
            'favoriteIds' => $favoriteIds,
        ]);
    }
}

