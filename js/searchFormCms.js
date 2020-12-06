const form = document.getElementById('search-form');

form.addEventListener('input', (e) =>{
    let name = e.target.value;
    fetchSearchData(name);
})

async function fetchSearchData (name) {
    const response = await fetch ('../include/searchCms.inc.php', {
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
            li.innerHTML = ind[1];
            li.classList.add('search-list');
            dataViewer.appendChild(li);
            let key = ind[0];
            li.addEventListener('click', () =>{
                parent.location = `productview.cms.php?key=${key}`;
            });
        });
    }
}
