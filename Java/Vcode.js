
const form =document.querySelector(".form form");
const error_text=document.querySelector(".error-txt");
const continueBtn=document.querySelector(".button input");

form.onsubmit = (e)=>{
    e.preventDefault();
}
continueBtn.onclick = ()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST" ,"php/Vcode_php.php",true);

    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;   //gets the data forom the php server
                console.log(data);
                if(data == "Success"){
                    location.href="users.php";
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