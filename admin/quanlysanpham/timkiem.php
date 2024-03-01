<!-- phần thông tin chính  -->
<div class="mx-auto">

<div class="grid grid-cols-10 border-double border-double border-4 border-indigo-600 rounded-2xl p-3">
<div class="border-b-2 text-gray-400 font-bold text-base p-2">Mã sản phẩm</div>
<div class="border-b-2  col-span-2 text-gray-400 font-bold text-base p-2">Tên</div>
<div class=" border-b-2 text-gray-400 p-2 font-bold text-base">Giá</div>
<div class="border-b-2 text-gray-400 font-bold text-base p-2">Giảm giá</div>
<div class="border-b-2 text-gray-400  font-bold text-base p-2">Hình Ảnh</div>
<div class="border-b-2 text-gray-400  font-bold text-base p-2">Số lượng</div>
<div class="border-b-2 text-gray-400  font-bold text-base p-2">Đã bán</div>
<div class="border-b-2 text-gray-400  font-bold text-base p-2">Trạng thái </div>
<div class="border-b-2 text-gray-400 font-bold text-base p-2">Hành động</div>
<?php
include '../connectdb.php';

// Function to fetch Product from the database

if (empty($searchTerm)) {
    // Nếu rỗng, hiển thị tất cả
    $query = "SELECT * FROM product";
} else {


switch ($searchType) {

    case 'name':
        $query = "SELECT * FROM product WHERE name LIKE '%$searchTerm%'";
        // ...
        break;
    case 'pricebigger':
        $query = "SELECT * FROM product WHERE price > '$searchTerm'";
        // ...
        break;
    case 'pricesmaller':
        $query = "SELECT * FROM product WHERE price < '$searchTerm'";
            // ...
        break;
     case 'discount':
        $query = "SELECT * FROM product WHERE discount = '$searchTerm'";
                // ...
     break;
    case 'numberbigger':
        $query = "SELECT * FROM product WHERE number > '$searchTerm'";
                    // ...
     break;
    case 'numbersmaller':
        $query = "SELECT * FROM product WHERE number < '$searchTerm'";
                        // ...
    break;
   
    default:
        // Xử lý mặc định nếu loại tìm kiếm không hợp lệ
        // ...
        break;
}}


$result = $conn->query($query);
// Display order
if ($result) {
    $product = $result->fetch_all(MYSQLI_ASSOC);
}
// Display Product

foreach ($product as $product) {
  $action = ($product['active'] == 1) ? 'an' : 'hien';
  $text = ($product['active'] == 1) ? 'Ẩn' : 'Hiện';
    // Assuming you have fetched the product data from the database and stored it in $product variable
    // Replace the placeholders with actual field names from your database
    
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['product_id'] . "</div>";
    echo "<div class='border-b-2 col-span-2 font-sans font-base text-base p-2'>" . $product['name'] . "</div>";
   

    echo "<div class='border-b-2  font-sans font-base text-base p-2'>" . number_format($product['price'], 0, ',', '.') . " đ</div>";


echo "<div class='border-b-2 font-sans font-base text-base p-2'>".$product['discount']." %</div>";
   
    
    // Display image links (adjust as needed based on your actual image URLs)
    echo "<div class='border-b-2 font-sans font-base text-base p-2'><img class='w-[60px] h-[60px]'src='{$product['image_link_1']}' alt='Image'></div>";
   
    
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['number'] . "</div>";
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['number_buy'] . "</div>";
    echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . ($product['active'] ? "hiển thị" : " tạm ẩn ") . "</div>";

    
    
    // Add links for edit and delete actions
    echo "<div class='border-b-2 font-sans font-base text-base py-2'>";
    echo "<a href='index.php?page=product&action=xem&id={$product['product_id']}' class='text-green-500 px-1'>Xem</a>";

    echo "<a href='index.php?page=product&action=sua&id={$product['product_id']}' class='text-blue-500 px-1'>Sửa</a>";
    echo"<a href='index.php?page=product&action=tao' class='text-blue-500 px-1'>thêm</a>";
    echo "<a href='index.php?page=product&action=$action&id={$product['product_id']}' class='text-red-500 px-1'>$text</a>";
    echo "</div>";
    
    


}
?>

</div>


</div>