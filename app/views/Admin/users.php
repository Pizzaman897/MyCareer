<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - MyCareer Admin</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-container">
        <!-- SIDEBAR -->
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <h2>MyCareer Admin</h2>
            </div>
            <nav class="sidebar-nav">
                <a href="/admin" class="nav-link">Dashboard</a>
                <a href="/admin/users" class="nav-link active">Users</a>
                <a href="/admin/career-paths" class="nav-link">Career Paths</a>
                <a href="/admin/interests" class="nav-link">Interests</a>
                <a href="/logout" class="nav-link logout">Logout</a>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="admin-main">
            <header class="admin-header">
                <div class="header-title">
                    <h1>Manage Users</h1>
                </div>
                <div class="header-user">
                    <span><?php echo htmlspecialchars($profile['name'] ?? 'Admin', ENT_QUOTES); ?></span>
                </div>
            </header>

            <section class="admin-content">
                <div class="welcome-section">
                    <h2>All Users</h2>
                    <p>Total Users: <strong><?php echo count($users ?? []); ?></strong></p>
                </div>

                <div class="table-section">
                    <?php if (!empty($users)): ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Class</th>
                                <th>School</th>
                                <th>Interests</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rowNumber = 1; ?>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $rowNumber++; ?></td>
                                <td><?php echo htmlspecialchars($user['name'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($user['email'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($user['phone_number'] ?? '-', ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($user['gender'] ?? '-', ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($user['class'] ?? '-', ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($user['school'] ?? '-', ENT_QUOTES); ?></td>
                                <td><span><?php echo htmlspecialchars($user['interests'] ?? 'No interests', ENT_QUOTES); ?></span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="empty-state">
                        <p>No users found.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>

    <style>
        .table-section {
            margin-top: 20px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .data-table thead {
            background-color: #f5f5f5;
            border-bottom: 2px solid #e0e0e0;
        }

        .data-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #333;
        }

        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
            color: #666;
        }

        .data-table tbody tr:hover {
            background-color: #f9f9f9;
        }

        .empty-state {
            padding: 40px;
            text-align: center;
            color: #999;
            background-color: #f5f5f5;
            border-radius: 8px;
        }
    </style>
</body>
</html>
