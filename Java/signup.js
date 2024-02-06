const form =document.querySelector(".signup form");
const continueBtn=document.querySelector(" .button input");
const error_text=document.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault();
}
continueBtn.onclick = ()=>{
    
    let xhr=new XMLHttpRequest();

    xhr.open("POST" ,"php/signup.php",false);

    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;   //gets the data forom the php server
                if(data == "Success"){
                    location.href="vcode_img.php";
                }
                else{
                    error_text.innerHTML=data;
                    error_text.style.display="block";
                }
            }
        }
    }

    //as we are accesssing the php through the ajax so we have to senr the form details via ajax as the php cannot acces it 

    let formdata= new FormData(form);

    xhr.send(formdata);
}