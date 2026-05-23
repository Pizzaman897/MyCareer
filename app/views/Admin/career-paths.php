<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Career Paths - MyCareer Admin</title>
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
                <a href="/admin/career-paths" class="nav-link active">Career Paths</a>
                <a href="/admin/interests" class="nav-link">Interests</a>
                <a href="/logout" class="nav-link logout">Logout</a>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="admin-main">
            <header class="admin-header">
                <div class="header-title">
                    <h1>Manage Career Paths</h1>
                </div>
                <div class="header-user">
                    <span><?php echo htmlspecialchars($profile['name'] ?? 'Admin', ENT_QUOTES); ?></span>
                </div>
            </header>

            <section class="admin-content">
                <div class="welcome-section">
                    <h2>All Career Paths</h2>
                    <p>Total Career Paths: <strong><?php echo count($careerPaths ?? []); ?></strong></p>
                </div>

                <div class="create-section">
                    <h3>Add New Career Path</h3>
                    <p>Tambah career path baru di halaman khusus.</p>
                    <a href="/admin/career-paths/add" class="action-btn">Add Career Path</a>
                </div>

                <div class="career-paths-grid">
                    <?php if (!empty($careerPaths)): ?>
                        <?php $careerNumber = 1; ?>
                        <?php foreach ($careerPaths as $career): ?>
                        <div class="career-card">
                            <div class="career-id">No: <?php echo $careerNumber++; ?></div>
                            <h3><?php echo htmlspecialchars($career['name'], ENT_QUOTES); ?></h3>
                            <p><?php echo htmlspecialchars(substr($career['description'], 0, 150) . '...', ENT_QUOTES); ?></p>
                            <div class="card-actions">
                                <a href="/admin/career-paths/edit/<?php echo htmlspecialchars($career['id'], ENT_QUOTES); ?>" class="edit-btn">Edit</a>
                                <form method="post" action="/admin/career-paths/<?php echo htmlspecialchars($career['id'], ENT_QUOTES); ?>" onsubmit="return confirm('Hapus career path ini?');" class="inline-form">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="delete-btn">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <div class="empty-state">
                        <p>No career paths found.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>

    <style>
        .career-paths-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .career-card {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .career-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .career-id {
            font-size: 12px;
            color: #999;
            margin-bottom: 8px;
        }

        .career-card h3 {
            margin: 10px 0;
            color: #333;
            font-size: 18px;
        }

        .career-card p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }

        .card-actions {
            margin-top: 12px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .edit-btn,
        .delete-btn {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            text-decoration: none;
            color: white;
            cursor: pointer;
        }

        .edit-btn {
            background: #4f46e5;
        }

        .delete-btn {
            background: #ff6b6b;
            border: none;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            opacity: 0.95;
        }

        .inline-form {
            display: inline-block;
            margin: 0;
        }

        .empty-state {
            padding: 40px;
            text-align: center;
            color: #999;
            background-color: #f5f5f5;
            border-radius: 8px;
            grid-column: 1 / -1;
        }
    </style>
</body>
</html>
