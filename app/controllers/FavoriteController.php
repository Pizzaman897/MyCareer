<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

class FavoriteController extends Controller
{
    // POST /favorite/add
    public function add()
    {
        session_start();
        $userPrivateId = $_SESSION['user_id'] ?? null;
        if (!$userPrivateId) {
            header('Location: /sign-in');
            exit;
        }

        $careerPathId = (int)($_POST['career_path_id'] ?? 0);
        if ($careerPathId <= 0) {
            http_response_code(400);
            echo 'Invalid career_path_id';
            exit;
        }

        $db = new Database();
        $conn = $db->getConnection();

        // Insert with ignore for unique constraint (MySQL)
        $stmt = mysqli_prepare($conn, 'INSERT IGNORE INTO favorites (user_private_id, career_path_id) VALUES (?, ?)');
        mysqli_stmt_bind_param($stmt, 'ii', $userPrivateId, $careerPathId);
        mysqli_stmt_execute($stmt);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['ok' => true]);
        exit;
    }

    // POST /favorite/remove
    public function remove()
    {
        session_start();
        $userPrivateId = $_SESSION['user_id'] ?? null;
        if (!$userPrivateId) {
            header('Location: /sign-in');
            exit;
        }

        $careerPathId = (int)($_POST['career_path_id'] ?? 0);
        if ($careerPathId <= 0) {
            http_response_code(400);
            echo 'Invalid career_path_id';
            exit;
        }

        $db = new Database();
        $conn = $db->getConnection();

        $stmt = mysqli_prepare($conn, 'DELETE FROM favorites WHERE user_private_id = ? AND career_path_id = ?');
        mysqli_stmt_bind_param($stmt, 'ii', $userPrivateId, $careerPathId);
        mysqli_stmt_execute($stmt);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['ok' => true]);
        exit;
    }

    // GET /favorite
    public function index()
    {
        session_start();
        $userPrivateId = $_SESSION['user_id'] ?? null;
        if (!$userPrivateId) {
            header('Location: /sign-in');
            exit;
        }

        $db = new Database();
        $conn = $db->getConnection();

        $sql = 'SELECT cp.name, cp.description, cp.more_info, cp.id AS career_path_id
                FROM favorites f
                JOIN career_paths cp ON f.career_path_id = cp.id
                WHERE f.user_private_id = ?';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $userPrivateId);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        $favorites = [];
        while ($row = $res ? mysqli_fetch_assoc($res) : null) {
            if (!$row) break;
            $favorites[] = $row;
        }

        $this->view('Company.favorite', ['favorites' => $favorites]);
    }
}

