<?php
// Khởi động session
session_start();

// Xóa session của admin nếu nó tồn tại
if (isset($_SESSION["admin"])) {
    unset($_SESSION["admin"]);
}

// Chuyển hướng người dùng đến trang đăng nhập
header("Location: login.php");
exit;
?>
