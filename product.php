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
        echo '<div class="main-image" id="main-image" style="margin-left: 200px; margin-top: 5px;">'; // Cách lề trái 200px và cách lề trên 25px
        echo '<img src="' . $row['image_link_1'] . '" alt="' . $row['name'] . '" style=" width: 550px; height: 500px; display: inline-block; ">';
        echo '</div>'; // Close main-image
        echo '<div class="product-name" style="position: absolute; top: 210px ;margin-right: 120px;margin-left: 850px;  font-size: 30px; z-index: 1;">';
        echo $row['name'];
        echo '</div>'; // Close product-name   
        echo '<div class="product-info" style="position: absolute; top: 300px; left: 850px; font-size: 16px; color: #555555; z-index: 1;">';
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
echo '</div>';

echo '<div class="price-info" style="position: absolute; top: 360px; left: 850px; font-size: 16px; color: #555555; z-index: 1;">';
$originalPrice = $row['price'];
$discountPercentage = $row['discount'];
$discountedPrice = $originalPrice - ($originalPrice * $discountPercentage / 100);

// Hiển thị giá gốc (màu xám đen)
    echo '<h5 class="card-text discounted-price" style="font-size: 19px; padding: 5px; display: inline-block;text-decoration: line-through; color: #C0C0C0; margin-top: 25px; margin-right: 10px; white-space: nowrap;">' . number_format($originalPrice, 0, ',', '.') . ' ₫ </h5>';


// Hiển thị giá giảm sau khi áp dụng phần trăm giảm giá (màu đỏ)
        echo '<h6 class="card-text price" style="padding: 10px; color: #FF0000; font-size: 40px;background-color: transparent; font-family: Arial, sans-serif; white-space: nowrap;">' . number_format($discountedPrice, 0, ',', '.') . ' ₫ </h6>';

// Hiển thị phần trừ giảm giá theo phần trăm (màu đỏ)
        echo '<div class=" bg-danger text-white px-2 py-1 ml-1 align-items-center" style="position: absolute; top: 17px; left: 53%; font-family: Arial, sans-serif; font-weight: bold; white-space: nowrap;">' . -intval($discountPercentage) . '%</div>';
        echo '<div class="discount-code" style="font-family: Arial, sans-serif; font-size: 16px; white-space: nowrap;">Mã giảm giá: ';
        // Hiển thị phần mã giảm giá (chỉ là text cố định)
        echo '<div class="discount-code" style="font-family: Arial, sans-serif; font-size: 16px; white-space: nowrap; background-color: #ffcccc; padding: 5px; display: inline-block; border-radius: 5px; margin-top: 10px; color: #FF0000;">Giảm đ200k</div>';

        echo '</div>'; // Close product-info
     // Hiển thị dòng vận chuyển miễn phí và icon freeship
        echo '<div class="free-shipping" style="font-family: Arial, sans-serif; font-size: 16px; white-space: nowrap; padding: 5px; display: inline-block; border-radius: 5px; margin-top: 20px ;margin-left: -4px;">Vận chuyển miễn phí</div>';

        echo '<i class="fas fa-truck" style="color: #008000; font-size: 16px; margin-left: 20px;"></i>';   
        echo '<div class="installment" style="font-family: Arial, sans-serif; font-size: 16px; margin-top: 20px;">';
        echo '0% TRẢ GÓP 12 tháng x ₫1.449.167 (Lãi suất 0%)';
        echo '<a href="#" class="arrow-right" style="text-decoration: none; color: #000; margin-left: 10px;">Xem Thêm <i class="fas fa-arrow-right"></i></a>';
        echo '</div>';
        //số lượng
        
        echo '<div class="quantity" style="display: flex; align-items: center; margin-top: 20px;">';
        echo '<span style="font-family: Arial, sans-serif; font-size: 20px;margin-right: 15px;">Số lượng</span>'; // Thêm margin cho chữ số lượng
        echo '<button class="quantity-minus" style="margin-right: 20px;">-</button>';
        echo '<input type="number" class="quantity-input" value="1" min="1" style="margin-right: 15px;">';
        echo '<button class="quantity-plus" style="margin-right: 0px;">+</button>';
        echo '<span class="available-quantity" style="margin-left: 20px; margin-right: 5px;"> Còn ' . $row['number'] . ' sản phẩm</span>'; // Thay đổi giá trị margin-right
        echo '</div>';
        if ($product_id && $discountedPrice) {
            echo '<form method="post" action="add_to_cart.php">';
            echo '<input type="hidden" name="product_id" value="' . $product_id . '">'; // Ẩn trường chứa ID sản phẩm
            echo '<input type="hidden" name="price" value="' . $discountedPrice . '">'; // Ẩn trường chứa giá đã giảm
            echo '<button type="submit" class="add-to-cart-btn" style="background-color: #f8d7da; border: 1px solid #CC0000; color: #CC0000; padding: 17px 30px; margin-right: 10px; margin-top: 20px">';
            echo '<i class="fa fa-shopping-cart" style="color: #dc3545; margin-right: 5px;"></i> Thêm vào giỏ hàng';
            echo '</button>';
            echo '<button class="buy-now-btn" style="background-color: #CC0000; border: none; color: #fff; padding: 18px 44px; ">';
            echo 'Mua ngay';
            echo '</button>';
      
            echo '</form>';
        }

        
        
        echo '<div style="margin-top: 30px; font-size: 18px;">';
        echo '<i class="fa fa-reply" style="color: #CC0000; margin-right: 10px;"></i> 7 ngày miễn phí trả hàng';
        echo '<i class="fa fa-check-circle" style="color: #CC0000; margin-left: 40px; margin-right: 10px;"></i> Hàng chính hãng 100%';
        echo '<i class="fa fa-phone" style="color: #CC0000; margin-left: 40px; margin-right: 10px;"></i> Hỗ trợ thắc mắc';
        echo '</div>';

         
        echo '</div>'; // Close main-image
        
        // Hiển thị 4 hình ảnh nhỏ
        echo '<div class="thumbnail-images" style="margin-left: 200px;">'; // Cách lề trái 200px
        for ($i = 1; $i <= 4; $i++) { // Bắt đầu từ 2 để bỏ qua hình ảnh đầu tiên
        echo '<div class="thumbnail" onmouseover="changeMainImage(this)" style="display: inline-block; margin: 0px;">'; // Tạo khoảng cách 10px giữa các hình ảnh nhỏ
        echo '<img src="' . $row['image_link_' . $i] . '" alt="' . $row['name'] . '" style="width: 137.5px; height: 130; ">';
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
echo '<div style="margin-top: 30px; font-size: 20px; margin-left: 200px; margin-right: 200px;">'; // Căn lề trái và lề phải cách nhau 200px
echo '<h4 style="font-weight: bold; font-size: 35px;margin-bottom: 20px;font-family: Arial, sans-serif;">Thông số sản phẩm:</h4>'; // Đặt chữ đậm

echo '</div>';
$text = $row['description1']; // Lấy đoạn văn bản từ cột 'description1'

// Tách đoạn văn bản thành các dòng dựa trên ký tự xuống dòng (\n)
$lines = explode("\n", $text);

// Hiển thị từng dòng trên một dòng mới
echo '<div style="text-align:left; display: flex; flex-direction: column; align-items: flex-start; margin-right: 200px;">'; // Đặt lề trái 0
foreach ($lines as $line) {
    echo '<p style="font-weight: i; font-size: 20px; margin-left: 200px; margin-bottom: 10px;  color: #000000; background-color: #ffffff; padding: 10px;">' . $line . '</p>';
}
echo '</div>';

echo '<div style="margin-top: 30px; font-size: 20px; margin-left: 200px; margin-right: 200px;">'; // Căn lề trái và lề phải cách nhau 200px
echo '<h4 style="font-weight: bold; font-size: 35px;margin-bottom: 20px;font-family: Arial, sans-serif;">Đánh giá người dùng:</h4>'; // Đặt chữ đậm



// Truy vấn dữ liệu từ bảng review và kết hợp với bảng users để lấy tên người đánh giá

// Truy vấn dữ liệu từ bảng review và kết hợp với bảng users để lấy tên người đánh giá

// Truy vấn dữ liệu từ bảng review và kết hợp với bảng users để lấy tên người đánh giá
$review_query = "SELECT review.*, users.name AS reviewer_name FROM review INNER JOIN users ON review.user_id = users.user_id WHERE review.product_id = $product_id";
$review_result = $conn->query($review_query);

// Kiểm tra xem có đánh giá nào không
if ($review_result->num_rows > 0) {
    // Hiển thị đánh giá
    while ($review_row = $review_result->fetch_assoc()) {
        $rating = $review_row['rate']; // Điểm đánh giá
        $comment = $review_row['comment']; // Nhận xét
        $review_date = date('d/m/Y', strtotime($review_row['date_review'])); // Định dạng ngày tháng năm
        $reviewer_name = $review_row['reviewer_name']; // Tên người đánh giá

        // Hiển thị điểm đánh giá dưới dạng số sao
        echo '<div style="text-align:left; display: flex; flex-direction: column; align-items: flex-start; margin-right: 200px;">'; // Đặt lề trái 0

        echo '<p style="margin-bottom: 5px; color: black;">Đánh giá: ';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                echo '<i class="fa fa-star" style="color: gold;"></i>'; // Icon sao vàng
            } else {
                echo '<i class="fa fa-star" style="color: grey;"></i>'; // Icon sao xám
            }
        }
        echo '</p>';

        // Hiển thị tên người đánh giá và ngày đánh giá
        echo '<p style="margin-bottom: 5px; color: red;">Đánh giá bởi :' . $reviewer_name . ' - ' . $review_date . '</p>';

        // Hiển thị nhận xét
        echo '<p style="color: red;">Nhận xét: ' . $comment . '</p>';
        echo '</div>';
    }
} else {
    echo '<div style="text-align: center;">Chưa có đánh giá nào cho sản phẩm này.</div>';
}

echo '<div style="margin-top: 30px; font-size: 20px; margin-left: 200px; margin-left:0px;">'; // Căn lề trái và lề phải cách nhau 200px
echo '<h4 style="font-weight: bold; font-size: 35px;margin-bottom: 20px;font-family: Arial, sans-serif;">Để lại đánh giá của bạn:</h4>'; // Đặt chữ đậm


if(isset($_SESSION['user_id'])) {
    // Hiển thị form đánh giá
    echo '<form action="process_review.php" method="post">';
    echo '<input type="hidden" name="product_id" value="' . $product_id . '">';

    echo '<label for="rate">Đánh giá:</label>';
    echo '<select name="rate" id="rate">';
    echo '<option value="1">1 sao</option>';
    echo '<option value="2">2 sao</option>';
    echo '<option value="3">3 sao</option>';
    echo '<option value="4">4 sao</option>';
    echo '<option value="5">5 sao</option>';
    echo '</select>';
    echo '<br>';
    echo '<label for="comment">Nhận xét:</label>';
    echo '<textarea name="comment" id="comment" rows="2" cols="50" style="resize: none; width: 100%; margin-bottom: 10px; margin-top: 10px; border: 1px solid #ccc; border-radius: 20px;" placeholder="Nhận xét của bạn về sản phẩm"></textarea>';

    echo '<button type="submit" class="btn btn-primary">Gửi đánh giá</button>'; // Sử dụng lớp Bootstrap btn btn-primary
    echo '</form>';
} else {
    // Hiển thị cảnh báo và nút đăng nhập
    echo '<div style="display: flex; align-items: center; margin-bottom: 20px;">'; // Thêm margin-bottom vào div chứa cảnh báo và nút đăng nhập
    echo '<div style="margin-right: 10px;">Vui lòng đăng nhập để đánh giá sản phẩm.</div>';
    echo '<a href="login.php" class="btn btn-danger" style="text-decoration: none; color: white;">Đăng nhập</a>';

    echo '</div>';
}
?>


<script>
function changeMainImage(thumbnail) {
    var mainImage = document.getElementById("main-image").getElementsByTagName("img")[0];
    var thumbnailImage = thumbnail.getElementsByTagName("img")[0];
    mainImage.src = thumbnailImage.src;
}
document.addEventListener('DOMContentLoaded', function() {
    var quantityInput = document.querySelector('.quantity-input');
    var quantityPlus = document.querySelector('.quantity-plus');
    var quantityMinus = document.querySelector('.quantity-minus');
    var availableQuantity = parseInt('<?php echo $row['number']; ?>');

    quantityPlus.addEventListener('click', function() {
        var currentValue = parseInt(quantityInput.value);
        if (currentValue < availableQuantity) {
            quantityInput.value = currentValue + 1;
        }
    });

    quantityMinus.addEventListener('click', function() {
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });
});

</script>


<style>
    .thumbnail:hover {
        border: 2px solid red; /* Thay đổi kích thước và màu sắc của viền khi hover */
    }
    body {
        background-color: #f0f0f0; /* Đặt màu nền trang là màu xám nhạt */
    }
    </style>
    <?php
include 'footer.php';
?>
</body>
</html>
