<?php
include '../connectdb.php';
include 'header.php';
?>

<style>
    .product-card {
        margin-bottom: 50px;
        width: calc(221px + 2em);
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Thêm hiệu ứng bóng */
        overflow: hidden; /* Ẩn nội dung dư thừa */
    }

    .product-card img {
        max-width: 100%;
        border-radius: 10px 10px 0 0; /* Bo tròn góc cho hình ảnh */
    }

    .product-card .card-body {
        padding: 1.25rem;
        height: 280px; /* Chiều cao cố định */
        overflow: hidden; /* Ẩn nội dung dư thừa */
    }

    .product-card .card-title {
        max-height: 2.5em;
        overflow: hidden;
        font-size: 16px;
    }

    .product-card .card-text {
        text-align: left;
        font-size: 16px;
    }

    .product-card .discounted-price {
        font-size: 19px;
        padding: 5px;
        display: inline-block;
        text-decoration: line-through;
    }

    .product-card .bg-danger {
        background-color: #dc3545; /* Màu nền đỏ cho badge */
    }

    .product-card .rounded-pill {
        border-radius: 20px; /* Bo tròn góc cho badge */
        display: inline-block;
        margin-left: 4px;
        margin-right: 4px;
    }

    .product-card .price {
        padding: 5px;
        text-align: center; /* Căn giữa phần giá */
    }

    .custom-margin-top {
        margin-top: 2rem; /* Đặt khoảng cách trên là 2rem */
    }

    .custom-margin {
        margin: 1.3rem;
    }

    .custom-margin-bottom {
        margin-bottom: -60px; /* Đặt khoảng cách dưới là 50px */
    }

</style>

<div class="container">
    <div class="row justify-content-center custom-margin-top">
        <?php
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
        $sql = "SELECT * FROM product WHERE type_id='1'";
        if ($sort == 'asc') {
            $sql .= " ORDER BY price ASC";
        } elseif ($sort == 'desc') {
            $sql .= " ORDER BY price DESC";
        }
     
        $counter = 0; // Counter to keep track of number of products in each row
        echo'<div class="col-md-12 mb-3">';
        echo'   <a href="?sort=asc" class="btn btn-primary">Giá tăng dần</a>';
           echo' <a href="?sort=desc" class="btn btn-primary">Giá giảm dần</a>';
        echo'</div>';
        if ($result = mysqli_query($conn, $sql)) {
            $counter = 0; // Initialize product counter
            while ($row = mysqli_fetch_array($result)) {
                if ($counter % 5 == 0) { // Start a new row after every 5 products
                    echo '</div>'; // Close previous row if not the first row
                    echo '<div class="row justify-content-center custom-margin-bottom">'; // Start a new row
                }

                echo '<div class="col-md-2 custom-margin text-center">';
                echo '<div class="product-card bg-white">'; // Add bg-white class to keep white background
                echo '<a href="../product.php?id=' . $row['product_id'] . '">'; // Thêm ID của sản phẩm vào đường link
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
            }
            mysqli_free_result($result);
        } else {
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($connect);
        }
        ?>
    </div>
</div>

<?php include '../footer.php'; ?>
