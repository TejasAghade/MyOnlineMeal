let form = document.getElementById('form');
let email = document.getElementById('email');
let password = document.getElementById('password');
let error = document.getElementById('error')
let no_email = document.getElementById('no-email')
let no_pass = document.getElementById('no-pass')


form.addEventListener('submit', (e)=>{
    let messages = []

    if(email.value=='' && password.value ==''){
        messages.push("all fields required")
        e.preventDefault();
        error.innerText = messages

    }else{

        if(email.value == '' || email.value == null){
            messages.push("*Please enter your email")
            e.preventDefault();
            no_email.innerText = messages
        }
        
        if(password.value == '' || password.value == null){
            messages.push("*Please enter your password")
            e.preventDefault();
            no_pass.innerText = messages

        }
    }



})