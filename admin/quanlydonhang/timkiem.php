<!-- phần thông tin chính  -->
<div class="mx-auto">
 
<div class="grid grid-cols-9  border-double border-double border-4 border-indigo-600 rounded-2xl p-3">

<div class="border-b-2 text-gray-400 font-bold text-xl p-2">Mã đơn</div>
<div class="border-b-2 text-gray-400 font-bold text-xl p-2">Mã người đặt</div>
<div class=" border-b-2 text-gray-400 p-2 font-bold text-xl">Tổng giá trị </div>
<div class="border-b-2 text-gray-400 font-bold text-xl p-2">Ngày đặt hàng</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">Địa chỉ nhận</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">Tên</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">Số điện thoại</div>
<div class="border-b-2 text-gray-400  font-bold text-xl p-2">Trạng thái </div>
<div class="border-b-2 text-gray-400 font-bold text-xl p-2">Hành động</div>
<?php

include '../connectdb.php';


if ( isset($_POST['search_date'])&& $searchType==='date') {
        $searchDate = $_POST['search_date'];
        
        $query = "SELECT * FROM orders WHERE DATE(order_date) = '$searchDate'";
        
      
} elseif (empty($searchTerm)) {
    // Nếu rỗng, hiển thị tất cả
    $query = "SELECT * FROM orders";
} else {

switch ($searchType) {
    case 'id_order':
        $query = "SELECT * FROM orders WHERE order_id = '$searchTerm'";
                // ...
     break;

    case 'name':
        $query = "SELECT * FROM orders WHERE name LIKE '%$searchTerm%'";
        // ...
        break;
    case 'phone':
        $query = "SELECT * FROM orders WHERE phone LIKE '%$searchTerm%'";
        // ...
        break;
    case 'address':
        $query = "SELECT * FROM orders WHERE address LIKE '%$searchTerm%'";
            // ...
        break;
     case 'id':
        $query = "SELECT * FROM orders WHERE user_id = '$searchTerm'";
                // ...
     break;
    case 'bigger':
        $query = "SELECT * FROM orders WHERE total_price > '$searchTerm'";
                    // ...
     break;
    case 'smaller':
        $query = "SELECT * FROM orders WHERE total_price < '$searchTerm'";
                        // ...
    break;
   
    default:
        // Xử lý mặc định nếu loại tìm kiếm không hợp lệ
        // ...
        break;
}}
// Function to fetch order from the database

$result = $conn->query($query);
// Display order
if ($result) {
    $order = $result->fetch_all(MYSQLI_ASSOC);
}

foreach ($order as $order) {


echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $order['order_id'] . "</div>";

echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $order["user_id"] . "</div>";

echo "<div class='border-b-2  font-sans font-base text-base p-2'>" . number_format($order['total_price'], 0, ',', '.') . " đ</div>";


echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $order['order_date'] . "</div>";
echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $order['address'] . "</div>";

echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $order['name'] . "</div>";
echo "<div class='border-b-2 font-sans  font-base text-base p-2'>" .$order['phone'] . "</div>";
echo "<div class='border-b-2 font-sans  font-base text-base p-2'>" .$order['state'] . "</div>";

echo "<div class='border-b-2 font-sans font-base text-base p-2'>"  ;
echo "<a href='index.php?page=order&action=xem&id={$order['order_id']}' class='text-blue-500 px-2'>Xem</a>";
echo "<a href='index.php?page=order&action=sua&id={$order['order_id']}' class='text-blue-500 px-2'>Sửa</a>";
echo "<a href='index.php?page=order&action=xoa&id={$order['order_id']}' class='text-red-500 px-2'>Xóa</a>";
echo "</div>";

}
?>

</div>


</div>