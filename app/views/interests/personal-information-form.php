<!-- profile.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCareer - Career Profile</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/interest.css">

    <!-- POPPINS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- HEADER -->
    <header>
        <?php require_once '../app/views/Component/Header.php'; ?>
    </header>

    <!-- MAIN -->
    <main class="profile-page">

        <section class="profile-section">

            <h1>Build Your Personal Career Profile</h1>

            <p class="subtitle">
                Fill in your information below to help us understand your interests,
                skills, and career goals. This will help generate personalized
                career recommendations for you.
            </p>

            <div class="profile-layout">

                <!-- LEFT -->
                <div class="profile-left">

                    <!-- FULL NAME -->
                    <div class="form-group">

                        <label>Full Name :</label>

                        <input type="text" placeholder="Enter your name">

                    </div>

                    <!-- CLASS -->
                    <div class="form-group">

                        <label>Class :</label>

                        <input type="text" placeholder="Enter your class">

                    </div>

                    <!-- SCHOOL -->
                    <div class="form-group">

                        <label>School Name :</label>

                        <input type="text" placeholder="Enter your school name">

                    </div>

                    <!-- GENDER -->
                    <div class="form-group">

                        <label>Gender :</label>

                        <div class="custom-select" id="genderSelect">

                            <div class="select-header">

                                <span id="genderText">
                                    Choose your gender
                                </span>

                                <span class="arrow"></span>

                            </div>

                            <div class="select-dropdown">

                                <div class="option">
                                    Male
                                </div>

                                <div class="option">
                                    Female
                                </div>

                                <div class="option other-option">

                                    <span>Other :</span>

                                    <input
                                    type="text"
                                    placeholder="Input your gender">

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- INTEREST -->
                    <div class="form-group">

                        <label>
                            Tell us what are your interests :
                        </label>

                        <div class="custom-select" id="interestSelect">

                            <div class="select-header">

                                <span id="interestText">
                                    Choose your interests
                                </span>

                                <span class="arrow"></span>

                            </div>

                            <div class="select-dropdown interest-dropdown">

                                <div class="option">Photography</div>
                                <div class="option">Reading</div>
                                <div class="option">Writing</div>
                                <div class="option">Drawing</div>
                                <div class="option">Playing music</div>
                                <div class="option">Sports</div>
                                <div class="option">Playing games</div>
                                <div class="option">Cooking</div>
                                <div class="option">Farming</div>
                                <div class="option">Watching movies</div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="photo-section">

                    <div class="photo-circle">
                        📷
                    </div>

                    <p>Add Photo</p>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="submit-wrapper">

                <button type="button" id="submitBtn">
                    Submit
                </button>

            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer>
        <?php require_once '../app/views/Component/Footer.php'; ?>
    </footer>

    <!-- JS -->
    <script src="/js/interest.js"></script>

</body>
</html>