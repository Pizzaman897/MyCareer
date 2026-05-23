<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Career Path - MyCareer Admin</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-container">
        <aside class="admin-sidebar">
            <div class="sidebar-header"><h2>MyCareer Admin</h2></div>
            <nav class="sidebar-nav">
                <a href="/admin" class="nav-link">Dashboard</a>
                <a href="/admin/users" class="nav-link">Users</a>
                <a href="/admin/career-paths" class="nav-link active">Career Paths</a>
                <a href="/admin/interests" class="nav-link">Interests</a>
                <a href="/logout" class="nav-link logout">Logout</a>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <div class="header-title"><h1>Add Career Path</h1></div>
                <div class="header-user"><span><?php echo htmlspecialchars($_SESSION['admin_name'] ?? 'Admin', ENT_QUOTES); ?></span></div>
            </header>

            <section class="admin-content">
                <?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
                <?php if (!empty($_SESSION['flash'])): $f = $_SESSION['flash']; ?>
                    <div class="flash <?php echo htmlspecialchars($f['type'], ENT_QUOTES); ?>"><?php echo htmlspecialchars($f['message'], ENT_QUOTES); ?></div>
                    <?php unset($_SESSION['flash']); ?>
                <?php endif; ?>

                <div class="form-card">
                    <form method="post" action="/admin/career-paths/add">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>More Info</label>
                            <textarea name="more_info" rows="4" placeholder="Add additional details or context..."></textarea>
                        </div>
                        <div class="form-group">
                            <label></label>Assign Interests</label>
                            <div class="interest-checkboxes">
                                <?php foreach ($availableInterests as $i): ?>
                                    <label class="checkbox-inline"><input type="checkbox" name="interests[]" value="<?php echo htmlspecialchars($i['id'], ENT_QUOTES); ?>"> <?php echo htmlspecialchars($i['name'], ENT_QUOTES); ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="action-btn">Add Career Path</button>
                            <a href="/admin/career-paths" class="secondary-btn">Back</a>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>

    <style>
        .form-card { background: #fff; padding: 30px; border-radius: 16px; box-shadow: 0 12px 30px rgba(0,0,0,0.08); max-width: 760px; margin: auto; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 10px; font-weight: 600; color: #333; }
        .form-group input, .form-group textarea { width: 100%; padding: 14px 16px; border: 1px solid #ddd; border-radius: 12px; font-size: 15px; color: #333; }
        .interest-checkboxes { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 12px; }
        .checkbox-inline { display: inline-flex; align-items: center; gap: 8px; background: #f7f9ff; padding: 10px 12px; border-radius: 12px; border: 1px solid #e4e7ff; }
        .form-actions { display: flex; gap: 12px; flex-wrap: wrap; align-items: center; margin-top: 24px; }
        .action-btn { padding: 12px 22px; }
        .secondary-btn { display: inline-flex; align-items: center; justify-content: center; padding: 12px 22px; background: #f5f5f5; color: #333; border-radius: 12px; text-decoration: none; }
        .flash { padding: 16px 20px; border-radius: 12px; margin-bottom: 20px; font-weight: 600; }
        .flash.success { background: #ddf1ff; color: #0f4f8f; }
        .flash.error { background: #ffe1e1; color: #8a1212; }
    </style>
</body>
</html> 