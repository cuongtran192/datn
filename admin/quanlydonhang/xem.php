<?php
include '../connectdb.php';
// Function to fetch a product by ID from the database

function getOrderById($orderId) {
    global $conn;
    $orderId = mysqli_real_escape_string($conn, $orderId);
    $result = $conn->query("SELECT * FROM orders WHERE order_id = '$orderId'");
    $order = $result->fetch_assoc();
    return $order;
}
function getProductByOrder($orderId) {
    global $conn;
    $orderId = mysqli_real_escape_string($conn, $orderId);
    $result = $conn->query("SELECT * FROM order_product WHERE order_id = '$orderId'");
    $product_order = $result->fetch_all(MYSQLI_ASSOC);
    
    return $product_order;
}
function getProductById($productId) {
    global $conn;
    $productId = mysqli_real_escape_string($conn, $productId);
    $result = $conn->query("SELECT * FROM product WHERE product_id = '$productId'");
    $product = $result->fetch_assoc();
    return $product;
}
// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    // Fetch product details by ID
    $order = getorderById($orderId);

    $product_order = getProductByOrder($orderId);


}
?>

<div class=""> Thông tin Đơn hàng</div>
<a href="./?page=order&action=lietke">Trở lại </a>
<div class="flex flex-row">
    <div class="w-[40%]">
    <div >Mã đơn hàng:</div>
    <div   class="" ><?php echo $order['order_id']; ?></div><br>

    <div >Mã khách hàng:</div>
    <div  class=""><?php echo $order['user_id']; ?></div><br>

    <div >Tổng giá:</div>
    <div   class="" ><?php echo $order['total_price']; ?></div><br>

    <div >Địa chỉ nhận hàng:</div>
    <div   class="" ><?php echo $order['address']; ?></div><br>
    <div >Tên người nhận:</div>
    <div   class="" ><?php echo $order['name']; ?></div><br>
    <div >Số điện thoại :</div>
    <div   class="" ><?php echo $order['phone']; ?></div><br>
    <div >Tình trạng giao hàng :</div>
    <div   class="" ><?php echo $order['state']; ?></div><br>
</div>
    <div class="w-[60%]">
<div class="grid grid-cols-7 border-double border-double border-4 border-indigo-600 rounded-2xl p-3">
<div class="border-b-2 text-gray-400 font-bold text-xl p-2">Số thứ tự</div>
<div class="border-b-2   text-gray-400 font-bold text-xl p-2">Tên sản phẩm</div>
<div class="border-b-2   text-gray-400 font-bold text-xl p-2">Hình ảnh</div>
<div class=" border-b-2 text-gray-400 p-2 font-bold text-xl">Số lượng mua</div>
<div class="border-b-2 text-gray-400 font-bold text-xl p-2">giá</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">số lượng tồn kho</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">Đã bán</div>

<?php


    $key=1;
    foreach ($product_order as $product_order) {
    
        $product=getProductById($product_order['product_id']);
       
       
        $image=$product['image_link_1'];
        

        echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $key. "</div>";
        $key++;
        echo "<div class='border-b-2  font-sans font-base text-base p-2'>" .$product['name'] . "</div>";
        echo "<img class='w-[60px] h-[60px]'src='{$image}' alt='Image'>";
        echo " <div class='border-b-2 font-sans font-base text-base p-2'>" . $product_order['number'] . "</div>";

        echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product_order['price'] . "</div>";

        echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['number']  . "</div>";
        echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $product['number_buy'] . "</div>";

    


    
       
        
        
    
    
    }


?>

    </div>

    

    
</div>
</div>