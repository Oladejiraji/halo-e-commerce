let totals = document.getElementById('total-value');
let checkout = document.getElementById('checkout-total');


let price = totals.innerHTML;
let newPrice = price.replace(/,/g,'');
let koboPrice = newPrice+'00';
actualPrice = parseInt(koboPrice);
checkout.value = actualPrice;

// console.log(actualPrice);
