document.addEventListener('DOMContentLoaded', function () {
    const genderSelect = document.getElementById('gender');
    const genderOtherRow = document.getElementById('genderOtherRow');

    function toggleGenderOther() {
        if (!genderSelect || !genderOtherRow) {
            return;
        }

        if (genderSelect.value === 'other') {
            genderOtherRow.style.display = 'block';
        } else {
            genderOtherRow.style.display = 'none';
        }
    }

    if (genderSelect) {
        genderSelect.addEventListener('change', toggleGenderOther);
        toggleGenderOther();
    }
});