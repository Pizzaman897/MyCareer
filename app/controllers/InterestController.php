<?php
namespace App\Controllers;

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/Student.php';

use App\Core\Controller;
use App\Core\Database;
use App\Models\Student;

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
        $interestIds = array_values(array_filter(array_map(fn($v) => (int)$v, $interests), fn($v) => $v > 0));
        $interestIds = array_values(array_unique($interestIds));
        $interestIds = array_slice($interestIds, 0, 3);


        $db = new Database();
        $conn = $db->getConnection();

        $interestNames = [];
        if (!empty($interestIds)) {
            $idList = implode(',', array_map('intval', $interestIds));
            $result = mysqli_query($conn, "SELECT id, name FROM interests WHERE id IN ($idList)");
            while ($row = mysqli_fetch_assoc($result)) {
                $interestNames[(int)$row['id']] = $row['name'];
            }
        }

        $_SESSION['career_profile'] = [
            'full_name' => $fullName,
            'class_name' => $className,
            'school_name' => $schoolName,
            'gender' => $gender,
            'interests' => array_values(array_map(fn($id) => $interestNames[$id] ?? '', $interestIds)),
        ];

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

        if (!empty($interestIds)) {
            $insertStmt = mysqli_prepare($conn, 'INSERT INTO user_interests (user_info_id, interest_id) VALUES (?, ?)');
            foreach ($interestIds as $interestId) {
                mysqli_stmt_bind_param($insertStmt, 'ii', $userInfoId, $interestId);
                mysqli_stmt_execute($insertStmt);
            }
            mysqli_stmt_close($insertStmt);
        }

        header('Location: /home');
        exit;
    }

    public function edit()
    {
        session_start();

        $userPrivateId = $_SESSION['user_id'] ?? null;
        if (!$userPrivateId) {
            header('Location: /sign-in');
            exit;
        }

        $student = new Student();
        $userInfoId = $student->getUserInfoId($userPrivateId);
        if (!$userInfoId) {
            header('Location: /personal-information-form');
            exit;
        }

        $db = new Database();
        $conn = $db->getConnection();
        $result = mysqli_query($conn, 'SELECT id, name FROM interests ORDER BY name');
        $interests = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $interests[] = $row;
        }

        $stmt = mysqli_prepare($conn, 'SELECT interest_id FROM user_interests WHERE user_info_id = ?');
        mysqli_stmt_bind_param($stmt, 'i', $userInfoId);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $selectedInterestIds = [];
        while ($row = $res ? mysqli_fetch_assoc($res) : null) {
            if (!$row) break;
            $selectedInterestIds[] = (int)$row['interest_id'];
        }

        $this->view('interests.edit-interests', [
            'interests' => $interests,
            'selectedInterestIds' => $selectedInterestIds,
        ]);
    }

    public function updateInterests()
    {
        session_start();

        $userPrivateId = $_SESSION['user_id'] ?? null;
        if (!$userPrivateId) {
            header('Location: /sign-in');
            exit;
        }

        $student = new Student();
        $userInfoId = $student->getUserInfoId($userPrivateId);
        if (!$userInfoId) {
            header('Location: /personal-information-form');
            exit;
        }

        $rawInterests = $_POST['interests'] ?? [];
        if (!is_array($rawInterests)) {
            $rawInterests = [$rawInterests];
        }

        $interestIds = array_values(array_filter(array_map('intval', $rawInterests), fn($value) => $value > 0));
        $interestIds = array_values(array_unique($interestIds));
        $interestIds = array_slice($interestIds, 0, 3);

        $db = new Database();
        $conn = $db->getConnection();

        $stmt = mysqli_prepare($conn, 'DELETE FROM user_interests WHERE user_info_id = ?');
        mysqli_stmt_bind_param($stmt, 'i', $userInfoId);
        mysqli_stmt_execute($stmt);

        if (!empty($interestIds)) {
            $insertStmt = mysqli_prepare($conn, 'INSERT INTO user_interests (user_info_id, interest_id) VALUES (?, ?)');
            foreach ($interestIds as $interestId) {
                mysqli_stmt_bind_param($insertStmt, 'ii', $userInfoId, $interestId);
                mysqli_stmt_execute($insertStmt);
            }
        }

        $interestMap = [];
        $interestResult = mysqli_query($conn, 'SELECT id, name FROM interests');
        while ($row = mysqli_fetch_assoc($interestResult)) {
            $interestMap[(int)$row['id']] = $row['name'];
        }
        $_SESSION['career_profile']['interests'] = array_values(array_map(fn($id) => $interestMap[$id] ?? '', $interestIds));

        header('Location: /home');
        exit;
    }
}






