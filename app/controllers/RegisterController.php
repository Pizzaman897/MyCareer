<?php
namespace App\Controllers;

use App\Core\Controller;


class RegisterController extends Controller
{
    public function register()
    {
        $this->view('Login&Register.register');
    }

    public function store()
    {
        session_start();

        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $slot = $_POST['slot'] ?? '';

        // Validate password match first (per requirement)
        if ($password !== '' && $confirmPassword !== '' && $password !== $confirmPassword) {
            $message = 'Password tidak cocok. Silakan periksa kembali.';
            $this->view('Login&Register.register', [
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
                'confirm_password' => $confirmPassword,
                'slot' => $slot,
                'message' => $message,
            ]);
            return;
        }

        if ($email === '' || $phone === '' || $password === '' || $confirmPassword === '') {
            $message = 'Silakan isi semua field terlebih dahulu. Fitur daftar akan terhubung ke database nanti. Data slot sudah disiapkan.';
            $this->view('Login&Register.register', [
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
                'confirm_password' => $confirmPassword,
                'slot' => $slot,
                'message' => $message,
            ]);
            return;
        }



        $db = new \App\Core\Database();
        $conn = $db->getConnection();

        $hash = password_hash($password, PASSWORD_BCRYPT);

        // Create user_private
        $stmt = mysqli_prepare($conn, 'INSERT INTO user_private (email, phone_number, password) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($stmt, 'sss', $email, $phone, $hash);

        if (!mysqli_stmt_execute($stmt)) {
            $message = 'Gagal membuat akun. Email mungkin sudah terdaftar.';
            $this->view('Login&Register.register', [
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
                'confirm_password' => $confirmPassword,
                'slot' => $slot,
                'message' => $message,
            ]);
            return;
        }

        $userPrivateId = (int)mysqli_insert_id($conn);
        $_SESSION['user_id'] = $userPrivateId;



        header('Location: /personal-information-form');
        exit;
    }
}

