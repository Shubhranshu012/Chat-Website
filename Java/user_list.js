const user_list=document.querySelector('.users .users-list');
const search_bar=document.querySelector('.users .search input');

search_bar.onkeyup=()=>{
    let search_info = search_bar.value;
    if(search_info!=""){
        search_bar.classList.add("Working");
    }
    else{
        search_bar.classList.remove("Working");
    }    
        let xhr=new XMLHttpRequest();
        xhr.open("POST" ,"php/user_search.php",true);

        xhr.onload =()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data=xhr.response;   //gets the data forom the php server
                    user_list.innerHTML=data;
                }
            }
        }
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");  ///mosty used in time of post predifenes the type of data posted 
        xhr.send("SerchTerm="+search_info);   ///The search Term Will be the variable name name in the php
}


setInterval(()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("GET" ,"php/users_list.php",true);

    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;   //gets the data forom the php server
                if(!search_bar.classList.contains("Working")){
                    user_list.innerHTML=data;
                }
            }
        }
    }

    xhr.send();

},500);