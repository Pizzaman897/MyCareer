// profile.js

const selects = document.querySelectorAll('.custom-select');

/* OPEN SELECT */
selects.forEach(select => {

    const header = select.querySelector('.select-header');

    header.addEventListener('click', () => {

        // close other select
        selects.forEach(item => {

            if(item !== select){
                item.classList.remove('active');
            }

        });

        // toggle current
        select.classList.toggle('active');

    });

});

/* OPTION CLICK */
const options = document.querySelectorAll('.option');

options.forEach(option => {

    option.addEventListener('click', () => {

        const select = option.closest('.custom-select');

        const text = option.innerText.trim();

        const headerText = select.querySelector('.select-header span');

        if(!text.includes('Other')){

            headerText.innerText = text;

            headerText.style.color = '#000';

            select.classList.remove('active');

        }

    });

});

/* CLOSE OUTSIDE */
window.addEventListener('click', (e) => {

    if(!e.target.closest('.custom-select')){

        selects.forEach(select => {

            select.classList.remove('active');

        });

    }

});

// SUBMIT REDIRECT
const submitBtn = document.getElementById('submitBtn');

submitBtn.addEventListener('click', () => {

    window.location.href = 'home';

});