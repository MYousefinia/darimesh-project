// START ---
/*$(document).ready(function (){*/

    /*$('#submit').click(function (){
        var name = $('#name-family').value;
        var phone = $('#ph-number').value;
        var email = $('#email').value;
        var username = $('#username').value;
        var password = $('#password').value;
        var re_password = $('#re-password').value;
        var home_address = $('#user-address').value;

            let name_error = $('#name-error');
            let phone_error = $('#ph-number-error');
            let email_error = $('#email-error');
            let username_error = $('#username-error');
            let password_error = $('#password-error');
            let  repass_error = $('#repass-error');
            let address_error = $('#address-error');

              name_error.innerHTML = 'hello';
    }); */

    // $("#register").validate({
    //
    //     rules : {
    //         name : {
    //           required : true
    //       },
    //
    //       email : true,
    //
    //       messages : {
    //           name : {
    //               required: 'وارد کردن نام الزامی است *',
    //           },
    //           email : 'وارد کردن ایمیل الزامی است *'
    //       }
    //
    //     },
    //
    //     submitHandler: function(form) {
    //         form.submit();
    //     }
    // });

    /*

    var form = $('#register');

    var name = document.getElementById('name-family').value;
    var ph_number = document.getElementById('ph-number').value;
    var email = document.getElementById('email').value;
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var repass = document.getElementById('re-password').value;
    var home_address = document.getElementById('user-address').value;

    form.addEventListener('submit', e => {
        e.preventDefault();
        validate_form();
    });

    var Error_Set = (element, msg) => {
        var inputControl = element.parent();
        var errorDisplay = inputControl.querySelector('.err');

        errorDisplay.innerText = msg;
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
    }

    var Success_Set = element =>{
        var inputControl = element.parent();
        var errorDisplay = inputControl.querySelector('.err');

        errorDisplay.innerText = '';
        inputControl.classList.remove('error');
        inputControl.classList.add('success');
    }

    var isValidEmail = email => {
        var pattex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return pattex.test(String(email).toLowerCase());
    }



    function validate_form(){
        var nameVal = name.value.trim();
        var ph_numberVal = ph_number.value.trim();
        var emailVal = email.value.trim();
        var usernameVal = username.value.trim();
        var passwordVal = password.value.trim();
        var repassVal = repass.value.trim();
        var home_addressVal = home_address.value.trim();

        if(nameVal ===''){
            Error_Set(name, 'وارد کردن نام و نام خانوادگی الزامی است *');
        } else{
            Success_Set(name);
        }

        if(ph_numberVal === ''){
            Error_Set(ph_number, 'وارد کردن شماره تلفن الزامی است *');
        } else {
            Success_Set(ph_number);
        }

        if(emailVal === ''){
            Error_Set(email, 'وارد کردن آدرس ایمیل الزامی است *');
        } else if (!isValidEmail(emailVal)){
            Error_Set(email, 'آدرس ایمیل وارد شده معتبر نمیباشد *');
        } else {
            Success_Set(email);
        }

        if(usernameVal === ''){
            Error_Set(username, 'وارد کردن نام کاربری الزامی است *');
        } else{
            Success_Set(username);
        }

        if(passwordVal === ''){
            Error_Set(password, 'وارد کردن رمز عبور الزامی است *');
        } else if (passwordVal.length < 8){
            Error_Set(password, 'رمز عبور باید حداقل دارای 8 کاراکتر باشد *');
        } else {
            Success_Set(password);
        }

        if(repassVal === ''){
            Error_Set(repass, 'رمز عبور خود را تکرار کنید *');
        } else if (repassVal !== passwordVal){
            Error_Set(repass, 'رمز عبور و تکرار آن باید برابر باشند *');
        } else {
            Success_Set(repass)
        }

        if(home_addressVal === ''){
            Error_Set(home_address, 'وارد کردن آدرس دقیق منزل الزامی است *');
        } else{
            Success_Set(home_address)
        }

    }

}); */
// END -----

/*function $(id){
    return document.getElementById(id);
}

var subBtn = $('submit');
subBtn.addEventListener('submit', validation);

function validation(){

    // inputs

    var name = $('name-family').value;
    var ph_number = $('ph-number').value;
    var email = $('email').value;
    var username = $('username').value;
    var password = $('password').value;
    var repass = $('re-password').value;
    var home_address = $('user-address').value;

    // errors

    var nameErr = $('name-error');
    var ph_numberErr = $('ph-number-error');
    var emailErr = $('email-error');
    var usernameErr = $('username-error');
    var passwordErr = $('password-error');
    var repassErr = $('repass-error');
    var home_addressErr = $('address-error');

    // Conditions

    if(name === ''){
        nameErr.innerText = 'Name is required !';
        return false;
    }

}*/

 var subBtn = document.getElementById('submit');
subBtn.addEventListener('click', validateForm);

function validateForm(){

    var name = document.getElementById('name-family').value;
    var ph_number = document.getElementById('ph-number').value;
    var email = document.getElementById('email').value;
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var repass = document.getElementById('re-password').value;
    var home_address = document.getElementById('user-address').value;

    // errors
    var nameErr = document.getElementById('name-error');
    var ph_numberErr = document.getElementById('phone-error');
    var emailErr = document.getElementById('email-error');
    var usernameErr = document.getElementById('username-error');
    var passwordErr = document.getElementById('password-error');
    var repassErr = document.getElementById('repass-error');
    var home_addressErr = document.getElementById('address-error');

    if(name == ""){
        nameErr.innerText = 'وارد کردن نام و نام خانوادگی الزامی است';
    }
    else if(ph_number == ""){
        ph_numberErr.innerText = 'وارد کردن شماره تلفن الزامی است *';
    }

    else if(email == ''){
        emailErr.innerText = 'وارد کردن ایمیل الزامی است';
    }

}




