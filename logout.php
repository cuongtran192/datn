<?php
// Khởi động session
session_start();

// Xóa session của admin nếu nó tồn tại
if (isset($_SESSION["phone"])) {
    unset($_SESSION["phone"]);
}

// Chuyển hướng người dùng đến trang đăng nhập
header("Location: index.php");
exit;
?>
