const header = document.querySelector('header');
const topBtn = document.getElementById('top-btn');
const bars = document.getElementById('bars');
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


topBtn.addEventListener('click', () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});


bars.addEventListener('click', () => {
    navBar.style.left = '0';
});

window.addEventListener('click', (e) => {
    if(e.target == navBar) {
        navBar.style.left = '-100vw';
    }
});





