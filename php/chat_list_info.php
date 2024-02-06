<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id_1 = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
        $incoming_id_1 = mysqli_real_escape_string($conn,$_POST['incoming_id']);
        
        $sql = mysqli_query($conn,"SELECT * FROM message WHERE incoming_id = {$incoming_id_1} AND outgoing_id ={$outgoing_id_1} OR incoming_id = {$outgoing_id_1} AND outgoing_id ={$incoming_id_1} ORDER BY message_id DESC");

        //sql1 and row1 for the person message is sent to or the reciver
        $sql1=mysqli_query($conn,"SELECT * FROM users WHERE unique_id = {$incoming_id_1}");
        $row1=mysqli_fetch_assoc($sql1);

        $out = "";
        if(mysqli_num_rows($sql)>0){
            while($row = mysqli_fetch_assoc($sql)){
                if($row['outgoing_id'] === $outgoing_id_1){
                    $out.='
                    <div class="chat outgoing">
                        <div class="details">
                            <p>'.$row['message_intake'].'</p>
                        </div>
                    </div>';
                }
                else{
                    $out.='
                    <div class="chat incoming">
                        <img src="php/images/'.$row1['img'].'" alt="">
                        <div class="details">
                            <p>'.$row['message_intake'].'</p>
                        </div>
                    </div>';
                }
            }
            echo $out;
        }
    }
    else{
        header("location: ../login.php");
    }


?>