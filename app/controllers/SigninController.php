<?php
namespace App\Controllers;

use App\Core\Controller;

class SigninController extends Controller
{
    public function signin()
    {
        $this->view('Signinorout.Signin');
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

        $this->view('Signinorout.Signin', [
            'email' => $email,
            'password' => $password,
            'remember' => $remember,
            'slot' => $slot,
            'message' => $message
        ]);
    }
}
