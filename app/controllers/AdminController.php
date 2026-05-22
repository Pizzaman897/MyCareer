<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Student;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) {
            header('Location: /sign-in-admin');
            exit;
        }

        $profile = [
            'name' => 'Admin',
        ];

        if (!empty($_SESSION['admin_name'])) {
            $profile['name'] = $_SESSION['admin_name'];
        }

        $this->view('admin.dashboard', [
            'profile' => $profile,
        ]);
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        session_destroy();

        header('Location: /landing');
        exit;
    }
}
