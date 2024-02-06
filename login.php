<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location:users.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>RealTime Chat App</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email Addresss</label>
                    <input type="email" name="email" placeholder="Enter Your Email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Password">
                    <i onclick="Runner()" class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue To Chat">
                </div>
            </form>
            <div class="link">Not Yet Signed up? <a href="Sign_login.php">Signup Now</a></div>
        </section>
    </div>
</body>

<script src="Java/password.js"></script>
<script src="Java/login.js"></script>
</html>