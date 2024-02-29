<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-form">
    <h1>Chào mừng đến với <a class="a" href="index.php" >LaptopS</a></h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Đăng ký</h2>
                    <form action="check_log/register_check.php" method="POST">
                    <div class="form-group">
                            <label for="phone">Tên của bạn</label>
                            <input type="text" id="name" name="name" placeholder="Vui lòng nhập tên của bạn" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" id="phone" name="phone" placeholder="Vui lòng nhập số điện thoại của bạn" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu:</label>
                            <input type="password" id="password" name="password" placeholder="Vui lòng nhập mật khẩu của bạn" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Nhập lại mật khẩu:</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Vui lòng nhập lại mật khẩu của bạn" required>
                        </div>
                        <button type="submit">Đăng ký</button>
                    </form>
                    <p class="account">Bạn đã có tài khoản? <a href="login.php">Dâng nhập</a></p>
                </div>
                <div class="form-img">
                    <img src="img/login/1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
