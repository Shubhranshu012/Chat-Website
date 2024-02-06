<?php
    session_start();
    include_once "config.php";
    $out_going=$_SESSION['unique_id'];
    $SerchTerm=mysqli_real_escape_string($conn,$_POST['SerchTerm']);
    $out="";

    $sql=mysqli_query($conn,"SELECT * FROM users WHERE NOT unique_id={$out_going} AND (fname LIKE '%{$SerchTerm}' OR lname LIKE '%{$SerchTerm}%')");
    if(mysqli_num_rows($sql)>0){
        while($row=mysqli_fetch_assoc($sql)){
            $sql3=mysqli_query($conn,"SELECT * FROM message WHERE (incoming_id={$row['unique_id']} OR outgoing_id={$row['unique_id']}) AND (outgoing_id={$out_going} OR incoming_id={$out_going}) ORDER BY 	message_id DESC LIMIT 1");
            $row3=mysqli_fetch_assoc($sql3);

            if(mysqli_num_rows($sql3)>0){
                $result=$row3['message_intake'];
            }
            else{
                $result="No Message";
            }
            (strlen($result)>28) ? $msg=substr($result,0,28).'...' : $msg=$result;
            ($out_going == $row3['outgoing_id'])?$you="You:" :$you="";
            ($row['status']=="Offline") ? $offline="offline" : $offline="";
            $out .='
            <a href="chat.php?user_id='.$row['unique_id'].'">
                <div class="content">
                    <img src="php/images/'.$row['img'].'" alt="">
                    <div class="details">
                        <span>'.$row['fname']." ".$row['lname'].'</span>
                        <p>'.$you.$msg.'</p>
                    </div>
                </div>
                <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
            </a>';
        }  
    }
    else{
        $out .= "No User found";
    }

    echo $out;
?>