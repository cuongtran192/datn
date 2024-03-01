<div class="flex flex-col items-left mr-2 my-2  bg-white p-4 rounded-[15px]">
<form action="index.php?page=user&action=timkiem" method="POST" enctype="multipart/form-data" class="flex items-center bg-gray-100 p-2 opacity-50 round-lg" onsubmit="return validateForm()">
    <input type="text" name="search_term" placeholder="Tìm kiếm..." class="w-[400px] border border-gray-300 p-2 rounded-l-md focus:outline-none focus:border-gray-600" value="<?php echo isset($_POST['search_term']) ? htmlspecialchars($_POST['search_term']) : ''; ?>">

    <select name="search_type" id="search_type" class="border border-gray-300 p-2 focus:outline-none" onchange="toggleDateInput()">
        <option value="name" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'name') ? 'selected' : ''; ?>>Tên người dùng</option>
        <option value="address" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'address') ? 'selected' : ''; ?>>Địa chỉ</option>
        <option value="phone" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'phone') ? 'selected' : ''; ?>>Số điện thoại</option>
        <option value="email" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'email') ? 'selected' : ''; ?>>Email</option>
        
       
    </select>

    <!-- Thêm trường chọn ngày tháng, nhưng ẩn nó ban đầu -->
    

    <button type="submit" name="search" class="text-black px-4 py-2 border border-gray-300 rounded-r-md hover:bg-gray-200 hover:border-gray-800 focus:outline-none">
        <i class="fas fa-search"></i>
    </button>
</form>
<?php
include '../connectdb.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
   
    // Sử dụng $page để include file tương ứng
    switch ($action) {
        case 'them':
            include 'quanlynguoidung/them.php';
            break;
         case 'timkiem':
           if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
                  $searchType = $_POST['search_type'];
                  $searchTerm = $_POST['search_term'];
                 
              
          include 'quanlynguoidung/timkiem.php';
             
                 
              }
              break;
        case 'xulysua':
          
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $idd = $_POST['id'];
          $name = $_POST['name'];
            $address = $_POST['address'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];

  
  // Cập nhật dữ liệu trong bảng users
        $sql = "UPDATE users SET name='$name', Address='$address', phone='$phone', email='$email' WHERE user_id=$idd";

       if ($conn->query($sql) === TRUE) {
            // header("Location: index.php?page=user&action=sua&id=$idd");
            include "quanlynguoidung/lietke.php";
        } else {
            echo "Lỗi: " . $conn->error;
      }
        }      break;    
       case 'sua':
        $id= $_GET['id'];
            include "quanlynguoidung/formsua.php";
              break;
        case 'xoa':
          $id= $_GET['id'];

          $deleteReviewQuery = "DELETE FROM review WHERE user_id = $id";
          $getorderIdQuery = "SELECT * FROM orders WHERE user_id = $id";
          // Xóa bảng order có user_id = $id
          $deleteorderQuery = "DELETE FROM orders WHERE user_id = $id";
          $deleteQuery = "DELETE FROM users WHERE user_id = $id";
          // Lấy order_id từ bảng order để sử dụng trong việc xóa bảng product_order
      

         

          $resultGetorder = $conn->query($getorderIdQuery);
          $orderIds = $resultGetorder->fetch_all(MYSQLI_ASSOC);
          foreach ($orderIds as $order) {
            $orderId = $order['order_id'];

            $deleteProductorderQuery = "DELETE FROM order_product WHERE order_id = $orderId";
            $resultDeleteProductorder = $conn->query($deleteProductorderQuery);
          }

        $conn->query( $deleteReviewQuery);
        $conn->query($deleteorderQuery);
        $conn->query($deleteReviewQuery);

          if($conn->query($deleteQuery)) {
            include "quanlynguoidung/lietke.php";
          } else {
              echo "Lỗi khi xóa: " . $conn->error;
          }
            break;
        case 'lietke':
          include 'quanlynguoidung/lietke.php';
            break; 
                                             
        // Thêm các trường hợp khác tương tự

        default:
            break;
    }
} else {
  include 'quanlynguoidung/lietke.php';
}
?>

</div>


      


 