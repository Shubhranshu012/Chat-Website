<?php
    session_start();
    include_once "config.php";
    $code=mysqli_real_escape_string($conn, $_POST['code']);
    $Question=mysqli_real_escape_string($conn, $_POST['Question']);
    if(!empty($code) && !empty($Question)){
        if($code === $_SESSION['Vcode']){
            if(isset($_FILES['image'])){  //// $_FILE gives a array about the file
                $image_name = $_FILES['image']['name'];
                $temp_name = $_FILES['image']['tmp_name'];
                $image_explode=explode('.',$image_name);
                $image_ext=end($image_explode);
                $extention= ['png', 'jpeg', 'jpg'];
                if(in_array($image_ext , $extention) === true){
                    $time=time();
                    $new_image_name=$time.$image_name;
                    if(move_uploaded_file($temp_name,"images/" .$new_image_name)){
                        $status = "Active";
                        $random_id=rand(time(),10000000);
                        $sql2=mysqli_query($conn , "INSERT INTO users(unique_id,fname,lname,email,password,img,status,question) VALUES ({$random_id},'{$_SESSION['fname']}','{$_SESSION['lname']}','{$_SESSION['email']}','{$_SESSION['password']}','{$new_image_name}','{$status}','{$Question}')");    
                        if($sql2){
                            $sql3=mysqli_query($conn,"SELECT * FROM users WHERE email= '{$_SESSION['email']}'");
                            if(mysqli_num_rows($sql3) >0){
                                $row=mysqli_fetch_assoc($sql3);  ///return the entire row for the current email;

                                $_SESSION['unique_id']=$row['unique_id'];

                                echo "Success";
                            }
                        }
                        else{
                            echo "Error";
                        }
                    }
                    else{
                        echo "SomeThing Went Wrong!";
                    }
                }    
                else{
                    echo "Please Select an Image File - jpeg , jpg, png";
                }
            }    
        }
        else{
            echo "Not valid";
        }
    }
    else{
        echo "Enter code";
    }

?>