<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../../css/style.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-9I6oIH7yCJUD6E+0oxzeboFzJg7VYY3qFmxO7VhtXRSIOYRgJlOyZF/lcGwtpNy0+gZ5RtZfLxj2Q9i1gs5y1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<script>
    $(document).ready(function(){
    $(".dropdown-toggle").click(function(){
        $(".dropdown-menu").toggle();
    });
});
</script>
    <div class="header">
        <div class="menu">
            <div class="logo">
                <a href="../../index.php">
                    <img src="../../img/logo/logo.png" alt="Logo">
                </a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Bạn cần tìm gì..." class="search-input">
                <button type="submit" class="search-button">Tìm kiếm</button>
            </div>
            <div class="contact">
                <img src="../../img/logo/phone-icon.png" alt="Phone Icon">
                <span class="contact-text">Liên hệ <br> tư vấn</span>
            </div>
            <div class="warranty">
                <img src="../../img/logo/globe-icon.png" alt="Globe Icon">
                <span class="warranty-text">Chính sách <br> bảo hành</span>
            </div>
            <div class="cart">
   <a href="cart.php" style="text-decoration: none;">
    <img src="../../img/logo/cart-icon.png" alt="Cart Icon">
    <span class="cart-text">Giỏ hàng <br> của bạn</span>
</a>

</div>

            <div class="user">
<?php
// Thực hiện kết nối tới cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'doan1');

// Kiểm tra kết nối có thành công không
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tiếp tục thực hiện truy vấn và xử lý dữ liệu

session_start(); // Bắt đầu session trước khi sử dụng

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['phone'])) {
    $phone = $_SESSION['phone'];
    // Truy vấn tên người dùng từ cơ sở dữ liệu
    $sql = "SELECT name FROM users WHERE phone = '$phone'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
    } else {
        $name = ''; // Nếu không tìm thấy tên, gán giá trị mặc định là rỗng
    }

    // Nếu đã đăng nhập, hiển thị tên người dùng
    echo '
    <div class="dropdown">
        <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
            <img src="../../img/logo/user-icon.png" alt="User Icon" style="margin-bottom: -5px;">
            <span class="user-text">Xin chào!<br>' . $name . '</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="width: 200px;">
        <li><a class="dropdown-item text-danger  mb-2" href="../../user.php">Thông tin cá nhân</a></li>
        <li><a class="dropdown-item text-primary " href="../../logout.php">Đăng xuất</a></li>
    </ul>
    
    </div>';
    
} else {
    // Nếu chưa đăng nhập, hiển thị nút Đăng nhập/Đăng ký
    echo '
    <a href="../../login.php" style="text-decoration: none;">
        <img src="../../img/logo/user-icon.png" alt="User Icon">
        <span class="user-text">Đăng nhập <br> & Đăng Ký</span>
    </a>';
}

?>


            </div>
        </div>
    </div>
</div>
<!-- Thêm thư viện jQuery vào trước khi thêm mã JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- HTML -->
<style>
    .navbar-nav .nav-link {
        font-size: 20px; /* Đặt kích thước chữ là 20px */
    }
</style>
<nav class="navbar navbar-expand-lg " style="margin-left: 11.3rem;">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                        Danh mục sản phẩm
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown" style="position: absolute; transform: translate3d(0px, 0px, 0px); top: 100%; left: 130px; will-change: transform; z-index: 100;">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Laptop</a>
                            <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown" style="position: absolute; transform: translate3d(0px, 0px, 0px); top: 0px; left: 100%; will-change: transform;">
                                <li><a class="dropdown-item" href="../laptopgaming.php">Laptop Gaming</a></li>
                                <li><a class="dropdown-item" href="../laptopdohoa.php">Laptop Đồ Họa</a></li>
                                <li><a class="dropdown-item" href="../laptopvanphong.php">Laptop Văn Phòng</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="">Hãng Laptop</a>
                                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown" style="position: absolute; transform: translate3d(0px, 0px, 0px); top: 0px; left: 100%; will-change: transform;">
                                    <li><a class="dropdown-item" href="asus.php">Asus</a></li>
                                        <li><a class="dropdown-item" href="acer.php">Acer</a></li>
                                        <li><a class="dropdown-item" href="msi.php">MSI</a></li>
                                        <li><a class="dropdown-item" href="dell.php">Dell</a></li>
                                        <li><a class="dropdown-item" href="lenovo.php">Lenovo</a></li>
                                        <li><a class="dropdown-item" href="hp.php">Hp</a></li>
                                        <li><a class="dropdown-item" href="gigabyte.php">Gigabyte</a></li>
                                        <!-- Thêm các hãng laptop khác ở đây -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../chuot.php">Chuột</a></li>
                        <li><a class="dropdown-item" href="../banphim.php">Bàn Phím</a></li>
                        <li><a class="dropdown-item" href="../tainghe.php">Tai Nghe</a></li>
                        <li><a class="dropdown-item" href="../balo.php">Balo</a></li>
                    </ul>
                    
                </li>
            </ul>
        <style>
            
    .nav-link:hover {
        animation: pulse 0.5s infinite alternate; /* Sử dụng animation với tên pulse, thời gian 0.5s, và lặp vô hạn */
    }

    @keyframes pulse {
        from { transform: scale(1); } /* Scale từ kích thước gốc */
        to { transform: scale(1.1); } /* Scale lớn hơn 110% */
    }
</style>

<ul class="navbar-nav me-auto mb-3 mb-lg-0" style="text-align: right;">
    <li class="nav-item" style="margin-right: 80px;margin-top: 5px">
        <a href="#" class="nav-link">
            <img src="../../img/logo/check.png" alt="Check Icon" style="width: 40px; height: 40px;">
            Cam kết chính hãng
        </a>
    </li>
    <li class="nav-item" style="margin-right: 80px;margin-top: 5px">
        <a href="#" class="nav-link">
            <img src="../../img/logo/freeship.png" alt="Truck Icon" style="width: 40px; height: 40px;">
            Miễn phí vận chuyển
        </a>
    </li>
    <li class="nav-item" style="margin-right: 80px;margin-top: 5px">
        <a href="#" class="nav-link">
            <img src="../../img/logo/monney.png" alt="Chat Icon" style="width: 40px; height: 40px;">
            Giá tốt nhất
        </a>
    </li>
    <li class="nav-item" style="margin-right: 80px;margin-top: 5px">
        <a href="#" class="nav-link">
            <img src="../../img/logo/phone.png" alt="Chat Icon" style="width: 40px; height: 40px;">
            Hỗ trợ 24/7
        </a>
    </li>
</ul>


        </div>
    </div>
</nav>


    <!-- Các phần tử và mã HTML khác ở đây -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-36Q4W51J8pfrKo4MszP4PijI6asp2rfruh27qspn4pC/rpIEj5K7vr/v5zE0rJGc" crossorigin="anonymous"></script>
    <hr class="section-divider">
</html>

<!-- JavaScript để xử lý dropdown -->
<script>
  $(document).ready(function(){
  // Xử lý khi di chuột vào một mục có dropdown
  $('.dropdown-submenu').on("mouseenter", function(){
    $(this).children('.dropdown-menu').show(); // Hiển thị danh sách con
  });
  
  // Xử lý khi di chuột ra khỏi một mục có dropdown
  $('.dropdown-submenu').on("mouseleave", function(){
    $(this).children('.dropdown-menu').hide(); // Ẩn danh sách con
  });
});
</script>