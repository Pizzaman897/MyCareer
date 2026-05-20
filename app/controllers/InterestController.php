<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

class InterestController extends Controller
{
    // /form page
    public function form()
    {
        {
    $db = new Database();
    $conn = $db->getConnection();
    $result = mysqli_query($conn, 'SELECT id, name FROM interests ORDER BY id');
    $interests = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $interests[] = $row;
    }
    $this->view('interests.personal-information-form', ['interests' => $interests]);
}
    }

    // handle form submit
    public function store()
    {
        session_start();

        $userPrivateId = $_SESSION['user_id'] ?? null;
        if (!$userPrivateId) {
            header('Location: /sign-in');
            exit;
        }

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

        // Keep only up to 3 interests per your spec
        $interests = array_values(array_filter($interests, fn($v) => trim((string)$v) !== ''));
        $interests = array_slice($interests, 0, 3);

        $_SESSION['career_profile'] = [
            'full_name' => $fullName,
            'class_name' => $className,
            'school_name' => $schoolName,
            'gender' => $gender,
            'interests' => $interests,
        ];

        $db = new Database();
        $conn = $db->getConnection();

        // Upsert user_info
        $stmt = mysqli_prepare($conn, 'SELECT id FROM user_info WHERE user_private_id = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 'i', $userPrivateId);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $userInfoIdRow = $res ? mysqli_fetch_assoc($res) : null;

        if ($userInfoIdRow) {
            $userInfoId = (int)$userInfoIdRow['id'];
            $stmt = mysqli_prepare($conn, 'UPDATE user_info SET name = ?, gender = ?, class = ?, school = ? WHERE id = ?');
            $genderVal = $gender !== '' ? $gender : null;
            mysqli_stmt_bind_param($stmt, 'ssssi', $fullName, $genderVal, $className, $schoolName, $userInfoId);
            mysqli_stmt_execute($stmt);
        } else {
            $stmt = mysqli_prepare($conn, 'INSERT INTO user_info (user_private_id, name, gender, class, school) VALUES (?, ?, ?, ?, ?)');
            $genderVal = $gender !== '' ? $gender : null;
            mysqli_stmt_bind_param($stmt, 'issss', $userPrivateId, $fullName, $genderVal, $className, $schoolName);
            mysqli_stmt_execute($stmt);
            $userInfoId = (int)mysqli_insert_id($conn);
        }

        // Replace interests for this user_info (simple approach; spec says up to 3)
        $stmt = mysqli_prepare($conn, 'DELETE FROM user_interests WHERE user_info_id = ?');
        mysqli_stmt_bind_param($stmt, 'i', $userInfoId);
        mysqli_stmt_execute($stmt);

        // Map interest names -> interest_id
        $insertStmt = mysqli_prepare($conn, 'INSERT INTO user_interests (user_info_id, interest_id) VALUES (?, ?)');
        foreach ($interests as $interestName) {
            $interestName = trim((string)$interestName);
            if ($interestName === '') continue;

            $q = mysqli_prepare($conn, 'SELECT id FROM interests WHERE name = ? LIMIT 1');
            mysqli_stmt_bind_param($q, 's', $interestName);
            mysqli_stmt_execute($q);
            $ir = mysqli_stmt_get_result($q);
            $irow = $ir ? mysqli_fetch_assoc($ir) : null;
            if (!$irow) {
                continue; // ignore unknown interests
            }

            $interestId = (int)$irow['id'];
            mysqli_stmt_bind_param($insertStmt, 'ii', $userInfoId, $interestId);
            mysqli_stmt_execute($insertStmt);
        }

        header('Location: /home');
        exit;
    }
    
}






