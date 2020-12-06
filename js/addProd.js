let amount = document.getElementById('amount');
let specific = document.getElementById('specific');


amount.addEventListener('change', (e) => {
   
    while (specific.firstElementChild) {
        specific.removeChild(specific.firstElementChild);
    }

    let individual = document.querySelectorAll('specProd');
    let i = individual.length;
    while (i < e.target.value) {
        let div = document.createElement('div');
        div.classList.add('specProd');
        let length = document.createElement('input');
        length.classList.add('length');
        length.setAttribute('placeholder', 'length...')
        length.setAttribute('name', 'length[]')
        let price = document.createElement('input');
        price.classList.add('price');
        price.setAttribute('placeholder', 'price...')
        price.setAttribute('name', 'price[]')
        div.appendChild(length);
        div.appendChild(price);
        specific.appendChild(div);
        i++;
    }
    
})

