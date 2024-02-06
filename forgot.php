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
        <section class="form Password_change">
            <header>RealTime Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email Addresss</label>
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="field input">
                    <label>OLD Password</label>
                    <input type="password" id="old" name="old" placeholder="Enter Your password" required>
                    <i onclick="Runner()" class="fas fa-eye"></i>
                </div>
                <div class="field input">
                    <label>NEW Password</label>
                    <input type="password" id="new" name="new" placeholder="Enter Your password" required>
                    <i onclick="Runner1()" class="fas fa-eye"></i>
                </div>
                <div class="field input">
                    <label>Birth City Name (Security Question)</label>
                    <input type="text" name="Question" placeholder="Enter City Name" required>
                </div>
                <div class="field button">
                    <input type="submit" name="send" value="Change Password">
                </div>
            </form>
            <div class="link">Dont Have a Account? <a href="Sign_login.php">Login Now</a></div>
        </section>
    </div>
</body>
    <script src="Java/password2.js"></script>
</html>