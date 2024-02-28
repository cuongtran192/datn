<?php


include '../connectdb.php';


// Function to fetch a user by ID from the database
function getOrderById($orderId) {
    global $conn;
    $orderId = mysqli_real_escape_string($conn, $orderId);
    $result = $conn->query("SELECT * FROM orders WHERE order_id = '$orderId'");
    $order = $result->fetch_assoc();
    return $order;
}

function getBrandOptions() {
    global $conn;
    $result = $conn->query("SELECT brand_id, name FROM brand");
    
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $brandId = $row['brand_id'];
        $brandName = $row['name'];
        $options .= "<option value='$brandId'>$brandName</option>";
    }

    return $options;
}

function getTypeOptions() {
    global $conn;
    $result = $conn->query("SELECT type_id, name FROM type");
    
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $typeId = $row['type_id'];
        $typeName = $row['name'];
        $options .= "<option value='$typeId'>$typeName</option>";
    }

    return $options;
}

function getPurposeOptions() {
    global $conn;
    $result = $conn->query("SELECT purpose_id, name FROM purpose");
    
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $purposeId = $row['purpose_id'];
        $purposeName = $row['name'];
        $options .= "<option value='$purposeId'>$purposeName</option>";
    }

    return $options;
}


// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
   
  

}

?>
<div class="">Tạo sản phẩm mới</div>
<form action="index.php?page=product&action=xulytao" method="POST" enctype="multipart/form-data">
<label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Mô tả1:</label>
        <textarea id="description" name="description" required></textarea><br>
        <label for="description">Mô tả2:</label>
        <textarea id="description" name="description1" required></textarea><br>

        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" min="0" required><br>

        <label for="discount">Giảm giá:</label>
        <input type="number" id="discount" name="discount" min="0" required><br>

        <label for="image_link_1">Link hình ảnh 1:</label>
        <input type="text" id="image_link_1" name="image_link_1" required><br>

        <label for="image_link_2">Link hình ảnh 2:</label>
        <input type="text" id="image_link_2" name="image_link_2"><br>

        <label for="image_link_3">Link hình ảnh 3:</label>
        <input type="text" id="image_link_3" name="image_link_3"><br>

        <label for="image_link_4">Link hình ảnh 4:</label>
        <input type="text" id="image_link_4" name="image_link_4"><br>

        <label for="number">Số lượng:</label>
        <input type="number" id="number" name="number" min="0" required><br>

        <label for="number_buy">Số lượng bán:</label>
        <input type="number" id="number_buy" name="number_buy" value=0 required><br>

        <label for="type_id">Chọn loại:</label>
        <select name="type_id" id="type_id">
            <?php echo getTypeOptions(); ?>
            </select>
            <br>
            <label for="brand_id">Chọn thương hiệu:</label>
<select name="brand_id" id="brand_id">
    <?php echo getBrandOptions(); ?>
</select>
<br>

        <label for="purpose_id">Chọn mục đích:</label>
<select name="purpose_id" id="purpose_id">
    <?php echo getPurposeOptions(); ?>
</select><br>


        <button type="submit">Tạo Sản Phẩm</button>
    </form>
