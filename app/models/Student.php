<?php
namespace App\Models;

require_once __DIR__ . '/../core/Database.php';

use App\Core\Database;

class Student
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function db(): Database
    {
        return $this->db;
    }

    public function isLoggedIn(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return !empty($_SESSION['user_id']);
    }

    public function requireLogin(array $allowedPaths = []): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!empty($_SESSION['user_id'])) {
            return;
        }

        $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        if ($path !== '/' && str_ends_with($path, '/')) {
            $path = rtrim($path, '/');
        }

        // Allowed routes are accessible without login.
        $allowedPaths = $allowedPaths ?: [
            '/',
            '/landing',
            '/signin',
            '/create',
            '/assets',
        ];

        // Guest blocked -> store intended destination and redirect to /signin.
        if (!in_array($path, $allowedPaths, true)) {
            $_SESSION['after_login'] = $path;
            header('Location: /signin');
            exit;
        }
    }

    /**
     * Returns logged-in user_private.id (from $_SESSION['user_id']) or null.
     */
    public function getUserPrivateId(): ?int
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['user_id'] ?? null;
        return $id ? (int)$id : null;
    }

    /**
     * Returns user_info.id for the given user_private_id, or null if not found.
     */
    public function getUserInfoId(int $userPrivateId): ?int
    {
        $conn = $this->db->getConnection();
        $stmt = mysqli_prepare($conn, 'SELECT id FROM user_info WHERE user_private_id = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 'i', $userPrivateId);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = $res ? mysqli_fetch_assoc($res) : null;
        return $row ? (int)$row['id'] : null;
    }

    /**
     * Get profile shown on home page.
     */
    public function getProfile(int $userPrivateId): array
    {
        $conn = $this->db->getConnection();
        $stmt = mysqli_prepare($conn, 'SELECT name, gender, class, school FROM user_info WHERE user_private_id = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 'i', $userPrivateId);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = $res ? mysqli_fetch_assoc($res) : null;

        if (!$row) {
            return [
                'name' => '',
                'gender' => '',
                'class' => '',
                'school' => ''
            ];
        }

        return [
            'name' => $row['name'] ?? '',
            'gender' => $row['gender'] ?? '',
            'class' => $row['class'] ?? '',
            'school' => $row['school'] ?? '',
        ];
    }

    /**
     * Recommendations: must match your spec join.
     */
    public function getRecommendationsByUserInfoId(int $userInfoId): array
    {
        $conn = $this->db->getConnection();
       $recoSql = 'SELECT cp.name, cp.description, cp.more_info, cp.id AS career_path_id FROM user_interests ui JOIN career_path_interests cpi ON ui.interest_id = cpi.interest_id JOIN career_paths cp ON cpi.career_path_id = cp.id WHERE ui.user_info_id = ?';

        $stmt = mysqli_prepare($conn, $recoSql);
        mysqli_stmt_bind_param($stmt, 'i', $userInfoId);
        mysqli_stmt_execute($stmt);
        $recoRes = mysqli_stmt_get_result($stmt);

        $recommended = [];
        while ($row = $recoRes ? mysqli_fetch_assoc($recoRes) : null) {
            if (!$row) break;
            $recommended[] = $row;
        }

        return $recommended;
    }

    /**
     * Favorites state for home buttons.
     * Returns associative array: [career_path_id => true]
     */
    public function getFavoriteIdsByUserPrivateId(int $userPrivateId): array
    {
        $conn = $this->db->getConnection();
        $favStmt = mysqli_prepare($conn, 'SELECT career_path_id FROM favorites WHERE user_private_id = ?');
        mysqli_stmt_bind_param($favStmt, 'i', $userPrivateId);
        mysqli_stmt_execute($favStmt);
        $favRes = mysqli_stmt_get_result($favStmt);

        $favoriteIds = [];
        while ($f = $favRes ? mysqli_fetch_assoc($favRes) : null) {
            if (!$f) break;
            $favoriteIds[(int)$f['career_path_id']] = true;
        }

        return $favoriteIds;
    }

    public function upsertUserInfoAndInterests(array $profile, array $interestNames): void
    {
        session_start();
        $userPrivateId = $_SESSION['user_id'] ?? null;
        if (!$userPrivateId) {
            throw new \RuntimeException('Not authenticated');
        }

        $fullName = trim($profile['full_name'] ?? '');
        $className = trim($profile['class_name'] ?? '');
        $schoolName = trim($profile['school_name'] ?? '');
        $gender = $profile['gender'] ?? '';

        $interests = array_values(array_filter($interestNames, fn($v) => trim((string)$v) !== ''));
        $interests = array_slice($interests, 0, 3);

        $conn = $this->db->getConnection();

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

        // Replace interests
        $stmt = mysqli_prepare($conn, 'DELETE FROM user_interests WHERE user_info_id = ?');
        mysqli_stmt_bind_param($stmt, 'i', $userInfoId);
        mysqli_stmt_execute($stmt);

        $insertStmt = mysqli_prepare($conn, 'INSERT INTO user_interests (user_info_id, interest_id) VALUES (?, ?)');

        foreach ($interests as $interestName) {
            $interestName = trim((string)$interestName);
            if ($interestName === '') continue;

            $q = mysqli_prepare($conn, 'SELECT id FROM interests WHERE name = ? LIMIT 1');
            mysqli_stmt_bind_param($q, 's', $interestName);
            mysqli_stmt_execute($q);
            $ir = mysqli_stmt_get_result($q);
            $irow = $ir ? mysqli_fetch_assoc($ir) : null;
            if (!$irow) continue;

            $interestId = (int)$irow['id'];
            mysqli_stmt_bind_param($insertStmt, 'ii', $userInfoId, $interestId);
            mysqli_stmt_execute($insertStmt);
        }
    }
}



