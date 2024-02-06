<?php
    include_once "config.php";

    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $oldpass=mysqli_real_escape_string($conn, $_POST['old']);
    $newpass=mysqli_real_escape_string($conn, $_POST['new']);
    $Question=mysqli_real_escape_string($conn, $_POST['Question']);

    if(!empty($email) && !empty($oldpass) && !empty($newpass) && !empty($Question)){
        $sql=mysqli_query($conn,"SELECT * FROM users WHERE email='{$email}' AND password='{$oldpass}' AND question='{$Question}'");
        if(mysqli_num_rows($sql)>0){
            $sql2=mysqli_query($conn,"UPDATE users SET password ='{$newpass}' WHERE email = '{$email}' AND question = '{$Question}'");
            if($sql2){
                echo "Success";
            }
            else{
                echo "Something Went Wrong";
            }
        }
        else{
            echo "Invalid Email or Password Or Question";
        }

        $row=mysqli_fetch_assoc($sql);
        $row['password']=$newpass;
    }else{
        echo "Enter All Value";
    }



?>
