<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Interests - MyCareer</title>

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

            <h1>Edit Your Interests</h1>

            <p class="subtitle">
                Choose up to 3 interests from the list below. This will update your career recommendations.
            </p>

            <form method="POST" action="/interests/edit" id="editInterestForm">

                <div class="profile-layout">

                    <div class="profile-left">

                        <div class="form-group">
                            <label>Tell us what are your interests :</label>
                            <div class="custom-select" id="interestSelect">
                                <div class="select-header">
                                    <span id="interestText">Choose your interests</span>
                                    <span class="arrow"></span>
                                </div>
                                <div class="select-dropdown interest-dropdown">
                                    <?php foreach ($interests as $interest): ?>
                                        <div class="option<?= in_array((int) $interest['id'], $selectedInterestIds ?? [], true) ? ' selected' : '' ?>" data-id="<?= (int) $interest['id'] ?>">
                                            <?= htmlspecialchars($interest['name'], ENT_QUOTES) ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="submit-wrapper">
                    <button type="submit">Save Interests</button>
                    <button type="button" class="cancel-link" onclick="window.location.href='/home'">Cancel</button>
                </div>
            </form>

        </section>
    </main>

    <footer>
        <?php require_once '../app/views/Component/Footer.php'; ?>
    </footer>

    <script>
        const form = document.getElementById('editInterestForm');
        const interestSelect = document.getElementById('interestSelect');
        const interestText = document.getElementById('interestText');
        const selectHeader = interestSelect.querySelector('.select-header');
        const options = interestSelect.querySelectorAll('.option');
        const selectedInterests = [];

        selectHeader.addEventListener('click', (e) => {
            e.stopPropagation();
            interestSelect.classList.toggle('active');
        });

        window.addEventListener('click', (e) => {
            if (!e.target.closest('#interestSelect')) {
                interestSelect.classList.remove('active');
            }
        });

        options.forEach(option => {
            const id = parseInt(option.dataset.id, 10);
            if (option.classList.contains('selected')) {
                selectedInterests.push(id);
            }

            option.addEventListener('click', (e) => {
                e.stopPropagation();

                if (option.classList.contains('selected')) {
                    option.classList.remove('selected');
                    const index = selectedInterests.indexOf(id);
                    if (index !== -1) selectedInterests.splice(index, 1);
                } else {
                    if (selectedInterests.length >= 3) {
                        alert('You can only select up to 3 interests.');
                        return;
                    }
                    option.classList.add('selected');
                    selectedInterests.push(id);
                }
                updateInterestText();
            });
        });

        function updateInterestText() {
            if (selectedInterests.length === 0) {
                interestText.innerText = 'Choose your interests';
                interestText.style.color = '';
            } else {
                const texts = Array.from(interestSelect.querySelectorAll('.option.selected')).map(opt => opt.innerText.trim());
                interestText.innerText = texts.join(', ');
                interestText.style.color = '#000';
            }
        }

        updateInterestText();

        form.addEventListener('submit', (e) => {
            document.querySelectorAll('input[name="interests[]"]').forEach(el => el.remove());

            selectedInterests.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'interests[]';
                input.value = id;
                form.appendChild(input);
            });

            if (selectedInterests.length === 0) {
                e.preventDefault();
                alert('Please select at least 1 interest.');
            }
        });
    </script>
</body>
</html>
