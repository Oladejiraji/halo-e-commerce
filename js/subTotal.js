let subs = document.querySelectorAll('.cart-total');
let subValue = document.getElementById('sub-value');
let shipping = document.getElementById('shipping');
let totalValue = document.getElementById('total-value');


let realShipping = parseInt(shipping.innerHTML.replace(/,/g,''));
// let realTotalValue = parseInt(totalValue.innerHTML.replace(/,/g,''));


let total = 0

subs.forEach(sub => {
    let value = sub.innerHTML;
    let number = value.replace(/,/g,'');
    let real = parseInt(number);

    total += real

    let three = total.toLocaleString();

    subValue.innerHTML = three;

    let realTotal = realShipping + total;

    let realViewTotal = realTotal.toLocaleString();

    totalValue.innerHTML = realViewTotal;




});
// console.log(sub);