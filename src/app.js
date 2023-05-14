const form = document.querySelector('#create-account-form');
const usernameInput = document.querySelector('#name');
const emailInput = document.querySelector('#email');
const mobilenumberInput = document.querySelector('#mobileNumber');
const addressInput = document.querySelector('#address');
const passwordInput = document.querySelector('#password');
const confirmpasswordInput = document.querySelector('#confirmPassword');

form.addEventListener('submit', (event) => {

    validateForm();
    console.log(isFormValid());
    if (isFormValid() == true) {
        form.submit();
    } else {
        event.preventDefault();
    }

});

function isFormValid() {
    const inputContainers = form.querySelectorAll('.input-group');
    let result = true;
    inputContainers.forEach((container) => {
        if (container.classList.contains('error')) {
            result = false;
        }
    });
    return result;
}

function validateForm() {
    //USERNAME
    if (usernameInput.value.trim() == '') {
        setError(usernameInput, 'Name can not be empty');
    } else if (usernameInput.value.trim().length < 5 || usernameInput.value.trim().length > 15) {
        setError(usernameInput, 'Name must be min 5 and max 15 charecters');
    } else {
        setSuccess(usernameInput);
    }
    //EMAIL
    if (emailInput.value.trim() == '') {
        setError(emailInput, 'Provide email address');
    } else if (isEmailValid(emailInput.value)) {
        setSuccess(emailInput);
    } else {
        setError(emailInput, 'Provide valid email address');
    }
    //phone
    if (mobilenumberInput.value.trim() == '') {
        setError(mobilenumberInput, 'Provide number');
    } else if (mobilenumberInput.value.trim().length > 15) {
        setError(mobilenumberInput, 'NUmber must be 10 digits');
    } else {
        setSuccess(mobilenumberInput);
    }

    //Address
    if (addressInput.value.trim() == '') {
        setError(addressInput, 'Address can not be empty');
    } else if (addressInput.value.trim().length < 5 || addressInput.value.trim().length > 15) {
        setError(addressInput, 'Address must be min 5 and max 15 charecters');
    } else {
        setSuccess(addressInput);
    }

    //PASSWORD
    if (passwordInput.value.trim() == '') {
        setError(passwordInput, 'Password can not be empty');
    } else if (passwordInput.value.trim().length < 6 || passwordInput.value.trim().length > 20) {
        setError(passwordInput, 'Password min 6 max 20 charecters');
    } else {
        setSuccess(passwordInput);
    }
    //CONFIRM PASSWORD
    if (confirmpasswordInput.value.trim() == '') {
        setError(confirmpasswordInput, 'Password can not be empty');
    } else if (confirmpasswordInput.value !== passwordInput.value) {
        setError(confirmpasswordInput, 'Password does not match');
    } else {
        setSuccess(confirmpasswordInput);
    }
}

function setError(element, errorMessage) {
    const parent = element.parentElement;
    if (parent.classList.contains('success')) {
        parent.classList.remove('success');
    }
    parent.classList.add('error');
    const paragraph = parent.querySelector('p');
    paragraph.textContent = errorMessage;
}

function setSuccess(element) {
    const parent = element.parentElement;
    if (parent.classList.contains('error')) {
        parent.classList.remove('error');
    }
    parent.classList.add('success');
}

function isEmailValid(email) {
    const reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    return reg.test(email);
}

