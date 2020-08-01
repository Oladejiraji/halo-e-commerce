let amounts = document.querySelectorAll('.cartamt');
let form = document.getElementById('form-input');
let button = document.getElementById('update-button');




amounts.forEach(amount => amount.addEventListener('change', update));

function update(e) {

    //dispay the update button
    button.style.display = 'block';


    let amtClass = e.target.className;
    let amtId = e.target.getAttribute('data-id');
    let amtSelector = amtClass + '_' + amtId;

    if (form.childElementCount == 0) {
        let input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', amtClass + '_' + amtId);
        input.classList.add(amtSelector);
        input.classList.add(amtClass);
        input.classList.add('childs');
        input.setAttribute('value', e.target.value);
        form.appendChild(input);
        console.log(1);
    } else {
        let flag = true;
        let array = form.children;
        for (let index = 0; index < array.length; index++) {
            const element = array[index];
            if (element.classList.contains(amtSelector)) {
                flag = false;
                break
            }

        }

        if (flag == false) {
            let chosen = document.querySelector('.' + amtSelector);
            chosen.setAttribute('value', e.target.value);
            console.log(2);
        } else if (flag == true) {
            let input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', amtClass + '_' + amtId);
            input.classList.add(amtSelector);
            input.classList.add(amtClass);
            input.classList.add('childs');
            input.setAttribute('value', e.target.value);
            form.appendChild(input);
            console.log(3);
        }


    }





}


