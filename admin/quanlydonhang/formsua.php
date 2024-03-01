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
<div class="m-5 justify-self-start "><a class=" rounded-2xl p-3 bg-green-400 text-black " href="./?page=order&action=lietke">Trở lại </a></div>

<div class=" text-3xl font-bold my-4">Chỉnh sửa thông tin</div>
<form action="index.php?page=order&action=xulysua" method="POST" enctype="multipart/form-data">
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="hidden" name="id" value="<?php echo $order['order_id']; ?>">

        <div class="flex flex-row my-3">  
         <div class="text-xl p-3 w-1/4" >Mã đơn hàng:</div>
         <div  class="text-white bg-gray-500 w-2/3 p-3 focus:bg-green-200 focus:text-white rounded-2xl" ><?php echo $order['order_id']; ?></div><br></div>
         <div class="flex flex-row my-3">  
         <div class="text-xl p-3 w-1/4" >Mã khách hàng:</div>
            <div class="text-white bg-gray-500 w-2/3 p-3 focus:bg-green-200 focus:text-white rounded-2xl"><?php echo $order['user_id']; ?></div><br></div>
            <div class="flex flex-row my-3">  
         <div class="text-xl p-3 w-1/4" >Tổng giá:</div>
              <div   class="text-white bg-gray-500 w-2/3 p-3 focus:bg-green-200 focus:text-white rounded-2xl" ><?php echo $order['total_price']; ?></div><br></div>
        <div class="flex flex-row my-3">     
        <label class="text-xl p-3 w-1/4" for="name">Địa chỉ</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="name" name="address" value="<?php echo $order['address']; ?>"><br></div>
        <div class="flex flex-row my-3">  
        <label class="text-xl p-3 w-1/4" for="address">Tên người nhận</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="address" name="name" value="<?php echo $order['name']; ?>"><br></div>
        <div class="flex flex-row my-3">  
        <label class="text-xl p-3 w-1/4" for="phone">Số điện thoại:</label>
        <input class="text-black bg-gray-300 w-2/3 p-3 focus:bg-green-200 focus:text-black rounded-2xl" type="text" id="phone" name="phone" value="<?php echo $order['phone']; ?>"><br></div>
        <div class="flex flex-row my-3">  
        <label class="text-xl p-3 w-1/4" for="order_status">Trạng thái đơn hàng:</label>
        <select class="bg-blue-300 p-2 rounded-xl" name="order_status" id="order_status">
        <option value="cho_xac_nhan" <?php echo ($order['state'] == 'cho_xac_nhan') ? 'selected' : ''; ?>>Chờ xác nhận</option>
        <option value="da_xac_nhan" <?php echo ($order['state'] == 'da_xac_nhan') ? 'selected' : ''; ?>>Đã xác nhận</option>
        <option value="dang_xu_ly" <?php echo ($order['state'] == 'dang_xu_ly') ? 'selected' : ''; ?>>Đang xử lý</option>
        <option value="da_gui" <?php echo ($order['state'] == 'da_gui') ? 'selected' : ''; ?>>Đã gửi</option>
        <option value="da_nhan" <?php echo ($order['state'] == 'da_nhan') ? 'selected' : ''; ?>>Đã nhận</option>
        <option value="da_huy" <?php echo ($order['state'] == 'da_huy') ? 'selected' : ''; ?>>Đã hủy</option>
    
       
        <!-- Thêm các trạng thái khác nếu cần -->
    </select> </div>
        <button class="text-2xl bg-green-200 rounded-xl p-2" type="submit">Lưu thông tin</button>
    </form>

