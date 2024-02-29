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

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    // Fetch product details by ID
    $order = getorderById($orderId);

  

}



?>
<div class="">Chỉnh sửa thông tin</div>
<a href="./?page=order&action=lietke">Trở lại </a>
<form action="index.php?page=order&action=xulysua" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $order['order_id']; ?>">
        <div class="w-[40%]">
     <div >Mã đơn hàng:</div>
         <div   class="" ><?php echo $order['order_id']; ?></div><br>

         <div >Mã khách hàng:</div>
            <div  class=""><?php echo $order['user_id']; ?><div/><br>

         <div >Tổng giá:</div>
              <div   class="" ><?php echo $order['total_price']; ?></div><br>
        <label for="name">Địa chỉ</label>
        <input type="text" id="name" name="address" value="<?php echo $order['address']; ?>"><br>

        <label for="address">Tên người nhận</label>
        <input type="text" id="address" name="name" value="<?php echo $order['name']; ?>"><br>

        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $order['phone']; ?>"><br>

        <label for="order_status">Trạng thái đơn hàng:</label>
        <select name="order_status" id="order_status">
        <option value="cho_xac_nhan" <?php echo ($order['state'] == 'cho_xac_nhan') ? 'selected' : ''; ?>>Chờ xác nhận</option>
        <option value="da_xac_nhan" <?php echo ($order['state'] == 'da_xac_nhan') ? 'selected' : ''; ?>>Đã xác nhận</option>
        <option value="dang_xu_ly" <?php echo ($order['state'] == 'dang_xu_ly') ? 'selected' : ''; ?>>Đang xử lý</option>
        <option value="da_gui" <?php echo ($order['state'] == 'da_gui') ? 'selected' : ''; ?>>Đã gửi</option>
        <option value="da_nhan" <?php echo ($order['state'] == 'da_nhan') ? 'selected' : ''; ?>>Đã nhận</option>
        <option value="da_huy" <?php echo ($order['state'] == 'da_huy') ? 'selected' : ''; ?>>Đã hủy</option>
    

        <!-- Thêm các trạng thái khác nếu cần -->
    </select>
        <button type="submit">Lưu thông tin</button>
    </form>

