<?php
namespace App\Controllers;

use App\Core\Controller;

class CreateController extends Controller
{
    public function create()
    {
        $this->view('Signinorout.Create');
    }

    public function store()
    {
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $confirmPassword = trim($_POST['confirm_password'] ?? '');
        $slot = $_POST['slot'] ?? '';

        if ($email !== '' && $phone !== '' && $password !== '' && $confirmPassword !== '') {
            if ($password === $confirmPassword) {
                header('Location: /interests');
                exit;
            } else {
                $message = 'Password tidak cocok. Silakan periksa kembali.';
            }
        } else {
            $message = 'Silakan isi semua field terlebih dahulu. Fitur daftar akan terhubung ke database nanti. Data slot sudah disiapkan.';
        }

        $this->view('Signinorout.Create', [
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
            'confirm_password' => $confirmPassword,
            'slot' => $slot,
            'message' => $message ?? ''
        ]);
    }
}
