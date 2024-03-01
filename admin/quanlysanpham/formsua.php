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
<div class="m-5 justify-self-start "><a class=" rounded-2xl p-3 bg-green-400 text-black " href="./?page=product&action=lietke">Trở lại </a></div>

<div class=" text-3xl font-bold my-4">Chỉnh sửa thông tin sản phẩm</div>
<form action="index.php?page=product&action=xulysua" method="POST" enctype="multipart/form-data">
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
    
 <div class="flex flex-row my-3">   <label class="text-xl p-3 w-1/4" for="name">Tên sản phẩm:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="name" name="name" value="<?php echo $product['name']; ?>"><br>
 </div>
  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="description">Mô tả:</label>
    <textarea class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" id="description" name="description"><?php echo $product['description']; ?></textarea><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="price">Giá:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="price" name="price" value="<?php echo $product['price']; ?>"><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="discount">Giảm giá:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="discount" name="discount" value="<?php echo $product['discount']; ?>"><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="image_link_1">Link hình ảnh 1:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="image_link_1" name="image_link_1" value="<?php echo $product['image_link_1']; ?>"><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="image_link_2">Link hình ảnh 2:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="image_link_2" name="image_link_2" value="<?php echo $product['image_link_2']; ?>"><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="image_link_3">Link hình ảnh 3:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="image_link_3" name="image_link_3" value="<?php echo $product['image_link_3']; ?>"><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="image_link_4">Link hình ảnh 4:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="image_link_4" name="image_link_4" value="<?php echo $product['image_link_4']; ?>"><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="number">Số lượng:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="number" name="number" value="<?php echo $product['number']; ?>"><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="number_buy">Số lượng bán:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="number_buy" name="number_buy" value="<?php echo $product['number_buy']; ?>"><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="type_id">ID loại:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="type_id" name="type_id" value="<?php echo $product['type_id']; ?>"><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="brand_id">ID thương hiệu:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="brand_id" name="brand_id" value="<?php echo $product['brand_id']; ?>"><br>
    </div>

  <div class="flex flex-row my-3">  <label class="text-xl p-3 w-1/4" for="purpose_id">ID mục đích:</label>
    <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="purpose_id" name="purpose_id" value="<?php echo $product['purpose_id']; ?>"><br>
    </div>

    <button class="text-2xl bg-green-200 rounded-xl p-2" type="submit">Lưu thông tin</button>
</form>

