<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

class Sign_inController extends Controller
{
    public function sign_in()
    {
        $this->view('Login&Register.sign-in');
    }

    public function authenticate()
    {
        session_start();

        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $remember = isset($_POST['remember']) ? 'checked' : '';
        $slot = $_POST['slot'] ?? '';

        if ($email === '' || $password === '') {
            $message = 'Silakan isi email dan password terlebih dahulu.';
            $this->view('Login&Register.sign-in', [
                'email' => $email,
                'password' => $password,
                'remember' => $remember,
                'slot' => $slot,
                'message' => $message
            ]);
            return;
        }

        $db = new Database();
        $conn = $db->getConnection();

        $stmt = mysqli_prepare($conn, 'SELECT id, password FROM user_private WHERE email = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = $res ? mysqli_fetch_assoc($res) : null;

        if (!$row) {
            $message = 'Email tidak ditemukan.';
            $this->view('Login&Register.sign-in', [
                'email' => $email,
                'password' => $password,
                'remember' => $remember,
                'slot' => $slot,
                'message' => $message
            ]);
            return;
        }

        $hash = $row['password'];
        if (!password_verify($password, $hash)) {
            $message = 'Password salah.';
            $this->view('Login&Register.sign-in', [
                'email' => $email,
                'password' => $password,
                'remember' => $remember,
                'slot' => $slot,
                'message' => $message
            ]);
            return;
        }

        // Session mapping required by your spec
        $_SESSION['user_id'] = (int)$row['id'];

        // If profile not created yet, ask user to complete it
        $stmt = mysqli_prepare($conn, 'SELECT id FROM user_info WHERE user_private_id = ? LIMIT 1');
        $userPrivateId = $_SESSION['user_id'];
        mysqli_stmt_bind_param($stmt, 'i', $userPrivateId);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $hasProfile = $res ? mysqli_fetch_assoc($res) : null;

        // Requirement: if sign-in happens, always go to home.
        // Account creation still goes to the profile completion form.
        if (!$hasProfile || empty($hasProfile['id'])) {
            header('Location: /personal-information-form');
        } else {
            header('Location: /home');
        }
        exit;
    }
}


