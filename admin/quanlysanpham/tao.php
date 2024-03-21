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
<div class="m-5 justify-self-start "><a class=" rounded-2xl p-3 bg-green-400 text-black " href="./?page=product&action=lietke">Trở lại </a></div>
<div class=" text-3xl font-bold my-4">Tạo sản phẩm mới</div>
<form action="index.php?page=product&action=xulytao" method="POST" enctype="multipart/form-data">
<div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="name">Tên sản phẩm:</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="name" name="name" required><br></div>

        <div class="flex flex-row my-3">       
        <label class="text-xl p-3 w-1/4" for="description">Mô tả1:</label>
        <textarea class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" id="description" name="description" required></textarea><br></div>

        <div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="description1">Mô tả2:</label>
        <textarea class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl"id="description1" name="description1" required></textarea><br></div>
        <div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="price">Giá:</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="number" id="price" name="price" min="0" required><br></div>
        <div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="discount">Giảm giá:</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="number" id="discount" name="discount" min="0" required><br></div>
        <div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="image1">Image 1:</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="file" name="image_1" accept="image/*" required><br></div>
        <div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="image2">Image 2:</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="file" name="image_2" accept="image/*" required><br></div>
        <div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="image3">Image 3:</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="file" name="image_3" accept="image/*" required><br></div>
        <div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="image4">Image 4:</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="file" name="image_4" accept="image/*" required><br></div>
        <div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="number">Số lượng:</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="number" id="number" name="number" min="0" required><br></div>
        <div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="number_buy">Số lượng bán:</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="number" id="number_buy" name="number_buy" value=0 required><br></div>
        <div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="type_id">Chọn loại:</label>
        <select class="bg-green-300 p-2" name="type_id" id="type_id">
            <?php echo getTypeOptions(); ?>
            </select>
            <br></div>
         
            <div class="flex flex-row my-3">      
            <label class="text-xl p-3 w-1/4" for="brand_id">Chọn thương hiệu:</label>
    <select class="bg-green-300 p-2"  name="brand_id" id="brand_id">
    <?php echo getBrandOptions(); ?>
</select>
<br></div>
<div class="flex flex-row my-3"> 
        <label class="text-xl p-3 w-1/4" for="purpose_id">Chọn mục đích:</label>
<select class="bg-green-300 p-2 rounded-xl" name="purpose_id" id="purpose_id">
    <?php echo getPurposeOptions(); ?>
</select><br>

</div>
        <button class="text-2xl bg-green-200 rounded-xl p-2" type="submit">Tạo Sản Phẩm</button>
    </form>
