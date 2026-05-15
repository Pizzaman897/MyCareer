<?php
$submitted = $submitted ?? false;
$profile = $profile ?? [
    'full_name' => '',
    'class_name' => '',
    'school_name' => '',
    'gender' => '',
    'interests' => [],
];

$selectedInterests = is_array($profile['interests']) ? $profile['interests'] : [];
$genderValue = strtolower(trim($profile['gender']));
$showGenderOther = $genderValue !== '' && !in_array($genderValue, ['male', 'female']);
$genderOtherValue = $showGenderOther ? $profile['gender'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Build Your Personal Career Profile - MyCareer</title>
    <link rel="stylesheet" href="/css/interest.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <div class="page-wrap">
        <div class="card-shell">
            <div class="card-shell-inner">
                <main class="interests-card" aria-label="Career profile form">
                    <div class="card-header">
                        <h1>Build Your Personal Career Profile</h1>
                        <p class="lead">Fill in your information below to help us understand your interests, skills, and career goals. This will help generate personalized career recommendations for you.</p>
                    </div>

                    <?php if ($submitted && !empty($message)): ?>
                        <div class="form-message"><?= htmlspecialchars($message) ?></div>
                    <?php endif; ?>

                    <form action="/form" method="POST" id="careerProfileForm">
                        <div class="form-grid">
                            <div class="form-fields">
                                <div class="form-group">
                                    <label for="full_name">Full Name :</label>
                                    <input type="text" id="full_name" name="full_name" value="<?= htmlspecialchars($profile['full_name']) ?>" required />
                                </div>

                                <div class="form-group">
                                    <label for="class_name">Class :</label>
                                    <input type="text" id="class_name" name="class_name" value="<?= htmlspecialchars($profile['class_name']) ?>" required />
                                </div>

                                <div class="form-group">
                                    <label for="school_name">School Name :</label>
                                    <input type="text" id="school_name" name="school_name" value="<?= htmlspecialchars($profile['school_name']) ?>" required />
                                </div>

                                <div class="form-group">
                                    <label for="gender">Gender :</label>
                                    <select id="gender" name="gender" required>
                                        <option value="" <?= $genderValue === '' ? 'selected' : '' ?>>Choose gender</option>
                                        <option value="male" <?= $genderValue === 'male' ? 'selected' : '' ?>>Male</option>
                                        <option value="female" <?= $genderValue === 'female' ? 'selected' : '' ?>>Female</option>
                                        <option value="other" <?= $showGenderOther ? 'selected' : '' ?>>Other</option>
                                    </select>
                                </div>

                                <div class="form-group gender-other-row" id="genderOtherRow" style="display: <?= $showGenderOther ? 'block' : 'none' ?>;">
                                    <label for="gender_other">Please specify gender :</label>
                                    <input type="text" id="gender_other" name="gender_other" value="<?= htmlspecialchars($genderOtherValue) ?>" />
                                </div>

                                <div class="form-group">
                                    <label for="interests">Tell us what are your interests :</label>
                                    <select id="interests" name="interests[]" multiple size="8" required>
                                        <?php
                                        $options = [
                                            'Photography',
                                            'Reading',
                                            'Writing',
                                            'Drawing',
                                            'Playing music',
                                            'Sports',
                                            'Playing games',
                                            'Cooking',
                                            'Farming',
                                            'Watching movies',
                                        ];
                                        foreach ($options as $option):
                                            $selected = in_array($option, $selectedInterests) ? 'selected' : '';
                                        ?>
                                            <option value="<?= htmlspecialchars($option) ?>" <?= $selected ?>><?= htmlspecialchars($option) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <p class="select-help">Hold Ctrl / Command to select multiple interests.</p>


                                </div>
                            </div>

                            <aside class="photo-panel">
                                <div class="photo-circle">
                                    <span class="camera-icon">📷</span>
                                </div>
                                <p class="photo-label">Add Photo</p>
                            </aside>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="submit">Submit</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
    <script src="/js/interest.js"></script>
</body>
</html>
