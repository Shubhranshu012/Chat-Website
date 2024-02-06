<?php
    session_start();
    include_once "config.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    //required files
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    function runner(){
    // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();                        // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';   // Set the SMTP server to send through
        $mail->SMTPAuth   = true;               // Enable SMTP authentication
        $mail->Username   = '';                 // SMTP write your email
        $mail->Password   = '';                 // SMTP password
        $mail->SMTPSecure = 'ssl';              // Enable implicit SSL encryption
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('', 'Sender Name');     // Sender Email and name
        $mail->addAddress($_SESSION['Email']); // Add a recipient email
        $mail->addReplyTo('', 'Coder');         // Reply to sender email

        // Content
        $mail->isHTML(true);                    // Set email format to HTML
        $mail->Subject = "Text pratice";     // Email subject headings
        $mail->Body    = "{$_SESSION['Vcode']}";            // Email message

        // Success sent message alert
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }


    $fname=mysqli_real_escape_string($conn, $_POST['fname']);  ////mysqli_real_escape_string()  is nothing but it removes all the spaces in the input 
    $lname=mysqli_real_escape_string($conn, $_POST['lname']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){   ////just a filter that validate the Email Format
            $sql =mysqli_query($conn ,"SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql)>0){
                echo "This Email already Exists!";
            }
            else{
                
                $time=time();
                $status = "Active";
                $random_id=rand(time(),10000000);
                $code=bin2hex(random_bytes(3));
                
                $_SESSION['email']=$email;
                $_SESSION['fname']=$fname;
                $_SESSION['lname']=$lname;
                $_SESSION['Vcode']=$code;
                $_SESSION['password']=$password;
                if(runner() === true){
                    echo "Success";
                }
                else{
                    echo "SomeThing Went Wrong!";
                }    
            }
        }else{
            echo "Emter valid Email";
        }
    }
    else{
        echo "Enter Email";
    }

?>