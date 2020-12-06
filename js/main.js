const header = document.querySelector('header');
const topBtn = document.getElementById('top-btn');
const navBar = document.getElementById('nav-bar');

window.addEventListener('scroll', (e) => {
    if( scrollY > 200) {
        header.style.position = 'sticky';
        header.style.top = 0;
        header.style.backgroundColor = '#EDC2D8FF';
        header.style.color = '#f4f4f4';
        header.style.zIndex = 50;
    } else if (scrollY <= 200) {
        
        header.style.position = 'relative';
        header.style.top = 0;
        header.style.backgroundColor = 'transparent';   
        header.style.color = '#333';   
    }
});


window.addEventListener('scroll', (e) => {
    if( scrollY > 500) {
        topBtn.style.display = 'block';
    } else if (scrollY <= 500) {
        topBtn.style.display = 'none';
    }
});


// topBtn.addEventListener('click', () => {
//     document.body.scrollTop = 0;
//     document.documentElement.scrollTop = 0;
// });




topBtn.addEventListener('click', smooth);

function smooth () {
    let target = 0;
    let duration = 1000;
    let start = window.pageYOffset;
    let distance = -start;
    let startTime = null;
    console.log(start);

    function animation (currentTime) {
        if (startTime === null) startTime = currentTime;
        let timeElapsed = currentTime - startTime;
        let run = ease(timeElapsed, start, distance, duration);
        window.scrollTo(0, run);
        if (timeElapsed < duration) requestAnimationFrame(animation);
    }

    function ease (t, b, c, d) {
        t /= d/2;
        if (t < 1) return c/2*t*t*t*t + b;
        t -= 2;
        return -c/2 * (t*t*t*t - 2) + b;
    };
    

    requestAnimationFrame(animation);
}






const menuBtn = document.querySelector('.menu-btn');
let menuOpen = false;

menuBtn.addEventListener('click', () => {
    if (!menuOpen) {
        menuBtn.classList.add('open');
        navBar.style.left = '0';
        menuOpen = true
    } else {
        menuBtn.classList.remove('open');
        navBar.style.left = '-100vw';
        menuOpen = false;
    }
});






