<?php
// Thực hiện kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root"; // Thay username bằng tên người dùng MySQL của bạn
$password = ""; // Thay password bằng mật khẩu MySQL của bạn
$dbname = "doan1"; // Thay myDB bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
?>
