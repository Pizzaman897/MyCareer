<?php
namespace App\Controllers;

use App\Core\Controller;

class InterestController extends Controller
{
    // /form page
    public function form()
    {
        $this->view('interests.personal-information-form');
    }

    // handle form submit
    public function store()
    {
        session_start();

        $fullName = trim($_POST['full_name'] ?? '');
        $className = trim($_POST['class_name'] ?? '');
        $schoolName = trim($_POST['school_name'] ?? '');
        $gender = $_POST['gender'] ?? '';
        $genderOther = trim($_POST['gender_other'] ?? '');
        $interests = $_POST['interests'] ?? [];

        if ($gender === 'other' && $genderOther !== '') {
            $gender = $genderOther;
        }

        if (!is_array($interests)) {
            $interests = [$interests];
        }

        $_SESSION['career_profile'] = [
            'full_name' => $fullName,
            'class_name' => $className,
            'school_name' => $schoolName,
            'gender' => $gender,
            'interests' => $interests,
        ];

        $this->view('interests.form', [
            'submitted' => true,
            'profile' => $_SESSION['career_profile'],
            'message' => 'Profile information saved successfully.',
        ]);
    }
}



