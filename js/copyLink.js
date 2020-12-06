let btn = document.getElementById('copy-button');

btn.addEventListener('click', () =>{
    let link = document.getElementById('link');
    
    link.select();
    link.setSelectionRange(0, 99999);
    document.execCommand("copy");

    alert(`Copied the text: ${link.value}`);
})