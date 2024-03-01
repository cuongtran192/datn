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
function getTypeNameById($typeId) {
    global $conn;
    $typeId = mysqli_real_escape_string($conn, $typeId);
    $result = $conn->query("SELECT name FROM type WHERE type_id = '$typeId'");
    $type = $result->fetch_assoc();
    return $type['name'];
}
function getBrandNameById($brandId) {
    global $conn;
    $brandId = mysqli_real_escape_string($conn, $brandId);
    $result = $conn->query("SELECT name FROM brand WHERE brand_id = '$brandId'");
    $brand = $result->fetch_assoc();
    return $brand['name'];
}
function getPurposeNameById($purposeId) {
    global $conn;
    $purposeId = mysqli_real_escape_string($conn, $purposeId);
    $result = $conn->query("SELECT name FROM purpose WHERE purpose_id = '$purposeId'");
    $purpose = $result->fetch_assoc();
    return $purpose['name'];
}

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch product details by ID
    $product = getProductById($productId);
}
?>
<div class="m-5 justify-self-start "><a class=" rounded-2xl p-3 bg-green-400 text-black " href="./?page=product&action=lietke">Trở lại </a></div>
<div class=" text-3xl font-bold my-4"> Thông tin sản phẩm</div>

<div>
    
<div class="flex flex-row my-3"> 
    <div class="text-xl p-3 w-1/4 "  for="name">Tên sản phẩm:</div>
    <div   class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" ><?php echo $product['name']; ?></div><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="description">Mô tả:</div>
    <div class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl"><?php echo $product['description']; ?></div><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="price">Giá:</div>
    <div   class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" ><?php echo $product['price']; ?></div><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="discount">Giảm giá:</div>
    <div  class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" ><?php echo $product['discount']; ?></div><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="image_link_1">Hình ảnh 1:</div>
    <img src="<?php echo $product['image_link_1']; ?>" class="w-[100px]" ></img><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="image_link_2">Hình ảnh 2:</div>
    <img src="<?php echo $product['image_link_2']; ?>" class="w-[100px]" ></img><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="image_link_3">Hình ảnh 3:</div>
    <img src="<?php echo $product['image_link_3']; ?>" class="w-[100px]" ></img><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="image_link_4">Hình ảnh 4:</div>
    <img src="<?php echo $product['image_link_4']; ?>" class="w-[100px]" ></img><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="number">Số lượng:</div>
    <div  class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" ><?php echo $product['number']; ?></div><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="number_buy">Số lượng bán:</div>
    <div   class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" ><?php echo $product['number_buy']; ?></div><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="type_id">Loại:</div>
    <div   class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" ><?php echo getTypeNameById($product['type_id']) ; ?></div><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="brand_id"> Thương hiệu:</div>
    <div   class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" ><?php echo getBrandNameById($product['brand_id']) ; ?></div><br>
    </div>  
   <div class="flex flex-row my-3">
    <div class="text-xl p-3 w-1/4 "  for="purpose_id">Mục đích:</div>
    <div  class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" ><?php echo getPurposeNameById($product['purpose_id']); ?></div><br>
    </div>  
    
</div>
