<?php
namespace App\Controllers;

use App\Core\Controller;

class Sign_inController extends Controller
{
    public function sign_in()
    {
        $this->view('Login&Register.sign-in');
    }

    public function authenticate()
    {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $remember = isset($_POST['remember']) ? 'checked' : '';
        $slot = $_POST['slot'] ?? '';

        if ($email !== '' && $password !== '') {
            header('Location: /interests');
            exit;
        }

        $message = 'Silakan isi email dan password terlebih dahulu. Fitur login akan terhubung ke database nanti. Data slot sudah disiapkan.';

        $this->view('Login&Register.sign-in', [
            'email' => $email,
            'password' => $password,
            'remember' => $remember,
            'slot' => $slot,
            'message' => $message
        ]);
    }
}
