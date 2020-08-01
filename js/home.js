
const sectionText = document.getElementById('section-a-text');
const sectionImage1 = document.getElementById('section-a-img').firstElementChild;
const sectionImage2 = document.getElementById('section-a-img').lastElementChild;
const sectionImage = document.getElementById('section-a-img');



window.addEventListener('scroll', () => {
    if(scrollY > 350){
        sectionText.style.animationName = 'text';
        sectionText.style.animationDuration = '1s';
        sectionText.style.opacity = '1';

        sectionImage1.style.animationName = 'text';
        sectionImage1.style.animationDuration = '1s';
        // sectionImage1.style.animationDelay = '1s';
        sectionImage1.style.opacity = '1';

        sectionImage2.style.animationName = 'text';
        sectionImage2.style.animationDuration = '1s';
        // sectionImage2.style.animationDelay = '2s';
        sectionImage2.style.opacity = '1';

        // sectionImage.style.opacity ='1';

        console.log(2);
    }
});
