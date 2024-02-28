
<div class="flex flex-col items-left mr-2 my-2  bg-white p-4 rounded-[15px]">

<?php
include '../connectdb.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
   
    // Sử dụng $page để include file tương ứng
    switch ($action) {
        case 'them':
            include 'quanlydonhang/them.php';
            break;

        case 'xulysua':
          $id= $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idd = $_POST['id'];
          $name = $_POST['name'];
            $address = $_POST['address'];
          $phone = $_POST['phone'];
          $state = $_POST['email'];

  
  // Cập nhật dữ liệu trong bảng users
        $sql = "UPDATE orders SET name='$name', Address='$address', phone='$phone', state='$state' WHERE order_id=$idd";

       if ($conn->query($sql) === TRUE) {
            header("Location: index.php?page=order&action=sua&id=$idd");
        } else {
            echo "Lỗi: " . $conn->error;
      }
        }          
       case 'sua':
        $id= $_GET['id'];
            include "quanlydonhang/formsua.php";
              break;
        case 'xem':
          $id= $_GET['id'];
            include "quanlydonhang/xem.php";
              break;
    
        case 'xoa':
          $id= $_GET['id'];
          $deleteQuery = "DELETE FROM cart WHERE user_id = $id";
          if($conn->query($deleteQuery)) {
              header("Location: index.php?page=user");
          } else {
              echo "Lỗi khi xóa: " . $conn->error;
          }
            break;
        case 'lietke':
          include 'quanlydonhang/lietke.php';
            break; 
                                             
        // Thêm các trường hợp khác tương tự

        default:
            break;
    }
} else {
  include 'quanlydonhang/lietke.php';
}
?>

</div>


      


 