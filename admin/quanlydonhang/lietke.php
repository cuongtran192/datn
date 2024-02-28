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

// Function to fetch order from the database
function getOrders() {
  global $conn;
  $result = $conn->query("SELECT * FROM orders");
  $orders = $result->fetch_all(MYSQLI_ASSOC);
  return $orders;
}

// Display order
$order = getOrders();

foreach ($order as $order) {


echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $order['order_id'] . "</div>";

echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $order["user_id"] . "</div>";

echo "<div class=' border-b-2 font-sans font-base text-base p-2 '>" . $order['total_price']  . "</div>";

echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $order['order_date'] . "</div>";
echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $order['address'] . "</div>";

echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $order['name'] . "</div>";
echo "<div class='border-b-2 font-sans  font-base text-base p-2'>" .$order['phone'] . "</div>";
echo "<div class='border-b-2 font-sans  font-base text-base p-2'>" .$order['state'] . "</div>";

echo "<div class='border-b-2 font-sans font-base text-base p-2'>"  ;
echo "<a href='index.php?page=order&action=xem&id={$order['order_id']}' class='text-blue-500 px-2'>xem</a>";
echo "<a href='index.php?page=order&action=sua&id={$order['order_id']}' class='text-blue-500 px-2'>Sửa</a>";
echo "<a href='index.php?page=order&action=xoa&id={$order['order_id']}' class='text-red-500 px-2'>Xóa</a>";
echo "</div>";

}
?>

</div>


</div>