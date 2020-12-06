let forms = document.getElementById('update-form');


forms.addEventListener('click', (e) => {
    e.preventDefault();
    const formattedFormData = new FormData(forms);
    postData(formattedFormData);
});

async function postData(formattedFormData) {
    const response = await fetch ('include/update-cart.inc.php', {
        method: 'POST',
        body: formattedFormData
    });

    location.reload();
}