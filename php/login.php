<?php
    session_start();
    include_once "config.php";
    
    ////mysqli_real_escape_string()  is nothing but it removes all the spaces in the input 
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($email) && !empty($password)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $sql =mysqli_query($conn ,"SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
            if(mysqli_num_rows($sql)>0){
                $row=mysqli_fetch_assoc($sql);
                $status="Active";
                $sql2=mysqli_query($conn,"UPDATE users SET status = '{$status}' WHERE unique_id={$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id']=$row['unique_id'];
                    echo "Success";
                }
            }
            else{
                echo "Wrong Email or Password";
            }
        }
        else{
            echo "Enter a valid Email";
        }
    }
    else{
        echo "Enter Email or Password";
    }
?>