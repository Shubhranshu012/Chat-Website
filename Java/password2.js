const pass=document.getElementById("old");
const pass1=document.getElementById("new");

const form =document.querySelector(".form form");
const error_text=document.querySelector(".error-txt");
const continueBtn=document.querySelector(".button input");


function Runner(){
    if(pass.type == "password"){
        pass.type = "text";
    }
    else{
        pass.type = "password";
    }
}

function Runner1(){
    if(pass1.type == "password"){
        pass1.type = "text";
    }
    else{
        pass1.type = "password";
    }
}


form.onsubmit = (e)=>{
    e.preventDefault();
}
continueBtn.onclick = ()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST" ,"php/Password_change_php.php",true);

    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;   //gets the data forom the php server
                console.log(data);
                if(data == "Success"){
                    location.href="login.php";
                }
                else{
                    error_text.innerHTML=data;
                    error_text.style.display="block";
                }
            }
        }
    }
    let formdata= new FormData(form);

    xhr.send(formdata);
};    
