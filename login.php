<?php
// start the session
session_start();

// check if the user submitted the login form
if (isset($_POST['submit'])) {
    // get the submitted username and password
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // check if the phone and password are correct
    if ($phone === 'admin' && $password === '123456') {
        // set the phone in the session
        $_SESSION['phone'] = $phone;

        // redirect to the home page
        header('Location: index.php');
        exit;
    } else {
        // display an error message
        echo 'Incorrect phone or password';
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-form">
        <h1>Chào mừng đến với <a class="a" href="index.php" >LaptopS</a></h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Đăng nhập</h2>
                    <form action="check_log/login_check.php" method="POST">
    <div class="form-group">
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
    </div>
    <button type="submit">Đăng nhập</button>
</form>

                    <p class="account">Bạn chưa có tài khoản? <a href="signup.php">Đăng ký</a></p>
                </div>
                <div class="form-img">
                    <img src="img/login/1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
