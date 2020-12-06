let bars = document.getElementById('prof-bars');
let sideNav = document.getElementById('side-nav');
let cancel = document.getElementById('prof-cancel');
let drop = document.getElementById('drop');

bars.addEventListener('click', function(e){
    bars.style.display = 'none';
    sideNav.style.display = 'flex';
    cancel.style.display = 'block';
});

cancel.addEventListener('click', function(e){
    bars.style.display = 'block';
    sideNav.style.display = 'none';
    cancel.style.display = 'none';
});


drop.addEventListener('click', function(){
    let authorContainer = document.getElementById('author-container');
    if(authorContainer.style.display === 'none'){
        authorContainer.style.display = 'block';
    } else  {
        authorContainer.style.display = 'none'
    }

});
