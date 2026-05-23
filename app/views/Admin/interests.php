<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Interests - MyCareer Admin</title>
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
                <a href="/admin/users" class="nav-link">Users</a>
                <a href="/admin/career-paths" class="nav-link">Career Paths</a>
                <a href="/admin/interests" class="nav-link active">Interests</a>
                <a href="/logout" class="nav-link logout">Logout</a>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="admin-main">
            <header class="admin-header">
                <div class="header-title">
                    <h1>Manage Interests</h1>
                </div>
                <div class="header-user">
                    <span><?php echo htmlspecialchars($profile['name'] ?? 'Admin', ENT_QUOTES); ?></span>
                </div>
            </header>

            <section class="admin-content">
                <div class="welcome-section">
                    <h2>All Interests</h2>
                    <p>Total Interests: <strong><?php echo count($interests ?? []); ?></strong></p>
                </div>

                <div class="create-section">
                    <h3>Add New Interest</h3>
                    <p>Tambah interest baru di halaman khusus.</p>
                    <a href="/admin/interests/add" class="action-btn">Add Interest</a>
                </div>

                <div class="interests-container">
                    <?php if (!empty($interests)): ?>
                    <table class="interests-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $interestNumber = 1; ?>
                            <?php foreach ($interests as $interest): ?>
                            <tr>
                                <td><?php echo $interestNumber++; ?></td>
                                <td><?php echo htmlspecialchars($interest['name'], ENT_QUOTES); ?></td>
                                <td>
                                    <a href="/admin/interests/edit/<?php echo htmlspecialchars($interest['id'], ENT_QUOTES); ?>" class="edit-btn">Edit</a>
                                    <form method="post" action="/admin/interests/<?php echo htmlspecialchars($interest['id'], ENT_QUOTES); ?>" onsubmit="return confirm('Hapus interest ini?');" class="inline-form">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="empty-state">
                        <p>No interests found.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>

    <style>
        .interests-container {
            margin-top: 30px;
        }

        .interests-list {
            display: grid;
            grid-template-columns: repeat(8, minmax(0, 1fr));
            gap: 15px;
        }

        .interest-item {
            display: flex;
            justify-content: center;
        }

        .interest-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            width: 100%;
            max-width: 180px;
        }

        .interests-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        .interests-table th,
        .interests-table td {
            border: 1px solid #e0e0e0;
            padding: 12px 15px;
            text-align: left;
        }

        .interests-table th {
            background-color: #f5f5f5;
            font-weight: 600;
            color: #333;
        }

        .interests-table tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        .edit-btn,
        .delete-btn {
            display: inline-block;
            margin-right: 8px;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            cursor: pointer;
        }

        .edit-btn {
            background: #4f46e5;
            color: white;
        }

        .delete-btn {
            background: #ef4444;
            color: white;
            border: none;
        }

        .delete-btn:hover,
        .edit-btn:hover {
            opacity: 0.95;
        }

        .inline-form {
            display: inline-block;
            margin: 0;
        }

        .empty-state {
            padding: 60px 40px;
            text-align: center;
            color: #999;
            background-color: #f5f5f5;
            border-radius: 8px;
        }
    </style>
</body>
</html>
