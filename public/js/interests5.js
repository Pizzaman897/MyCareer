const cardA = document.getElementById('cardA');
const cardB = document.getElementById('cardB');
const cardC = document.getElementById('cardC');

function setPositions(aClass, bClass, cClass) {
    cardA.className = 'final-card ' + aClass;
    cardB.className = 'final-card ' + bClass;
    cardC.className = 'final-card ' + cClass;
}

// Animation sequence: initial => swap positions => middle returns
setTimeout(() => setPositions('move-right','move-center','move-left'), 400);
setTimeout(() => setPositions('move-left','move-right','move-center'), 1400);
setTimeout(() => setPositions('move-left','move-center','move-right'), 2200);
setTimeout(() => {
    setPositions('card-left','card-middle','card-right');
}, 3000);
