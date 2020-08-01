const photo = document.getElementById('hair-photo');
const left = document.getElementById('left');
const right = document.getElementById('right');


right.addEventListener('click', () => {
    const active = document.querySelector('.active');
    active.classList.remove('active');
    if (active.nextElementSibling) {
        active.nextElementSibling.classList.add('active');
    } else {
        photo.firstElementChild.classList.add('active');
    }
})


left.addEventListener('click', () => {
    const active = document.querySelector('.active');
    active.classList.remove('active');
    if (active.previousElementSibling) {
        active.previousElementSibling.classList.add('active');
    } else {
        photo.lastElementChild.classList.add('active');
    }
})