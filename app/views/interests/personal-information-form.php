<!-- profile.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCareer - Career Profile</title>

    <link rel="stylesheet" href="/css/interest.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <?php require_once '../app/views/Component/Header.php'; ?>
    </header>

    <main class="profile-page">
        <section class="profile-section">

            <h1>Build Your Personal Career Profile</h1>

            <p class="subtitle">
                Fill in your information below to help us understand your interests,
                skills, and career goals. This will help generate personalized
                career recommendations for you.
            </p>

            <form method="POST" action="/personal-information-form" id="careerForm">

                <!-- Hidden inputs -->
                <input type="hidden" name="full_name" id="hiddenFullName">
                <input type="hidden" name="class_name" id="hiddenClassName">
                <input type="hidden" name="school_name" id="hiddenSchoolName">
                <input type="hidden" name="gender" id="hiddenGender">

                <div class="profile-layout">

                    <!-- LEFT -->
                    <div class="profile-left">

                        <div class="form-group">
                            <label>Full Name :</label>
                            <input type="text" id="inputFullName" placeholder="Enter your name">
                        </div>

                        <div class="form-group">
                            <label>Class :</label>
                            <input type="text" id="inputClassName" placeholder="Enter your class">
                        </div>

                        <div class="form-group">
                            <label>School Name :</label>
                            <input type="text" id="inputSchoolName" placeholder="Enter your school name">
                        </div>

                        <!-- GENDER -->
                        <div class="form-group">
                            <label>Gender :</label>
                            <div class="custom-select" id="genderSelect">
                                <div class="select-header">
                                    <span id="genderText">Choose your gender</span>
                                    <span class="arrow"></span>
                                </div>
                                <div class="select-dropdown">
                                    <div class="option">Male</div>
                                    <div class="option">Female</div>
                                    <div class="option other-option">
                                        <span>Other :</span>
                                        <input type="text" placeholder="Input your gender">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INTEREST -->
                        <div class="form-group">
                            <label>Tell us what are your interests :</label>
                            <div class="custom-select" id="interestSelect">
                                <div class="select-header">
                                    <span id="interestText">Choose your interests</span>
                                    <span class="arrow"></span>
                                </div>
                                <div class="select-dropdown interest-dropdown">
                                    <?php foreach ($interests as $interest): ?>
    <div class="option" data-id="<?= $interest['id'] ?>">
        <?= htmlspecialchars($interest['name']) ?>
    </div>
<?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="photo-section">
                        <div class="photo-circle">📷</div>
                        <p>Add Photo</p>
                    </div>

                </div>

                <!-- BUTTON -->
                <div class="submit-wrapper">
                    <button type="submit" id="submitBtn">Submit</button>
                </div>

            </form>

        </section>
    </main>

    <footer>
        <?php require_once '../app/views/Component/Footer.php'; ?>
    </footer>

    <script src="/js/interest.js"></script>

</body>
</html>