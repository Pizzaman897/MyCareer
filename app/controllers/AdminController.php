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

        // Get statistics from database
        $db = new \App\Core\Database();
        $conn = $db->getConnection();

        // Total Users (dari user_private)
        $usersResult = mysqli_query($conn, "SELECT COUNT(*) as count FROM user_private");
        $usersData = mysqli_fetch_assoc($usersResult);
        $totalUsers = $usersData['count'] ?? 0;

        // Total Career Paths
        $careerResult = mysqli_query($conn, "SELECT COUNT(*) as count FROM career_paths");
        $careerData = mysqli_fetch_assoc($careerResult);
        $totalCareerPaths = $careerData['count'] ?? 0;

        // Active Sessions (count dari user_info yang sudah complete profile)
        $sessionsResult = mysqli_query($conn, "SELECT COUNT(*) as count FROM user_info");
        $sessionsData = mysqli_fetch_assoc($sessionsResult);
        $activeSessions = $sessionsData['count'] ?? 0;

        $this->view('admin.dashboard', [
            'profile' => $profile,
            'totalUsers' => $totalUsers,
            'totalCareerPaths' => $totalCareerPaths,
            'activeSessions' => $activeSessions,
        ]);
    }

    public function users()
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

        // Get all users with their info and interests
        $db = new \App\Core\Database();
        $conn = $db->getConnection();

        $query = "SELECT ui.id, ui.name, ui.gender, ui.class, ui.school, up.email, up.phone_number, 
                         GROUP_CONCAT(i.name SEPARATOR ', ') as interests
                  FROM user_info ui 
                  JOIN user_private up ON ui.user_private_id = up.id 
                  LEFT JOIN user_interests usi ON ui.id = usi.user_info_id
                  LEFT JOIN interests i ON usi.interest_id = i.id
                  GROUP BY ui.id
                  ORDER BY ui.id ASC";
        
        $result = mysqli_query($conn, $query);
        $users = [];
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }

        $this->view('admin.users', [
            'profile' => $profile,
            'users' => $users,
        ]);
    }

    public function career_paths()
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

        // Get DB connection
        $db = new \App\Core\Database();
        $conn = $db->getConnection();

        // Handle create career path POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'create_career') {
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $selectedInterests = $_POST['interests'] ?? [];

            if ($name !== '') {
                $stmt = mysqli_prepare($conn, 'INSERT INTO career_paths (name, description) VALUES (?, ?)');
                mysqli_stmt_bind_param($stmt, 'ss', $name, $description);
                mysqli_stmt_execute($stmt);
                $careerId = mysqli_insert_id($conn);
                mysqli_stmt_close($stmt);

                // attach interests
                if (!empty($selectedInterests) && is_array($selectedInterests)) {
                    $insStmt = mysqli_prepare($conn, 'INSERT INTO career_path_interests (career_path_id, interest_id) VALUES (?, ?)');
                    foreach ($selectedInterests as $interestId) {
                        $iid = (int)$interestId;
                        mysqli_stmt_bind_param($insStmt, 'ii', $careerId, $iid);
                        mysqli_stmt_execute($insStmt);
                    }
                    mysqli_stmt_close($insStmt);
                }
            }

            header('Location: /admin/career-paths');
            exit;
        }

        // Get all career paths
        $query = "SELECT id, name, description FROM career_paths ORDER BY id ASC";
        $result = mysqli_query($conn, $query);
        $careerPaths = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $careerPaths[] = $row;
            }
        }

        // also load interests for assignment
        $interestResult = mysqli_query($conn, 'SELECT id, name FROM interests ORDER BY id ASC');
        $availableInterests = [];
        if ($interestResult) {
            while ($r = mysqli_fetch_assoc($interestResult)) {
                $availableInterests[] = $r;
            }
        }

        $this->view('admin.career-paths', [
            'profile' => $profile,
            'careerPaths' => $careerPaths,
            'availableInterests' => $availableInterests,
        ]);
    }

    public function interests()
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

        // Get DB connection
        $db = new \App\Core\Database();
        $conn = $db->getConnection();

        // Handle create interest POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'create_interest') {
            $name = trim($_POST['name'] ?? '');
            if ($name !== '') {
                $stmt = mysqli_prepare($conn, 'INSERT INTO interests (name) VALUES (?)');
                mysqli_stmt_bind_param($stmt, 's', $name);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            header('Location: /admin/interests');
            exit;
        }

        // Get all interests
        $query = "SELECT id, name FROM interests ORDER BY id ASC";
        $result = mysqli_query($conn, $query);
        $interests = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $interests[] = $row;
            }
        }

        $this->view('admin.interests', [
            'profile' => $profile,
            'interests' => $interests,
        ]);
    }

    public function assign()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) {
            header('Location: /sign-in-admin');
            exit;
        }

        $profile = [ 'name' => 'Admin' ];
        if (!empty($_SESSION['admin_name'])) { $profile['name'] = $_SESSION['admin_name']; }

        $db = new \App\Core\Database();
        $conn = $db->getConnection();

        // Handle POST actions: assign_interests, edit_career, edit_interest
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action'])) {
            $action = $_POST['action'];

            if ($action === 'assign_interests') {
                $careerId = (int)($_POST['career_id'] ?? 0);
                $selected = $_POST['interests'] ?? [];

                // remove existing
                $del = mysqli_prepare($conn, 'DELETE FROM career_path_interests WHERE career_path_id = ?');
                mysqli_stmt_bind_param($del, 'i', $careerId);
                mysqli_stmt_execute($del);
                mysqli_stmt_close($del);

                if (!empty($selected) && is_array($selected)) {
                    $ins = mysqli_prepare($conn, 'INSERT INTO career_path_interests (career_path_id, interest_id) VALUES (?, ?)');
                    foreach ($selected as $iid) {
                        $interestId = (int)$iid;
                        mysqli_stmt_bind_param($ins, 'ii', $careerId, $interestId);
                        mysqli_stmt_execute($ins);
                    }
                    mysqli_stmt_close($ins);
                }

                header('Location: /admin/assign');
                exit;
            }

            if ($action === 'edit_career') {
                $id = (int)($_POST['career_id'] ?? 0);
                $name = trim($_POST['name'] ?? '');
                $description = trim($_POST['description'] ?? '');
                if ($id && $name !== '') {
                    $stmt = mysqli_prepare($conn, 'UPDATE career_paths SET name = ?, description = ? WHERE id = ?');
                    mysqli_stmt_bind_param($stmt, 'ssi', $name, $description, $id);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                }
                header('Location: /admin/assign');
                exit;
            }

            if ($action === 'edit_interest') {
                $id = (int)($_POST['interest_id'] ?? 0);
                $name = trim($_POST['name'] ?? '');
                if ($id && $name !== '') {
                    $stmt = mysqli_prepare($conn, 'UPDATE interests SET name = ? WHERE id = ?');
                    mysqli_stmt_bind_param($stmt, 'si', $name, $id);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                }
                header('Location: /admin/assign');
                exit;
            }
        }

        // Load data for page
        $careerPaths = [];
        $res = mysqli_query($conn, 'SELECT id, name, description FROM career_paths ORDER BY id ASC');
        if ($res) { while ($r = mysqli_fetch_assoc($res)) { $careerPaths[] = $r; } }

        $interests = [];
        $res2 = mysqli_query($conn, 'SELECT id, name FROM interests ORDER BY id ASC');
        if ($res2) { while ($r = mysqli_fetch_assoc($res2)) { $interests[] = $r; } }

        $assignMap = [];
        $res3 = mysqli_query($conn, 'SELECT career_path_id, interest_id FROM career_path_interests');
        if ($res3) {
            while ($r = mysqli_fetch_assoc($res3)) {
                $cid = (int)$r['career_path_id'];
                $iid = (int)$r['interest_id'];
                $assignMap[$cid][] = $iid;
            }
        }

        $this->view('admin.assign', [
            'profile' => $profile,
            'careerPaths' => $careerPaths,
            'interests' => $interests,
            'assignMap' => $assignMap,
        ]);
    }

    // --- Interests add/edit pages ---
    public function add_interest()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) { header('Location: /sign-in-admin'); exit; }
        $profile = ['name' => $_SESSION['admin_name'] ?? 'Admin'];
        $this->view('admin.interests_add', [ 'profile' => $profile ]);
    }

    public function store_interest()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) { header('Location: /sign-in-admin'); exit; }
        $db = new \App\Core\Database(); $conn = $db->getConnection();
        $name = trim($_POST['name'] ?? '');
        if ($name !== '') {
            $stmt = mysqli_prepare($conn, 'INSERT INTO interests (name) VALUES (?)');
            mysqli_stmt_bind_param($stmt, 's', $name);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Interest added.'];
            } else {
                $_SESSION['flash'] = ['type' => 'error', 'message' => 'Failed to add interest.'];
            }
            mysqli_stmt_close($stmt);
        }
        header('Location: /admin/interests'); exit;
    }

    public function edit_interest($id)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) { header('Location: /sign-in-admin'); exit; }
        $db = new \App\Core\Database(); $conn = $db->getConnection();
        $id = (int)$id;
        $stmt = mysqli_prepare($conn, 'SELECT id, name FROM interests WHERE id = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $interest = mysqli_fetch_assoc($res);
        mysqli_stmt_close($stmt);
        if (!$interest) { header('Location: /admin/interests'); exit; }
        $profile = ['name' => $_SESSION['admin_name'] ?? 'Admin'];
        $this->view('admin.interests_edit', [ 'profile' => $profile, 'interest' => $interest ]);
    }

    public function update_interest($id)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) { header('Location: /sign-in-admin'); exit; }
        $db = new \App\Core\Database(); $conn = $db->getConnection();
        $id = (int)$id;
        $name = trim($_POST['name'] ?? '');
        if ($id && $name !== '') {
            $stmt = mysqli_prepare($conn, 'UPDATE interests SET name = ? WHERE id = ?');
            mysqli_stmt_bind_param($stmt, 'si', $name, $id);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Interest updated.'];
            } else {
                $_SESSION['flash'] = ['type' => 'error', 'message' => 'Failed to update interest.'];
            }
            mysqli_stmt_close($stmt);
        }
        header('Location: /admin/interests'); exit;
    }

    // --- Career paths add/edit pages ---
    public function add_career()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) { header('Location: /sign-in-admin'); exit; }
        $db = new \App\Core\Database(); $conn = $db->getConnection();
        $interestRes = mysqli_query($conn, 'SELECT id, name FROM interests ORDER BY id ASC');
        $availableInterests = [];
        if ($interestRes) { while ($r = mysqli_fetch_assoc($interestRes)) $availableInterests[] = $r; }
        $profile = ['name' => $_SESSION['admin_name'] ?? 'Admin'];
        $this->view('admin.career_add', [ 'profile' => $profile, 'availableInterests' => $availableInterests ]);
    }

    public function store_career()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) { header('Location: /sign-in-admin'); exit; }
        $db = new \App\Core\Database(); $conn = $db->getConnection();
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $moreInfo = trim($_POST['more_info'] ?? '');
        $selected = $_POST['interests'] ?? [];
        if ($name !== '') {
            $stmt = mysqli_prepare($conn, 'INSERT INTO career_paths (name, description, more_info) VALUES (?, ?, ?)');
            mysqli_stmt_bind_param($stmt, 'sss', $name, $description, $moreInfo);
            if (mysqli_stmt_execute($stmt)) {
                $careerId = mysqli_insert_id($conn);
                if (!empty($selected) && is_array($selected)) {
                    $ins = mysqli_prepare($conn, 'INSERT INTO career_path_interests (career_path_id, interest_id) VALUES (?, ?)');
                    foreach ($selected as $iid) { $iid = (int)$iid; mysqli_stmt_bind_param($ins, 'ii', $careerId, $iid); mysqli_stmt_execute($ins); }
                    mysqli_stmt_close($ins);
                }
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Career path added.'];
            } else {
                $_SESSION['flash'] = ['type' => 'error', 'message' => 'Failed to add career path.'];
            }
            mysqli_stmt_close($stmt);
        }
        header('Location: /admin/career-paths'); exit;
    }

    public function edit_career($id)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) { header('Location: /sign-in-admin'); exit; }
        $db = new \App\Core\Database(); $conn = $db->getConnection();
        $id = (int)$id;
        $stmt = mysqli_prepare($conn, 'SELECT id, name, description, more_info FROM career_paths WHERE id = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $career = mysqli_fetch_assoc($res);
        mysqli_stmt_close($stmt);
        if (!$career) { header('Location: /admin/career-paths'); exit; }
        $interestRes = mysqli_query($conn, 'SELECT id, name FROM interests ORDER BY id ASC');
        $availableInterests = [];
        if ($interestRes) { while ($r = mysqli_fetch_assoc($interestRes)) $availableInterests[] = $r; }
        // load assigned
        $assigned = [];
        $res2 = mysqli_prepare($conn, 'SELECT interest_id FROM career_path_interests WHERE career_path_id = ?');
        mysqli_stmt_bind_param($res2, 'i', $id);
        mysqli_stmt_execute($res2);
        $qres = mysqli_stmt_get_result($res2);
        while ($rr = mysqli_fetch_assoc($qres)) $assigned[] = (int)$rr['interest_id'];
        mysqli_stmt_close($res2);
        $profile = ['name' => $_SESSION['admin_name'] ?? 'Admin'];
        $this->view('admin.career_edit', [ 'profile' => $profile, 'career' => $career, 'availableInterests' => $availableInterests, 'assigned' => $assigned ]);
    }

    public function update_career($id)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) { header('Location: /sign-in-admin'); exit; }
        $db = new \App\Core\Database(); $conn = $db->getConnection();
        $id = (int)$id;
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $moreInfo = trim($_POST['more_info'] ?? '');
        $selected = $_POST['interests'] ?? [];
        if ($id && $name !== '') {
            $stmt = mysqli_prepare($conn, 'UPDATE career_paths SET name = ?, description = ?, more_info = ? WHERE id = ?');
            mysqli_stmt_bind_param($stmt, 'sssi', $name, $description, $moreInfo, $id);
            if (mysqli_stmt_execute($stmt)) {
                // replace assignments
                $del = mysqli_prepare($conn, 'DELETE FROM career_path_interests WHERE career_path_id = ?');
                mysqli_stmt_bind_param($del, 'i', $id);
                mysqli_stmt_execute($del);
                mysqli_stmt_close($del);
                if (!empty($selected) && is_array($selected)) {
                    $ins = mysqli_prepare($conn, 'INSERT INTO career_path_interests (career_path_id, interest_id) VALUES (?, ?)');
                    foreach ($selected as $iid) { $iid = (int)$iid; mysqli_stmt_bind_param($ins, 'ii', $id, $iid); mysqli_stmt_execute($ins); }
                    mysqli_stmt_close($ins);
                }
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Career path updated.'];
            } else {
                $_SESSION['flash'] = ['type' => 'error', 'message' => 'Failed to update career path.'];
            }
            mysqli_stmt_close($stmt);
        }
        header('Location: /admin/career-paths'); exit;
    }

    // --- Delete handlers ---
    public function delete_interest($id)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) { header('Location: /sign-in-admin'); exit; }
        $db = new \App\Core\Database(); $conn = $db->getConnection();
        $id = (int)$id;
        // remove from relation table first
        $delRel = mysqli_prepare($conn, 'DELETE FROM career_path_interests WHERE interest_id = ?');
        mysqli_stmt_bind_param($delRel, 'i', $id);
        mysqli_stmt_execute($delRel);
        mysqli_stmt_close($delRel);
        // delete interest
        $stmt = mysqli_prepare($conn, 'DELETE FROM interests WHERE id = ?');
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Interest deleted.'];
        header('Location: /admin/interests'); exit;
    }

    public function delete_career($id)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) { header('Location: /sign-in-admin'); exit; }
        $db = new \App\Core\Database(); $conn = $db->getConnection();
        $id = (int)$id;
        // remove assignments
        $delRel = mysqli_prepare($conn, 'DELETE FROM career_path_interests WHERE career_path_id = ?');
        mysqli_stmt_bind_param($delRel, 'i', $id);
        mysqli_stmt_execute($delRel);
        mysqli_stmt_close($delRel);
        // delete career path
        $stmt = mysqli_prepare($conn, 'DELETE FROM career_paths WHERE id = ?');
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Career path deleted.'];
        header('Location: /admin/career-paths'); exit;
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
