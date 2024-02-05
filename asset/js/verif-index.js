function validateForm() {
    let name1 = document.querySelector('input[name="name1"]');
    let healthPoints1 = document.querySelector('input[name="healthPoints1"]');
    let atk1 = document.querySelector('input[name="atk1"]');
    let type1 = document.querySelector('select[name="type1"]');
    let name2 = document.querySelector('input[name="name2"]');
    let healthPoints2 = document.querySelector('input[name="healthPoints2"]');
    let atk2 = document.querySelector('input[name="atk2"]');
    let type2 = document.querySelector('select[name="type2"]');

    if (name1.value === '' || healthPoints1.value === '' || atk1.value === '' || type1.value === '' ||
        name2.value === '' || healthPoints2.value === '' || atk2.value === '' || type2.value === '') {
        alert('Veuillez remplir tous les champs');
        return false;
    }
    return true;
}

document.querySelector('form').addEventListener('submit', function (event) {
    if (!validateForm()) {
        event.preventDefault();
    }
});