const selects = document.querySelectorAll('.custom-select');

/* OPEN SELECT */
selects.forEach(select => {
    const header = select.querySelector('.select-header');
    header.addEventListener('click', () => {
        selects.forEach(item => {
            if (item !== select) item.classList.remove('active');
        });
        select.classList.toggle('active');
    });
});

/* CLOSE OUTSIDE */
window.addEventListener('click', (e) => {
    if (!e.target.closest('.custom-select')) {
        selects.forEach(select => select.classList.remove('active'));
    }
});

/* GENDER SELECT */
const genderOptions = document.querySelectorAll('#genderSelect .option');
genderOptions.forEach(option => {
    option.addEventListener('click', () => {
        const text = option.innerText.trim();
        if (text.includes('Other')) return;
        document.getElementById('genderText').innerText = text;
        document.getElementById('genderText').style.color = '#000';
        document.getElementById('hiddenGender').value = text.toLowerCase();
        document.getElementById('genderSelect').classList.remove('active');
    });
});

const otherInput = document.querySelector('.other-option input');
if (otherInput) {
    otherInput.addEventListener('input', () => {
        document.getElementById('hiddenGender').value = otherInput.value.trim();
    });
}

/* INTEREST SELECT - max 3 */
const selectedInterests = [];
const interestSelect = document.getElementById('interestSelect');
const interestOptions = Array.from(document.querySelectorAll('#interestSelect .option'));
const prevPageBtn = document.querySelector('#interestSelect .page-btn.prev');
const nextPageBtn = document.querySelector('#interestSelect .page-btn.next');
const pageInfo = document.querySelector('#interestSelect .page-info');
const ITEMS_PER_PAGE = 10;
let currentPage = 1;
const interestPageCount = Math.max(1, Math.ceil(interestOptions.length / ITEMS_PER_PAGE));

function renderInterestPage() {
    interestOptions.forEach((option, index) => {
        const pageIndex = Math.floor(index / ITEMS_PER_PAGE) + 1;
        option.style.display = pageIndex === currentPage ? 'block' : 'none';
    });
    pageInfo.innerText = `${currentPage} / ${interestPageCount}`;
    if (prevPageBtn) prevPageBtn.disabled = currentPage === 1;
    if (nextPageBtn) nextPageBtn.disabled = currentPage === interestPageCount;
}

if (prevPageBtn) {
    prevPageBtn.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage -= 1;
            renderInterestPage();
        }
    });
}

if (nextPageBtn) {
    nextPageBtn.addEventListener('click', () => {
        if (currentPage < interestPageCount) {
            currentPage += 1;
            renderInterestPage();
        }
    });
}

interestOptions.forEach(option => {
    const interestId = parseInt(option.dataset.id, 10);

    option.addEventListener('click', () => {
        const text = option.innerText.trim();

        if (option.classList.contains('selected')) {
            option.classList.remove('selected');
            const idx = selectedInterests.indexOf(interestId);
            if (idx > -1) selectedInterests.splice(idx, 1);
        } else {
            if (selectedInterests.length >= 3) {
                alert('You can only pick up to 3 interests.');
                return;
            }
            option.classList.add('selected');
            selectedInterests.push(interestId);
        }

        const interestText = document.getElementById('interestText');
        interestText.innerText = selectedInterests.length > 0
            ? Array.from(interestSelect.querySelectorAll('.option.selected')).map(opt => opt.innerText.trim()).join(', ')
            : 'Choose your interests';
        interestText.style.color = selectedInterests.length > 0 ? '#000' : '';
    });
});

renderInterestPage();

/* SUBMIT */
const form = document.getElementById('careerForm');
form.addEventListener('submit', (e) => {

    // sync text inputs ke hidden fields
    document.getElementById('hiddenFullName').value = document.getElementById('inputFullName').value.trim();
    document.getElementById('hiddenClassName').value = document.getElementById('inputClassName').value.trim();
    document.getElementById('hiddenSchoolName').value = document.getElementById('inputSchoolName').value.trim();

    // remove old interest inputs
    document.querySelectorAll('input[name="interests[]"]').forEach(el => el.remove());

    // append interest hidden inputs using IDs
    selectedInterests.forEach(interestId => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'interests[]';
        input.value = interestId;
        form.appendChild(input);
    });

    // validasi
    if (!document.getElementById('hiddenFullName').value) {
        e.preventDefault();
        alert('Please enter your full name.');
        return;
    }
    if (selectedInterests.length === 0) {
        e.preventDefault();
        alert('Please select at least 1 interest.');
        return;
    }
});