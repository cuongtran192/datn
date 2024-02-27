<!-- phần thông tin chính  -->
<div class="mx-auto">

<div class="grid grid-cols-12 border-double border-double border-4 border-indigo-600 rounded-2xl p-3">
<div class="border-b-2 text-gray-400 font-bold text-xl p-2">id</div>
<div class="border-b-2  col-span-2 text-gray-400 font-bold text-xl p-2">Tên</div>
<div class=" border-b-2 text-gray-400 p-2 font-bold text-xl">Giá</div>
<div class="border-b-2 text-gray-400 font-bold text-xl p-2">Giảm giá</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">Image1</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">số lượng</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">Đã bán</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">Loại </div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">Hãng</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">mục đích </div>
<div class="border-b-2 text-gray-400 font-bold text-xl p-2">Hành động</div>
<?php
include '../connectdb.php';

// Function to fetch Product from the database
function getProduct() {
  global $conn;
  $result = $conn->query("SELECT * FROM product");
  $product = $result->fetch_all(MYSQLI_ASSOC);
  return $product;
}

// Display Product
$product = getProduct();

foreach ($product as $product) {
    
    // Assuming you have fetched the product data from the database and stored it in $product variable
    // Replace the placeholders with actual field names from your database
    
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['product_id'] . "</div>";
    echo "<div class='border-b-2 col-span-2 font-sans font-base text-base p-2'>" . $product['name'] . "</div>";
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['price'] . "</div>";
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['discount'] . "</div>";
    
    // Display image links (adjust as needed based on your actual image URLs)
    echo "<div class='border-b-2 font-sans font-base text-base p-2'><img class='w-[20px] h-[20px]'src='{$product['image_link_1']}' alt='Image 1'></div>";
   
    
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['number'] . "</div>";
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['number_buy'] . "</div>";
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['type_id'] . "</div>";
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['brand_id'] . "</div>";
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['purpose_id'] . "</div>";
    
    // Add links for edit and delete actions
    echo "<div class='border-b-2 font-sans font-base text-base py-2'>";
    echo "<a href='index.php?page=product&action=xem&id={$product['product_id']}' class='text-green-500 px-2'>Xem</a>";

    echo "<a href='index.php?page=product&action=sua&id={$product['product_id']}' class='text-blue-500 px-2'>Sửa</a>";
    echo "<a href='index.php?page=product&action=xóa&id={$product['product_id']}' class='text-red-500 px-2'>Xóa</a>";
    echo "</div>";
    
    


}
?>

</div>


</div>