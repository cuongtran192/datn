
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/style.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-9I6oIH7yCJUD6E+0oxzeboFzJg7VYY3qFmxO7VhtXRSIOYRgJlOyZF/lcGwtpNy0+gZ5RtZfLxj2Q9i1gs5y1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<div class="overlay" id="overlay"></div>
<div id="myModal" class="modal">   
    <span class="close">&times;</span>
    <img class="modal-content" src="img/banner/xin.png" alt="Image">
</div>

<script>
// Lấy modal và overlay
var modal = document.getElementById("myModal");
var overlay = document.getElementById("overlay");

// Lấy biểu tượng đóng
var span = document.getElementsByClassName("close")[0];

// Khi người dùng click vào biểu tượng đóng, đóng modal và ẩn overlay
span.onclick = function() {
    modal.style.display = "none";
    overlay.style.display = "none";
}

// Khi người dùng click bất kỳ đâu ngoài modal, đóng modal và ẩn overlay
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        overlay.style.display = "none";
    }
}

// Hiển thị modal và overlay khi trang được tải
window.onload = function() {
    modal.style.display = "block";
    overlay.style.display = "block";
}
</script>

    <div class="header">
        <div class="menu">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo/logo.png" alt="Logo">
                </a>
            </div>
            <div class="search-bar">
            <form action="search.php" method="GET" class="search-form">
    <input type="text" name="query" placeholder="Bạn cần tìm gì..." class="search-input">
    <button type="submit" class="search-button">Tìm kiếm</button>
            </form>
            </div>
            <div class="contact">
                <img src="img/logo/phone-icon.png" alt="Phone Icon">
                <span class="contact-text">Liên hệ <br> tư vấn</span>
            </div>
            <div class="warranty">
                <img src="img/logo/globe-icon.png" alt="Globe Icon">
                <span class="warranty-text">Chính sách <br> bảo hành</span>
            </div>
            <div class="cart">
            <a href="cart.php" style="text-decoration: none;">
    <img src="img/logo/cart-icon.png" alt="Cart Icon">
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
      // Nếu đã đăng nhập, hiển thị tên người dùng
      echo '
      <div class="dropdown">
          <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
              <img src="img/logo/user-icon.png" alt="User Icon" style="margin-bottom: -5px;">
              <span class="user-text">Xin chào!<br>' . $name . '</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="width: 200px;">
          <li><a class="dropdown-item text-danger  mb-2" href="user.php">Thông tin cá nhân</a></li>
          <li><a class="dropdown-item text-primary " href="logout.php">Đăng xuất</a></li>
      </ul>
      
      </div>';
      
  } else {
      // Nếu chưa đăng nhập, hiển thị nút Đăng nhập/Đăng ký
      echo '
      <a href="login.php" style="text-decoration: none;">
          <img src="img/logo/user-icon.png" alt="User Icon">
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
<nav class="navbar navbar-expand-lg " style="margin-left: 11.3rem;margin-top:1rem">
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
                                <li><a class="dropdown-item" href="product/laptopgaming.php">Laptop Gaming</a></li>
                                <li><a class="dropdown-item" href="product/laptopdohoa.php">Laptop Đồ Họa</a></li>
                                <li><a class="dropdown-item" href="product/laptopvanphong.php">Laptop Văn Phòng</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="">Hãng Laptop</a>
                                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown" style="position: absolute; transform: translate3d(0px, 0px, 0px); top: 0px; left: 100%; will-change: transform;">
                                        <li><a class="dropdown-item" href="product/brand/asus.php">Asus</a></li>
                                        <li><a class="dropdown-item" href="product/brand/acer.php">Acer</a></li>
                                        <li><a class="dropdown-item" href="product/brand/msi.php">MSI</a></li>
                                        <li><a class="dropdown-item" href="product/brand/dell.php">Dell</a></li>
                                        <li><a class="dropdown-item" href="product/brand/lenovo.php">Lenovo</a></li>
                                        <li><a class="dropdown-item" href="product/brand/hp.php">Hp</a></li>
                                        <li><a class="dropdown-item" href="product/brand/gigabyte.php">Gigabyte</a></li>
                                        <!-- Thêm các hãng laptop khác ở đây -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="product/chuot.php">Chuột</a></li>
                        <li><a class="dropdown-item" href="product/banphim.php">Bàn Phím</a></li>
                        <li><a class="dropdown-item" href="product/tainghe.php">Tai Nghe</a></li>
                        <li><a class="dropdown-item" href="product/balo.php">Balo</a></li>
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
            <img src="img/logo/check.png" alt="Check Icon" style="width: 40px; height: 40px;">
            Cam kết chính hãng
        </a>
    </li>
    <li class="nav-item" style="margin-right: 80px;margin-top: 5px">
        <a href="#" class="nav-link">
            <img src="img/logo/freeship.png" alt="Truck Icon" style="width: 40px; height: 40px;">
            Miễn phí vận chuyển
        </a>
    </li>
    <li class="nav-item" style="margin-right: 80px;margin-top: 5px">
        <a href="#" class="nav-link">
            <img src="img/logo/monney.png" alt="Chat Icon" style="width: 40px; height: 40px;">
            Giá tốt nhất
        </a>
    </li>
    <li class="nav-item" style="margin-right: 80px;margin-top: 5px">
        <a href="#" class="nav-link">
            <img src="img/logo/phone.png" alt="Chat Icon" style="width: 40px; height: 40px;">
            Hỗ trợ 24/7
        </a>
    </li>
</ul>


        </div>
    </div>
</nav>


    <!-- Các phần tử và mã HTML khác ở đây -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-36Q4W51J8pfrKo4MszP4PijI6asp2rfruh27qspn4pC/rpIEj5K7vr/v5zE0rJGc" crossorigin="anonymous"></script>

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

<style>
 
 .slideshow-container {
    position: relative;
    max-width: 880px;
    margin: auto;
    overflow: hidden;
    padding-top: 0px;
}

.slide-wrapper {
    display: flex;
    width: 300%; /* Tăng kích thước để chứa 3 hình ảnh */
    transition: transform 0.5s ease;
}

.slide {
    flex: 0 0 33.33%; /* Đặt kích thước cho mỗi slide */
    padding: 0 0px; /* Khoảng cách giữa các hình ảnh */
    box-sizing: border-box; /* Đảm bảo padding không làm thay đổi kích thước của slide */
}

.slide img {
    width: 100%;
    height: auto;
}

.prev, .next {
    position: absolute;
    top: 40%; /* Đặt vị trí của nút ở giữa theo chiều dọc */
    transform: translateY(-50%);
    background-color: transparent;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 24px;
    border-radius: 50%; /* Đặt hình dạng bo tròn cho nút */
    width: 40px; /* Độ rộng của nút */
    height: 50px; /* Chiều cao của nút */
    display: flex;
    justify-content: center;
    align-items: center;
    color: white; /* Màu chữ của nút */
    background-color: rgba(0, 0, 0, 0.5); /* Màu nền của nút */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Hiển thị bóng cho nút */
}

.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.7); /* Hiển thị màu nền khi di chuột qua */
}

.prev {
    left: 550px;
}

.next {
    right: 550px;
}

.content-box {
    position: absolute;
    top: 50%;
    right: 200px; /* Cách lề phải 200px */
    transform: translateY(-50%);
    width: 280px; /* Độ rộng của ô */
    height: 410px; /* Chiều cao của ô */
    background-color: white; /* Màu nền trắng */
    border: 1px solid red; /* Viền màu đỏ */
    border-radius: 15px; /* Bo góc */
    top: 460px;
   
}
.content-box1 {
    position: absolute;
    top: 50%;
    left: 190px; /* Cách lề phải 200px */
    transform: translateY(-50%);
    width: 290px; /* Độ rộng của ô */
    height: 410px; /* Chiều cao của ô */
    background-color: white; /* Màu nền trắng */
    border: 1px solid blue; /* Viền màu đỏ */
    border-radius: 15px; /* Bo góc */
    top: 460px;
   
}
    .contact-info p {
        color: white; /* Màu chữ trắng */
    }
    @keyframes blink {
    0% { color: white; }
    20% { color: red; }
    50% { color: white; }
    100% { color: BLACK; }
}

.blink {
    animation: blink 3s infinite;

}
@keyframes blink1 {
    0% { color: white; }
    20% { color: red; }
    50% { color: white; }
    100% { color: BLACK; }
}

.blink1 {
    animation: blink 6s infinite;
    
}
.highlight {
            font-weight: bold;
            color: red;
            font-style: italic;
            border-radius: 50%;
            padding: 0px;
}


    </style>
</head>
<body>
<hr class="section-divider">
<div class="container mx-1">
    <div class="content-box1 mx-3">
    <p class="text-danger mt-3"><b>THÔNG TIN KHUYẾN MÃI</b> </p>
    
        <p class="blink1 text-center mb-2"><span class="highlight"></span>• Tặng Balo chống sốc hoặc túi sách laptophub trị giá 190.000đ</p>
        <p class="blink1 text-center mb-2"><span class="highlight"></span>• 1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. </p>
        <p class="blink1 text-center mb-2"><span class="highlight"></span>• Thẻ Gold Member - ƯU ĐÃI trị giá 1.290.000đ</p>
        <p class="blink1 text-center mb-2"><span class="highlight"></span>• Tặng bàn di chuột gaming XXL 80x30 cm</p>
        <p class="blink1 text-center mb-2"><span class="highlight"></span>• Vệ sinh máy miễn phí trên toàn hệ thống</p>
        <p class="blink1 text-center mb-2"><span class="highlight"></span>• giảm giá khủng cho học sinh/sinh viên toàn quốc</p>
        
    </div>
</div>
<div class="slideshow-container">
    <div class="slide-wrapper">
        <div class="slide">
            <img src="img/banner/1.jpg" alt="Slide 1">
        </div>
        <div class="slide">
            <img src="img/banner/2.png" alt="Slide 2">
        </div>
        <div class="slide">
            <img src="img/banner/3.jpg" alt="Slide 3">
        </div>
    </div>
</div>

<button class="prev" onclick="prevSlide()">&#10094;</button>
<button class="next" onclick="nextSlide()">&#10095;</button>


<script>
    var slideIndex = 0;
showSlides(slideIndex);

function showSlides(n) {
    var slides = document.querySelectorAll('.slide');
    if (n >= slides.length) {slideIndex = 0}
    if (n < 0) {slideIndex = slides.length - 2} // Đổi 0 thành slides.length - 2

    var offset = -slideIndex * 33.33;
    document.querySelector('.slide-wrapper').style.transform = 'translateX(' + offset + '%)';
}


function nextSlide() {
    slideIndex++;
    showSlides(slideIndex);
}

function prevSlide() {
    slideIndex--;
    showSlides(slideIndex);
}
</script>
<div class="container mx-2">
    <div class="content-box mx-1">
    <p class="text-primary mt-2"><b>CÁC ĐẠI LÝ TẠI HÀ NỘI</b> </p>

        <p class="text-dark mt-2"><b>Thanh Xuân-80 Hạ Đình</b></p>
        <div class="row">
            <div class="col-md-10 offset-md-1">
            <div class="contact-info bg-warning text-white rounded-pill p-2 text-center">
                    <p class="mb-0 fs-5 blink">Zalo: 0971.433.911</p>
                </div>
            </div>
        </div>
        <p class="text-dark mt-2 "><b>Hai Bà Trưng-25 Bà Triệu</b></p>
        <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="contact-info bg-warning text-white rounded-pill p-2 text-center">
                    <p class="mb-0 fs-5 blink">Zalo: 0971.433.911</p>
                </div>
            </div>
        </div>
        <p class="text-dark mt-2"><b>Đống Đa-654 Láng Hạ</b></p>
        <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="contact-info bg-warning  rounded-pill p-2 text-center">
            <p class="mb-0 fs-5 blink">Zalo: 0971.433.911</p>
                </div>
            </div>
        </div>
        <p class="text-dark mt-2"><b>Hà Đông-192 Trần Phú</b></p>
        <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="contact-info bg-warning text-white rounded-pill p-2 text-center">
                    <p class="mb-0 fs-5 blink">Zalo: 0971.433.911</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="brand">
    <a href="product/brand/asus.php">
        <img src="img/brand/logo1.png" alt="Logo 1">
    </a>
    <a href="product/brand/msi.php">
        <img src="img//brand/logo2.png" alt="Logo 2">
    </a>
    <a href="product/brand/acer.php">
        <img src="img/brand/logo3.png" alt="Logo 3">
    </a>
    <a href="product/brand/gigabyte.php">
        <img src="img/brand/logo4.png" alt="Logo 4">
    </a>
    <a href="https://example.com">
        <img src="img/brand/logo5.png" alt="Logo 5">
    </a>
    <a href="https://example.com">
        <img src="img/brand/logo6.png" alt="Logo 6">
    </a>
    <a href="product/brand/lenovo.php">
        <img src="img/brand/logo11.png" alt="Logo 11">
    </a>
    <a href="product/brand/hp.php">
        <img src="img/brand/logo10.png" alt="Logo 10">
    </a>
    <a href="product/brand/dell.php">
        <img src="img/brand/logo9.png" alt="Logo 9">
    </a>
    <a href="https://example.com">
        <img src="img/brand/logo8.png" alt="Logo 8">
    </a>
    <a href="https://example.com">
        <img src="img/brand/logo7.png" alt="Logo 7">
    </a>
</div>
<div class="image-container">
    <img src="img/banner/c4.jpg" alt="Image 1" style="width: 500px; height: 200px;">
    <img src="img/banner/c2.jpg" alt="Image 1" style="width: 500px; height: 200px;">
    <img src="img/banner/c3.jpg" alt="Image 1" style="width: 500px; height: 200px;">
</div>

<div class="rectangle-container">
<div class="main-title d-flex justify-content-between align-items-center" style="padding: 0 10px;">
    <div class="title d-flex align-items-center text-center justify-content-center flex-grow-1">
    <img src="img/logo/flash.png" alt="Flash Sale Icon" style="width: 100px; height: 100px; margin-right: 10px;">
        <h3 class="mb-1" style="margin-left: 10px; font-size: 40px; color: white; font-weight: bold;">Flash Sale</h3>
        <div class="deal-time-holder d-flex align-items-center" id="js-time_down" style="margin-left: 20px;">
    <div class="time-item-container d-flex align-items-center mr-2">
        <div class="time-item bg-light text-white rounded-pill px-2 py-1">
            <p class="m-0 font-weight-bold">5 ngày</p>
        </div>
        <div class="separator text-white mx-2">:</div>
    </div>
    <div class="time-item-container d-flex align-items-center mr-2">
        <div class="time-item bg-light text-white rounded-pill px-2 py-1">
            <p class="m-0 font-weight-bold">7 Giờ</p>
        </div>
        <div class="separator text-white mx-2">:</div>
    </div>
    <div class="time-item-container d-flex align-items-center">
        <div class="time-item bg-light text-white rounded-pill px-2 py-1">
            <p class="m-0 font-weight-bold">51 Phút</p>
        </div>
    </div>
</div>

    </div>
    <a href="/deal" class="more-all" style="color:#fff; font-size: 16px; text-decoration: none;">Xem Tất Cả</a>
</div>
<?php
$servername = "localhost";
$username = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu MySQL, nếu có
$dbname = "doan1"; // Tên cơ sở dữ liệu MySQL

// Tạo kết nối
$connect = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$connect) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());

}$sql = "SELECT * FROM product WHERE type_id = 1 ORDER BY discount DESC LIMIT 5";
$counter = 5; // Counter to keep track of number of products in each row

  if ($result = mysqli_query($connect, $sql)) {
    $counter = 0; // Initialize product counter
    echo '<div class="row">';
    echo '<a href="product.php" style="text-decoration: none;">'; // Thay link_den_trang_san_pham.php bằng đường link thực tế
    echo '</a>';
    echo '</div>';

    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 5 == 0) { // Start a new row after every 5 products
            echo '<div class="row justify-content-center custom-margin-bottom">'; // Start a new row
        }

        echo '<div class="col-md-2 custom-margin text-center">';
        echo '<div class="product-card bg-white">'; // Add bg-white class to keep white background
        echo '<a href="product.php?id=' . $row['product_id'] . '">'; // Thêm ID của sản phẩm vào đường link
        echo '<img class="card-img-top" src="' . $row['image_link_1'] . '" alt="">';
        echo '</a>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . str_replace(", ", "<br>", $row['description']) . '</p>';

        $originalPrice = $row['price'];
        $discountPercentage = $row['discount'];
        $discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

        echo '<h5 class="card-text discounted-price">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';
        echo '<div class="rounded-pill bg-danger text-white">' . -intval($discountPercentage) . '%</div>';
        echo '<h6 class="card-text price">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';
        echo '</div>'; // Close card-body
        echo '<div class="card-footer"></div>'; // Empty card-footer
        echo '</div>'; // Close product-card
        echo '</div>'; // Close col-md-3

        $counter++;

        if ($counter % 5 == 0) { // Close the row after every 5 products
            echo '</div>';
        }
    }
    mysqli_free_result($result);
} else {
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
}
?>

<div>
    <h2 style="color: black; font-size: 30px; margin-top: 40px;">LAPTOP GAMING SIÊU ƯU ĐÃI</h2>
    </div>
    <hr class="section-divider">
<?php
if (!$connect) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
  $sql = "SELECT * FROM product WHERE purpose_id='3'LIMIT 5";
  $counter = 0; // Counter to keep track of number of products in each row

  if ($result = mysqli_query($connect, $sql)) {
    $counter = 0; // Initialize product counter
    echo '<div class="row">';
    echo '<a href="product.php" style="text-decoration: none;">'; // Thay link_den_trang_san_pham.php bằng đường link thực tế
    echo '</a>';
    echo '</div>';

    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 5 == 0) { // Start a new row after every 5 products
            echo '<div class="row justify-content-center custom-margin-bottom">'; // Start a new row
        }

        echo '<div class="col-md-2 custom-margin text-center">';
        echo '<div class="product-card bg-white">'; // Add bg-white class to keep white background
        echo '<a href="product.php?id=' . $row['product_id'] . '">'; // Thêm ID của sản phẩm vào đường link
        echo '<img class="card-img-top" src="' . $row['image_link_1'] . '" alt="">';
        echo '</a>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . str_replace(", ", "<br>", $row['description']) . '</p>';

        $originalPrice = $row['price'];
        $discountPercentage = $row['discount'];
        $discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

        echo '<h5 class="card-text discounted-price">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';
        echo '<div class="rounded-pill bg-danger text-white">' . -intval($discountPercentage) . '%</div>';
        echo '<h6 class="card-text price">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';
        echo '</div>'; // Close card-body
        echo '<div class="card-footer"></div>'; // Empty card-footer
        echo '</div>'; // Close product-card
        echo '</div>'; // Close col-md-3

        $counter++;

        if ($counter % 5 == 0) { // Close the row after every 5 products
            echo '</div>';
        }
    }
    mysqli_free_result($result);
} else {
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
}
?>

<div>
    <h2 style="color: black; font-size: 30px; margin-top: 40px;">LAPTOP VĂN PHÒNG HOT</h2>
    </div>
    <hr class="section-divider">

    <?php
if (!$connect) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
  $sql = "SELECT * FROM product WHERE purpose_id='1'LIMIT 5";
  $counter = 0; // Counter to keep track of number of products in each row

  if ($result = mysqli_query($connect, $sql)) {
    $counter = 0; // Initialize product counter
    echo '<div class="row">';
    echo '<a href="product.php" style="text-decoration: none;">'; // Thay link_den_trang_san_pham.php bằng đường link thực tế
    echo '</a>';
    echo '</div>';

    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 5 == 0) { // Start a new row after every 5 products
            echo '<div class="row justify-content-center custom-margin-bottom">'; // Start a new row
        }

        echo '<div class="col-md-2 custom-margin text-center">';
        echo '<div class="product-card bg-white">'; // Add bg-white class to keep white background
        echo '<a href="product.php?id=' . $row['product_id'] . '">'; // Thêm ID của sản phẩm vào đường link
        echo '<img class="card-img-top" src="' . $row['image_link_1'] . '" alt="">';
        echo '</a>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . str_replace(", ", "<br>", $row['description']) . '</p>';

        $originalPrice = $row['price'];
        $discountPercentage = $row['discount'];
        $discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

        echo '<h5 class="card-text discounted-price">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';
        echo '<div class="rounded-pill bg-danger text-white">' . -intval($discountPercentage) . '%</div>';
        echo '<h6 class="card-text price">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';
        echo '</div>'; // Close card-body
        echo '<div class="card-footer"></div>'; // Empty card-footer
        echo '</div>'; // Close product-card
        echo '</div>'; // Close col-md-3

        $counter++;

        if ($counter % 5 == 0) { // Close the row after every 5 products
            echo '</div>';
        }
    }
    mysqli_free_result($result);
} else {
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
}
?>
<div>
    <h2 style="color: black; font-size: 30px; margin-top: 40px;">LAPTOP ĐỒ HỌA KHỦNG</h2>
    </div>
    <hr class="section-divider">

    <?php
if (!$connect) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
  $sql = "SELECT * FROM product WHERE purpose_id='2'LIMIT 5";
  $counter = 0; // Counter to keep track of number of products in each row

  if ($result = mysqli_query($connect, $sql)) {
    $counter = 0; // Initialize product counter
    echo '<div class="row">';
    echo '<a href="product.php" style="text-decoration: none;">'; // Thay link_den_trang_san_pham.php bằng đường link thực tế
    echo '</a>';
    echo '</div>';

    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 5 == 0) { // Start a new row after every 5 products
            echo '<div class="row justify-content-center custom-margin-bottom">'; // Start a new row
        }

        echo '<div class="col-md-2 custom-margin text-center">';
        echo '<div class="product-card bg-white">'; // Add bg-white class to keep white background
        echo '<a href="product.php?id=' . $row['product_id'] . '">'; // Thêm ID của sản phẩm vào đường link
        echo '<img class="card-img-top" src="' . $row['image_link_1'] . '" alt="">';
        echo '</a>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . str_replace(", ", "<br>", $row['description']) . '</p>';

        $originalPrice = $row['price'];
        $discountPercentage = $row['discount'];
        $discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

        echo '<h5 class="card-text discounted-price">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';
        echo '<div class="rounded-pill bg-danger text-white">' . -intval($discountPercentage) . '%</div>';
        echo '<h6 class="card-text price">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';
        echo '</div>'; // Close card-body
        echo '<div class="card-footer"></div>'; // Empty card-footer
        echo '</div>'; // Close product-card
        echo '</div>'; // Close col-md-3
        $counter++;

        if ($counter % 5 == 0) { // Close the row after every 5 products
            echo '</div>';
        }
    }
    mysqli_free_result($result);
} else {
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
}
?>

<div>
    <h2 style="color: black; font-size: 30px; margin-top: 40px;">LAPTOP VĂN PHÒNG HOT</h2>
    </div>
    <hr class="section-divider">

    <?php
if (!$connect) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
  $sql = "SELECT * FROM product WHERE purpose_id='1'LIMIT 5";
  $counter = 0; // Counter to keep track of number of products in each row

  if ($result = mysqli_query($connect, $sql)) {
    $counter = 0; // Initialize product counter
    echo '<div class="row">';
    echo '<a href="product.php" style="text-decoration: none;">'; // Thay link_den_trang_san_pham.php bằng đường link thực tế
    echo '</a>';
    echo '</div>';

    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 5 == 0) { // Start a new row after every 5 products
            echo '<div class="row justify-content-center custom-margin-bottom">'; // Start a new row
        }

        echo '<div class="col-md-2 custom-margin text-center">';
        echo '<div class="product-card bg-white">'; // Add bg-white class to keep white background
        echo '<a href="product.php?id=' . $row['product_id'] . '">'; // Thêm ID của sản phẩm vào đường link
        echo '<img class="card-img-top" src="' . $row['image_link_1'] . '" alt="">';
        echo '</a>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . str_replace(", ", "<br>", $row['description']) . '</p>';

        $originalPrice = $row['price'];
        $discountPercentage = $row['discount'];
        $discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

        echo '<h5 class="card-text discounted-price">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';
        echo '<div class="rounded-pill bg-danger text-white">' . -intval($discountPercentage) . '%</div>';
        echo '<h6 class="card-text price">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';
        echo '</div>'; // Close card-body
        echo '<div class="card-footer"></div>'; // Empty card-footer
        echo '</div>'; // Close product-card
        echo '</div>'; // Close col-md-3

        $counter++;

        if ($counter % 5 == 0) { // Close the row after every 5 products
            echo '</div>';
        }
    }
    mysqli_free_result($result);
} else {
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
}
?>
<div>
    <h2 style="color: black; font-size: 30px; margin-top: 40px;">BÀN PHÍM MỚI</h2>
    </div>

    <hr class="section-divider">
    <?php
if (!$connect) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
  $sql = "SELECT * FROM product WHERE type_id='3'LIMIT 5";
  $counter = 0; // Counter to keep track of number of products in each row

  if ($result = mysqli_query($connect, $sql)) {
    $counter = 0; // Initialize product counter
    echo '<div class="row">';
    echo '<a href="product.php" style="text-decoration: none;">'; // Thay link_den_trang_san_pham.php bằng đường link thực tế
    echo '</a>';
    echo '</div>';

    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 5 == 0) { // Start a new row after every 5 products
            echo '<div class="row justify-content-center custom-margin-bottom">'; // Start a new row
        }

        echo '<div class="col-md-2 custom-margin text-center">';
        echo '<div class="product-card bg-white">'; // Add bg-white class to keep white background
        echo '<a href="product.php?id=' . $row['product_id'] . '">'; // Thêm ID của sản phẩm vào đường link
        echo '<img class="card-img-top" src="' . $row['image_link_1'] . '" alt="">';
        echo '</a>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . str_replace(", ", "<br>", $row['description']) . '</p>';

        $originalPrice = $row['price'];
        $discountPercentage = $row['discount'];
        $discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

        echo '<h5 class="card-text discounted-price">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';
        echo '<div class="rounded-pill bg-danger text-white">' . -intval($discountPercentage) . '%</div>';
        echo '<h6 class="card-text price">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';
        echo '</div>'; // Close card-body
        echo '<div class="card-footer"></div>'; // Empty card-footer
        echo '</div>'; // Close product-card
        echo '</div>'; // Close col-md-3

        $counter++;

        if ($counter % 5 == 0) { // Close the row after every 5 products
            echo '</div>';
        }
    }
    mysqli_free_result($result);
} else {
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
}
?>
<div>
    <h2 style="color: black; font-size: 30px; margin-top: 40px;">CHUỘT SIÊU XỊN</h2>
    </div>
    <hr class="section-divider">
<?php
if (!$connect) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
  $sql = "SELECT * FROM product WHERE type_id='2'LIMIT 5";
  $counter = 0; // Counter to keep track of number of products in each row

  if ($result = mysqli_query($connect, $sql)) {
    $counter = 0; // Initialize product counter
    echo '<div class="row">';
    echo '<a href="product.php" style="text-decoration: none;">'; // Thay link_den_trang_san_pham.php bằng đường link thực tế
    echo '</a>';
    echo '</div>';

    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 5 == 0) { // Start a new row after every 5 products
            echo '<div class="row justify-content-center custom-margin-bottom">'; // Start a new row
        }

        echo '<div class="col-md-2 custom-margin text-center">';
        echo '<div class="product-card bg-white">'; // Add bg-white class to keep white background
        echo '<a href="product.php?id=' . $row['product_id'] . '">'; // Thêm ID của sản phẩm vào đường link
        echo '<img class="card-img-top" src="' . $row['image_link_1'] . '" alt="">';
        echo '</a>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . str_replace(", ", "<br>", $row['description']) . '</p>';

        $originalPrice = $row['price'];
        $discountPercentage = $row['discount'];
        $discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

        echo '<h5 class="card-text discounted-price">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';
        echo '<div class="rounded-pill bg-danger text-white">' . -intval($discountPercentage) . '%</div>';
        echo '<h6 class="card-text price">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';
        echo '</div>'; // Close card-body
        echo '<div class="card-footer"></div>'; // Empty card-footer
        echo '</div>'; // Close product-card
        echo '</div>'; // Close col-md-3
        $counter++;

        if ($counter % 5 == 0) { // Close the row after every 5 products
            echo '</div>';
        }
    }
    mysqli_free_result($result);
} else {
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
}
?>
<div>
    <h2 style="color: black; font-size: 30px; margin-top: 40px;">TAI NGHE</h2>
    </div>
    <hr class="section-divider">
<?php
if (!$connect) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
  $sql = "SELECT * FROM product WHERE type_id='4'LIMIT 5";
  $counter = 0; // Counter to keep track of number of products in each row

  if ($result = mysqli_query($connect, $sql)) {
    $counter = 0; // Initialize product counter
    echo '<div class="row">';
    echo '<a href="product.php" style="text-decoration: none;">'; // Thay link_den_trang_san_pham.php bằng đường link thực tế
    echo '</a>';
    echo '</div>';

    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 5 == 0) { // Start a new row after every 5 products
            echo '<div class="row justify-content-center custom-margin-bottom">'; // Start a new row
        }

        echo '<div class="col-md-2 custom-margin text-center">';
        echo '<div class="product-card bg-white">'; // Add bg-white class to keep white background
        echo '<a href="product.php?id=' . $row['product_id'] . '">'; // Thêm ID của sản phẩm vào đường link
        echo '<img class="card-img-top" src="' . $row['image_link_1'] . '" alt="">';
        echo '</a>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . str_replace(", ", "<br>", $row['description']) . '</p>';

        $originalPrice = $row['price'];
        $discountPercentage = $row['discount'];
        $discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

        echo '<h5 class="card-text discounted-price">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';
        echo '<div class="rounded-pill bg-danger text-white">' . -intval($discountPercentage) . '%</div>';
        echo '<h6 class="card-text price">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';
        echo '</div>'; // Close card-body
        echo '<div class="card-footer"></div>'; // Empty card-footer
        echo '</div>'; // Close product-card
        echo '</div>'; // Close col-md-3

        $counter++;

        if ($counter % 5 == 0) { // Close the row after every 5 products
            echo '</div>';
        }
    }
    mysqli_free_result($result);
} else {
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
}
?>

<div>
    <h2 style="color: black; font-size: 30px; margin-top: 40px;">BALO LAPTOP</h2>
    </div>
    <hr class="section-divider">
<?php
if (!$connect) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
  $sql = "SELECT * FROM product WHERE type_id='5'LIMIT 5";
  $counter = 0; // Counter to keep track of number of products in each row

  if ($result = mysqli_query($connect, $sql)) {
    $counter = 0; // Initialize product counter
    echo '<div class="row">';
    echo '<a href="product.php" style="text-decoration: none;">'; // Thay link_den_trang_san_pham.php bằng đường link thực tế
    echo '</a>';
    echo '</div>';

    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 5 == 0) { // Start a new row after every 5 products
            echo '<div class="row justify-content-center custom-margin-bottom">'; // Start a new row
        }

        echo '<div class="col-md-2 custom-margin text-center">';
        echo '<div class="product-card bg-white">'; // Add bg-white class to keep white background
        echo '<a href="product.php?id=' . $row['product_id'] . '">'; // Thêm ID của sản phẩm vào đường link
        echo '<img class="card-img-top" src="' . $row['image_link_1'] . '" alt="">';
        echo '</a>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . str_replace(", ", "<br>", $row['description']) . '</p>';

        $originalPrice = $row['price'];
        $discountPercentage = $row['discount'];
        $discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

        echo '<h5 class="card-text discounted-price">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';
        echo '<div class="rounded-pill bg-danger text-white">' . -intval($discountPercentage) . '%</div>';
        echo '<h6 class="card-text price">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';
        echo '</div>'; // Close card-body
        echo '<div class="card-footer"></div>'; // Empty card-footer
        echo '</div>'; // Close product-card
        echo '</div>'; // Close col-md-3


        $counter++;

        if ($counter % 5 == 0) { // Close the row after every 5 products
            echo '</div>';
        }
    }
    mysqli_free_result($result);
} else {
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
}
?>
<hr class="section-divider">
<h2 style="color: black; font-size: 25px; margin-top: 40px;">Bạn có câu hỏi gì hãy để lại cho chúng tôi biết ?</h2>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email của bạn</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Câu hỏi của bạn ?</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<button type="submit" class="btn btn-primary">Gửi</button>

</body>
</html>

<?php
include 'footer.php';
?>
