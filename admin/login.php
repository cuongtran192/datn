<?php
session_start();

// Kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Thay bằng tên máy chủ cơ sở dữ liệu của bạn
$username = "root"; // Thay bằng tên đăng nhập cơ sở dữ liệu của bạn
$password = ""; // Thay bằng mật khẩu cơ sở dữ liệu của bạn
$database = "doan1"; // Thay bằng tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra xem dữ liệu đã được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST["userName"];
    $password = $_POST["password"];

    // Chuẩn bị truy vấn SQL với tham số được thay thế bằng dấu ?
    $stmt = $conn->prepare("SELECT * FROM admin WHERE name = ? AND password = ?");
    // Gán giá trị cho các tham số và kiểm soát kiểu dữ liệu
    $stmt->bind_param("ss", $username, $password);

    // Thực thi truy vấn
    $stmt->execute();
    
    // Lấy kết quả của truy vấn
    $result = $stmt->get_result();

    // Kiểm tra xem có bản ghi nào trả về không
    if ($result->num_rows > 0) {
        // Đăng nhập thành công, thiết lập session cho admin
        $_SESSION["admin"] = true;
        // Chuyển hướng đến trang admin_dashboard.php
        header("Location: index.php");
        exit;
    } else {
        // Đăng nhập không thành công, hiển thị thông báo lỗi
        $error_message = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>
<style>
    /* Importing fonts from Google */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #ecf0f3;
}

.wrapper {
    max-width: 350px;
    min-height: 400px;
    margin: 200px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

.logo {
    width: 80px;
    margin: auto;
}

.logo img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
}

.wrapper .name {
    font-weight: 600;
    font-size: 1.4rem;
    letter-spacing: 1.3px;
    padding-left: 10px;
    color: #555;
}

.wrapper .form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    /* border: 1px solid red; */
}

.wrapper .form-field {
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
    color: #555;
}

.wrapper .btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    background-color: #AAAA;
    color: #fff;
    border-radius: 20px;
    box-shadow: 3px 3px 3px #b1b1b1,
        -3px -3px 3px #fff;
    letter-spacing: 1.3px;
}

.wrapper .btn:hover {
    background-color: #abba;
}

.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color: #03A9F4;
}

.wrapper a:hover {
    color: #039BE5;
}

@media(max-width: 380px) {
    .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px;
    }
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Import CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="https://t4.ftcdn.net/jpg/03/08/33/75/360_F_308337583_CahQnaQMDdhkNnAY7Q0k7dhZZFCEmj7p.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            ADMIN LOGIN
        </div>
        <form class="p-3 mt-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <?php if(isset($error_message)): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="userName" id="userName" placeholder="Username" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" required>
            </div>
            <button type="submit" class="btn mt-3">Login</button>
        </form>
    </div>
</body>
</html>
