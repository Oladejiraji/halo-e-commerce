const form = document.getElementById('search-form');

form.addEventListener('input', (e) =>{
    let name = e.target.value;
    fetchSearchData(name);
})

async function fetchSearchData (name) {
    const response = await fetch ('include/search.inc.php', {
        method: 'POST',
        body: new URLSearchParams(`name=${name}`)
    }) 
    const data = await response.json();
    viewResults(data, name);
} 

function viewResults (data, name) {
    let dataViewer = document.getElementById('data-viewer');
    dataViewer.innerHTML = "";

    if (name == '') {
        dataViewer.innerHTML = "";
    } else {
        data.forEach(ind => {
            let li = document.createElement('li');
            li.innerHTML = ind;
            li.classList.add('search-list');
            dataViewer.appendChild(li);
            li.addEventListener('click', product);
        });
    }
}


function product (e) {
    let productName = e.target.innerHTML;
    parent.location = `product.php?key=${productName}`;
}