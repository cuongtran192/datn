<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?php
// Kết nối với cơ sở dữ liệu
include 'header.php';
include 'connectdb.php';
// Kiểm tra xem sản phẩm có tồn tại không
// Kiểm tra xem có sản phẩm được chọn không
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Lấy ID sản phẩm từ tham số truy vấn
    $product_id = $_GET['id'];

    // Kết nối CSDL và truy vấn để lấy thông tin sản phẩm dựa trên ID
    // Thực hiện kết nối CSDL và truy vấn
    // Replace các dòng sau đây bằng code kết nối và truy vấn CSDL của bạn
    $sql = "SELECT * FROM product WHERE product_id = $product_id";
    $review_sql = "SELECT AVG(rate) AS average_rate FROM review WHERE product_id = $product_id";
    $result = $conn->query($sql);

    // Kiểm tra xem có sản phẩm được tìm thấy không
    if ($result->num_rows > 0) {
        // Lấy thông tin sản phẩm
        $row = $result->fetch_assoc();

        // Hiển thị hình ảnh đại diện
        echo '<div class="product-images">';
        echo '<div class="main-image" id="main-image" style="margin-left: 200px; margin-top: 25px;">'; // Cách lề trái 200px và cách lề trên 25px
        echo '<img src="' . $row['image_link_1'] . '" alt="' . $row['name'] . '" style=" width: 635px; height: 550px; display: inline-block; ">';
        echo '</div>'; // Close main-image
        echo '<div class="product-name" style="position: absolute; top: 210px ;margin-right: 120px;margin-left: 900px;  font-size: 30px; z-index: 1;">';
        echo $row['name'];
        echo '<div class="product-info" style="position: absolute; top: 90px; left: 0px; font-size: 16px; color: #555555; z-index: 1;">';
        echo '<span>Số lượng:   ' . $row['number'] . '</span> | <span>Đã bán:   ' . $row['number_buy'] . '</span> | ';

// Lấy đánh giá trung bình từ bảng review
        $review_result = $conn->query($review_sql);
            if ($review_result->num_rows > 0) {
    $review_row = $review_result->fetch_assoc();
    // Làm tròn đánh giá trung bình chỉ hiển thị một số thập phân
    $average_rate = number_format($review_row['average_rate'], 1);
    echo '<span>Đánh giá:    ' . $average_rate . '</span>';
    echo '<span> ';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $average_rate) {
            echo '<i class="fa fa-star" style="color: red;"></i>'; // Icon sao vàng
        } else {
            echo '<i class="fa fa-star" style="color: grey;"></i>'; // Icon sao xám
        }
    }
    echo '</span>';
} else {
    echo '<span>Chưa có đánh giá</span>';
}
$brand_sql = "SELECT name FROM brand WHERE brand_id = " . $row['brand_id'];
$purpose_sql = "SELECT name FROM purpose WHERE purpose_id = " . $row['purpose_id'];
$brand_result = $conn->query($brand_sql);
$purpose_result = $conn->query($purpose_sql);
if ($brand_result->num_rows > 0 && $purpose_result->num_rows > 0) {
    $brand_row = $brand_result->fetch_assoc();
    $purpose_row = $purpose_result->fetch_assoc();
    echo '<span style="font-size: 25px; text-transform: uppercase;">  Hãng: <u>' . $brand_row['name'] . '</u></span>';
    echo '<span style="font-size: 25px; text-transform: uppercase;">  Loại: <u>' . $purpose_row['name'] . '</u></span>';
}
$originalPrice = $row['price'];
$discountPercentage = $row['discount'];
$discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

// Hiển thị giá gốc (màu xám đen)
echo '<h5 class="card-text discounted-price" style="font-size: 19px; padding: 5px; display: inline-block;text-decoration: line-through; color: #C0C0C0; margin-top: 25px; white-space: nowrap;">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';

// Hiển thị giá giảm sau khi áp dụng phần trăm giảm giá (màu đỏ)
echo '<h6 class="card-text price" style="padding: 10px; color: #FF0000; font-size: 40px;background-color: transparent; font-family: Arial, sans-serif; white-space: nowrap;">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';

// Hiển thị phần trừ giảm giá theo phần trăm (màu đỏ)
echo '<div class=" bg-danger text-white px-2 py-1 ml-1 align-items-center" style="position: absolute; top: 55px; left: 42%; font-family: Arial, sans-serif; font-weight: bold; white-space: nowrap;">' . -intval($discountPercentage) . '%</div>';

     echo '</div>'; // Close product-info


        echo '</div>'; // Close product-name
        
        echo '</div>'; // Close main-image
        // Hiển thị 4 hình ảnh nhỏ
        echo '<div class="thumbnail-images" style="margin-left: 200px;">'; // Cách lề trái 200px
        for ($i = 1; $i <= 4; $i++) { // Bắt đầu từ 2 để bỏ qua hình ảnh đầu tiên
            echo '<div class="thumbnail" onmouseover="changeMainImage(this)" style="display: inline-block; margin: 0px;">'; // Tạo khoảng cách 10px giữa các hình ảnh nhỏ
            echo '<img src="' . $row['image_link_' . $i] . '" alt="' . $row['name'] . '" style="width: 159px; height: 160; ">';
            echo '</div>'; // Close thumbnail
        }
        echo '</div>'; // Close thumbnail-images
        echo '</div>'; // Close product-images
    } else {
        echo "Không tìm thấy sản phẩm.";
    }
} else {
    echo "Tham số không hợp lệ.";
}
?>
<script>
function changeMainImage(thumbnail) {
    var mainImage = document.getElementById("main-image").getElementsByTagName("img")[0];
    var thumbnailImage = thumbnail.getElementsByTagName("img")[0];
    mainImage.src = thumbnailImage.src;
}
</script>

<style>
    .thumbnail:hover {
        border: 2px solid red; /* Thay đổi kích thước và màu sắc của viền khi hover */
    }
    body {
        background-color: #f0f0f0; /* Đặt màu nền trang là màu xám nhạt */
    }
    </style>
</body>
</html>
