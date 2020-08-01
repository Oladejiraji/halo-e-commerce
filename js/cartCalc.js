let amts = document.querySelectorAll('.cart-amt');
let carts = document.querySelectorAll('.main-cart');


carts.forEach(cart => {
 
    let price = cart.firstElementChild.nextElementSibling.innerHTML;
    let amt =  cart.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value;
    let newPrice = price.replace(/,/g,'');
    let calc = amt * newPrice;
    let three = calc.toLocaleString();

    
    let total = cart.lastElementChild.previousElementSibling;
    total.innerHTML = three;

    
});


amts.forEach(amt => {
    amt.addEventListener('change', () => {
        let total = amt.parentElement.nextElementSibling;
        let price = amt.parentElement.previousElementSibling.innerHTML;

        let newPrice = price.replace(/,/g,'');
        let calc = amt.value * newPrice;
        let three = calc.toLocaleString();
        
        total.innerHTML = three;
    })
});