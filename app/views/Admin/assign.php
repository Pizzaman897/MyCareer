<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Interests - MyCareer Admin</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
    <div class="admin-container">
        <aside class="admin-sidebar">
            <div class="sidebar-header"><h2>MyCareer Admin</h2></div>
            <nav class="sidebar-nav">
                <a href="/admin" class="nav-link">Dashboard</a>
                <a href="/admin/users" class="nav-link">Users</a>
                <a href="/admin/career-paths" class="nav-link">Career Paths</a>
                <a href="/admin/interests" class="nav-link">Interests</a>
                <a href="/admin/assign" class="nav-link active">Assign</a>
                <a href="/logout" class="nav-link logout">Logout</a>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-header"><div class="header-title"><h1>Assign Interests to Career Paths</h1></div>
                <div class="header-user"><span><?php echo htmlspecialchars($profile['name'] ?? 'Admin', ENT_QUOTES); ?></span></div>
            </header>

            <section class="admin-content">
                <div class="create-section">
                    <h3>Assign Interests</h3>
                    <form method="post" action="/admin/assign">
                        <input type="hidden" name="action" value="assign_interests">
                        <div>
                            <label>Career Path</label>
                            <select name="career_id" required>
                                <?php foreach ($careerPaths as $cp): ?>
                                    <option value="<?php echo htmlspecialchars($cp['id'], ENT_QUOTES); ?>"><?php echo htmlspecialchars($cp['name'], ENT_QUOTES); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label>Interests</label>
                            <div class="interest-checkboxes">
                                <?php foreach ($interests as $i): ?>
                                    <label><input type="checkbox" name="interests[]" value="<?php echo htmlspecialchars($i['id'], ENT_QUOTES); ?>"> <?php echo htmlspecialchars($i['name'], ENT_QUOTES); ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div><button type="submit">Save Assignment</button></div>
                    </form>
                </div>

                <hr>

                <div class="lists">
                    <div class="list-careers">
                        <h3>Career Paths (Edit)</h3>
                        <?php foreach ($careerPaths as $cp): ?>
                            <form method="post" action="/admin/assign" class="edit-form">
                                <input type="hidden" name="action" value="edit_career">
                                <input type="hidden" name="career_id" value="<?php echo htmlspecialchars($cp['id'], ENT_QUOTES); ?>">
                                <input type="text" name="name" value="<?php echo htmlspecialchars($cp['name'], ENT_QUOTES); ?>" required>
                                <input type="text" name="description" value="<?php echo htmlspecialchars($cp['description'], ENT_QUOTES); ?>">
                                <button type="submit">Save</button>
                            </form>
                            <div class="assigned">
                                <strong>Assigned Interests:</strong>
                                <?php $assigned = $assignMap[$cp['id']] ?? []; ?>
                                <?php if (!empty($assigned)):
                                    $names = [];
                                    foreach ($interests as $it) { if (in_array((int)$it['id'], $assigned)) $names[] = $it['name']; }
                                ?>
                                    <?php echo htmlspecialchars(implode(', ', $names), ENT_QUOTES); ?>
                                <?php else: ?>
                                    <em>None</em>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="list-interests">
                        <h3>Interests (Edit)</h3>
                        <?php foreach ($interests as $it): ?>
                            <form method="post" action="/admin/assign" class="edit-form">
                                <input type="hidden" name="action" value="edit_interest">
                                <input type="hidden" name="interest_id" value="<?php echo htmlspecialchars($it['id'], ENT_QUOTES); ?>">
                                <input type="text" name="name" value="<?php echo htmlspecialchars($it['name'], ENT_QUOTES); ?>" required>
                                <button type="submit">Save</button>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>

            </section>
        </main>
    </div>

    <style>
        .create-section { margin-bottom: 20px; }
        .interest-checkboxes label { display: inline-block; margin-right:10px; }
        .lists { display:flex; gap:30px; }
        .edit-form { margin-bottom:10px; }
        .assigned { margin-bottom:15px; color:#555; }
    </style>
</body>
</html>