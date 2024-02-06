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
        <section class="form signup">
            <header>RealTime Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Addresss</label>
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Password" required>
                    <i onclick="Runner()" class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="send" value="Continue To Chat">
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Login Now</a></div>
        </section>
    </div>
</body>
    <script src="Java/password.js"></script>
    <script src="JAva/signup.js"></script>
</html>