<div class="flex flex-col items-left mr-2 my-2  bg-white p-4 rounded-[15px]">

<?php
include '../connectdb.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
   
    // Sử dụng $page để include file tương ứng
    switch ($action) {
        case 'them':
            include 'quanlynguoidung/them.php';
            break;

        case 'xulysua':
          $id= $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $idd = $_POST['id'];
          $name = $_POST['name'];
            $address = $_POST['address'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];

  
  // Cập nhật dữ liệu trong bảng users
        $sql = "UPDATE users SET name='$name', Address='$address', phone='$phone', email='$email' WHERE user_id=$idd";

       if ($conn->query($sql) === TRUE) {
            header("Location: index.php?page=user&action=sua&id=$idd");
        } else {
            echo "Lỗi: " . $conn->error;
      }
        }          
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
              header("Location: index.php?page=user");
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


      


 