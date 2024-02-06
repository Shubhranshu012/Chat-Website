const form=document.querySelector(".typing-area");
const button1=document.querySelector(".typing-area button");
const text_input=document.querySelector(".input_field");
const chat_box=document.querySelector(".chat-box");

form.onsubmit=(e)=>{
    e.preventDefault();
}
chat_box.onmouseenter=()=>{
    chat_box.classList.add("moving");
}
chat_box.onmouseleave=()=>{
    chat_box.classList.remove("moving");
}

button1.onclick=()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST" ,"php/inner_chat.php",true);

    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                text_input.value ="";
                scroll();
            }
        }
    }

    //as we are accesssing the php through the ajax so we have to senr the form details via ajax as the php cannot acces it 

    let formdata= new FormData(form);

    xhr.send(formdata);
}

setInterval(()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST" ,"php/chat_list_info.php",true);

    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;   //gets the data forom the php server
                chat_box.innerHTML=data;
                if(!chat_box.classList.contains("moving")){
                    scroll();
                }
            }
        }
    }
    
    let formdata= new FormData(form);
    xhr.send(formdata);

},500);

function scroll(){
    chat_box.scrollTop=chat_box.scrollHeight;
}

