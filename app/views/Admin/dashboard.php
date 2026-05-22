<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MyCareer</title>
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
                <a href="/admin" class="nav-link active">Dashboard</a>
                <a href="/admin/users" class="nav-link">Users</a>
                <a href="/admin/career-paths" class="nav-link">Career Paths</a>
                <a href="/admin/interests" class="nav-link">Interests</a>
                <a href="/logout" class="nav-link logout">Logout</a>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="admin-main">
            <header class="admin-header">
                <div class="header-title">
                    <h1>Admin Dashboard</h1>
                </div>
                <div class="header-user">
                    <span><?php echo htmlspecialchars($profile['name'] ?? 'Admin', ENT_QUOTES); ?></span>
                </div>
            </header>

            <section class="admin-content">
                <div class="welcome-section">
                    <h2>Welcome Back, <?php echo htmlspecialchars($profile['name'] ?? 'Admin', ENT_QUOTES); ?>!</h2>
                    <p>Manage your MyCareer application from here.</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-title">Total Users</div>
                        <div class="stat-value">0</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Career Paths</div>
                        <div class="stat-value">0</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Active Sessions</div>
                        <div class="stat-value">0</div>
                    </div>
                </div>

                <div class="action-section">
                    <h3>Quick Actions</h3>
                    <div class="action-buttons">
                        <a href="/admin/users" class="action-btn">Manage Users</a>
                        <a href="/admin/career-paths" class="action-btn">Manage Career Paths</a>
                        <a href="/admin/interests" class="action-btn">Manage Interests</a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
