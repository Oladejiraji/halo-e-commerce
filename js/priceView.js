let couples = document.querySelectorAll('.prod-couple');
let select = document.querySelector('.hair-length');
let amt = document.querySelector('.hair-amt');
let hair = document.querySelector('.hair-price');
let hairMark = document.querySelector('.hair-price-mark');

couples.forEach(couple => {

    let length = couple.firstElementChild.innerHTML;

    let selectOpt = document.createElement("option");

    selectOpt.innerHTML = length;
    
    selectOpt.setAttribute("value", length);

    select.appendChild(selectOpt);
    
});

select.addEventListener('change', () => {
    let price = document.querySelector('.hair-price');
    let priceMark = document.querySelector('.hair-price-mark');
    let datas = document.querySelectorAll('.data-price');

    datas.forEach(data => {
        let dataLength = data.previousElementSibling.innerHTML;

        if (dataLength == select.value) {
            let newPrice = data.innerHTML;
            price.innerHTML = 'NGN'+newPrice;
            priceMark.innerHTML = 'NGN'+newPrice;
        }

    });
});


amt.addEventListener('change', () => {
    if (amt.value == 1) {
        return true;
    } else {
        let hairPrice = hairMark.innerHTML.slice(3);
        let newHairPrice = hairPrice.replace(/,/g,'');
        let calc = newHairPrice * amt.value;

        let three = calc.toLocaleString();

        hair.innerHTML = 'NGN'+three;
        console.log(three);
    }
})


