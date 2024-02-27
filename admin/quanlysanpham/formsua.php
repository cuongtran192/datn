<?php
include '../connectdb.php';

// Function to fetch a product by ID from the database
function getProductById($productId) {
    global $conn;
    $productId = mysqli_real_escape_string($conn, $productId);
    $result = $conn->query("SELECT * FROM product WHERE product_id = '$productId'");
    $product = $result->fetch_assoc();
    return $product;
}

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch product details by ID
    $product = getProductById($productId);
}
?>

<div class="">Chỉnh sửa thông tin sản phẩm</div>
<form action="index.php?page=product&action=xulysua" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
    
    <label for="name">Tên sản phẩm:</label>
    <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>"><br>

    <label for="description">Mô tả:</label>
    <textarea id="description" name="description"><?php echo $product['description']; ?></textarea><br>

    <label for="price">Giá:</label>
    <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>"><br>

    <label for="discount">Giảm giá:</label>
    <input type="text" id="discount" name="discount" value="<?php echo $product['discount']; ?>"><br>

    <label for="image_link_1">Link hình ảnh 1:</label>
    <input type="text" id="image_link_1" name="image_link_1" value="<?php echo $product['image_link_1']; ?>"><br>

    <label for="image_link_2">Link hình ảnh 2:</label>
    <input type="text" id="image_link_2" name="image_link_2" value="<?php echo $product['image_link_2']; ?>"><br>

    <label for="image_link_3">Link hình ảnh 3:</label>
    <input type="text" id="image_link_3" name="image_link_3" value="<?php echo $product['image_link_3']; ?>"><br>

    <label for="image_link_4">Link hình ảnh 4:</label>
    <input type="text" id="image_link_4" name="image_link_4" value="<?php echo $product['image_link_4']; ?>"><br>

    <label for="number">Số lượng:</label>
    <input type="text" id="number" name="number" value="<?php echo $product['number']; ?>"><br>

    <label for="number_buy">Số lượng bán:</label>
    <input type="text" id="number_buy" name="number_buy" value="<?php echo $product['number_buy']; ?>"><br>

    <label for="type_id">ID loại:</label>
    <input type="text" id="type_id" name="type_id" value="<?php echo $product['type_id']; ?>"><br>

    <label for="brand_id">ID thương hiệu:</label>
    <input type="text" id="brand_id" name="brand_id" value="<?php echo $product['brand_id']; ?>"><br>

    <label for="purpose_id">ID mục đích:</label>
    <input type="text" id="purpose_id" name="purpose_id" value="<?php echo $product['purpose_id']; ?>"><br>

    <button type="submit">Lưu thông tin</button>
</form>

