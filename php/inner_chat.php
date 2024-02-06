<?php
    ////post the message into the database;
    
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id= mysqli_real_escape_string($conn,$_POST['outgoing_id']);
        $incoming_id= mysqli_real_escape_string($conn,$_POST['incoming_id']);
        $message_intake= mysqli_real_escape_string($conn,$_POST['message_intake']);
        
        if(!empty($message_intake)){
            $sql=mysqli_query($conn,"INSERT INTO message (incoming_id , outgoing_id , message_intake) VALUES ({$incoming_id},{$outgoing_id},'{$message_intake}')");
        }
    }
    else{
        header("location: ../login.php");
    }

?>