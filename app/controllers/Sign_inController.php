<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

class Sign_inController extends Controller
{
    public function sign_in()
    {
        session_start();

        if (!empty($_SESSION['user_id'])) {
            header('Location: /home');
            exit;
        }

        $this->view('Login&Register.sign-in');
    }

    public function admin_sign_in()
    {
        session_start();

        if (!empty($_SESSION['is_admin'])) {
            header('Location: /admin');
            exit;
        }

        $this->view('Login&Register.sign-in-admin');
    }

    public function authenticate_admin()
    {
        session_start();

        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $remember = isset($_POST['remember']) ? 'checked' : '';

        if ($email === '' || $password === '') {
            $message = 'Silakan isi email dan password terlebih dahulu.';
            $this->view('Login&Register.sign-in-admin', [
                'email' => $email,
                'remember' => $remember,
                'message' => $message
            ]);
            return;
        }

        $db = new Database();
        $conn = $db->getConnection();

        $adminStmt = mysqli_prepare($conn, 'SELECT id, email FROM admins WHERE email = ? AND password = ? LIMIT 1');
        mysqli_stmt_bind_param($adminStmt, 'ss', $email, $password);
        mysqli_stmt_execute($adminStmt);
        $adminRes = mysqli_stmt_get_result($adminStmt);
        $adminRow = $adminRes ? mysqli_fetch_assoc($adminRes) : null;

        if (!$adminRow) {
            $message = 'Email atau password admin salah.';
            $this->view('Login&Register.sign-in-admin', [
                'email' => $email,
                'remember' => $remember,
                'message' => $message
            ]);
            return;
        }

        unset($_SESSION['user_id']);
        $_SESSION['is_admin'] = true;
        $_SESSION['admin_id'] = (int)$adminRow['id'];
        $_SESSION['admin_name'] = $adminRow['email'];

        header('Location: /admin');
        exit;
    }

    public function authenticate()
    {
        session_start();

        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $remember = isset($_POST['remember']) ? 'checked' : '';

        if ($email === '' || $password === '') {
            $message = 'Silakan isi email dan password terlebih dahulu.';
            $this->view('Login&Register.sign-in', [
                'email' => $email,
                'remember' => $remember,
                'message' => $message
            ]);
            return;
        }

        $db = new Database();
        $conn = $db->getConnection();

        // Check admin credentials first
        $adminStmt = mysqli_prepare($conn, 'SELECT id FROM admins WHERE email = ? AND password = ? LIMIT 1');
        mysqli_stmt_bind_param($adminStmt, 'ss', $email, $password);
        mysqli_stmt_execute($adminStmt);
        $adminRes = mysqli_stmt_get_result($adminStmt);
        $adminRow = $adminRes ? mysqli_fetch_assoc($adminRes) : null;

        if ($adminRow) {
            $_SESSION['user_id'] = 0;
            $_SESSION['is_admin'] = true;
            $_SESSION['admin_id'] = (int)$adminRow['id'];
            header('Location: /admin');
            exit;
        }

        $stmt = mysqli_prepare($conn, 'SELECT id, password FROM user_private WHERE email = ? OR phone_number = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 'ss', $email, $email);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = $res ? mysqli_fetch_assoc($res) : null;

        if (!$row) {
            $message = 'Email atau nomor telepon tidak ditemukan.';
            $this->view('Login&Register.sign-in', [
                'email' => $email,
                'remember' => $remember,
                'message' => $message
            ]);
            return;
        }

        $hash = $row['password'];
        if (!password_verify($password, $hash)) {
            $message = 'Password salah.';
            $this->view('Login&Register.sign-in', [
                'email' => $email,
                'remember' => $remember,
                'message' => $message
            ]);
            return;
        }

        $_SESSION['user_id'] = (int)$row['id'];
        header('Location: /home');
        exit;
    }

    public function logout()
    {
        session_start();
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


