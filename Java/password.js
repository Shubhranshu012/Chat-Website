const pass=document.querySelector(".form input[type='password']");
const toggle=document.querySelector(".form .field i");

function Runner(){
    if(pass.type == "password"){
        pass.type = "text";
    }
    else{
        pass.type = "password";
    }
}