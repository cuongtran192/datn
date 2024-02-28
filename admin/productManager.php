<div class="flex flex-col items-left mr-2 my-2  bg-white p-4 rounded-[15px]">

<?php
include '../connectdb.php';


  

if (isset($_GET['action'])) {
    $action = $_GET['action'];
   
    // Sử dụng $page để include file tương ứng
    switch ($action) {
        case 'them':
            include 'quanlysanpham/them.php';
            break;
        case 'xulytao':
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy thông tin từ form
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $image_link_1 = $_POST['image_link_1'];
            $image_link_2 = $_POST['image_link_2'];
            $image_link_3 = $_POST['image_link_3'];
            $image_link_4 = $_POST['image_link_4'];
            $number = $_POST['number'];
            $number_buy = $_POST['number_buy'];
            $type_id = $_POST['type_id'];
            $brand_id = $_POST['brand_id'];
            $purpose_id = $_POST['purpose_id'];
          
            echo "Sản phẩm đã được tạo thành công!";
          } else {
            echo "Không có dữ liệu được gửi đi.";
        }


            break;


        case 'xulysua':
  
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            
             $product_id  =$_POST['product_id'];
             $name=$_POST['name'];
             $description=$_POST['description'];
             $price=$_POST['price'];
             $discount=$_POST['discount'];
             $image_link_1=$_POST['image_link_1'];
             $image_link_2=$_POST['image_link_2'];
             $image_link_3=$_POST['image_link_3'];
             $image_link_4=$_POST['image_link_4'];
             $number=$_POST['number'];
             $number_buy=$_POST['number_buy'];
             $type_id=$_POST['type_id'];
             $brand_id=$_POST['brand_id'];
             $purpose_id =$_POST['purpose_id'];
          
  // Cập nhật dữ liệu trong bảng users
  $sql = "UPDATE product
        SET name='$name', description='$description', price='$price', discount='$discount', 
            image_link_1='$image_link_1', image_link_2='$image_link_2', 
            image_link_3='$image_link_3', image_link_4='$image_link_4', 
            number='$number', number_buy='$number_buy', 
            type_id='$type_id', brand_id='$brand_id', purpose_id='$purpose_id' 
        WHERE product_id='$product_id'";

// Execute the update

       if ($conn->query($sql) === TRUE) {
            header("Location: index.php?page=product&action=sua&id=$product_id");
        } else {
            echo "Lỗi: " . $conn->error;
      }
        }          
       case 'sua':
        $id= $_GET['id'];
            include "quanlysanpham/formsua.php";
              break;
       case 'xem':
            $id= $_GET['id'];
                include "quanlysanpham/xem.php";
                break;
        case 'tao':
           include "quanlysanpham/tao.php";
              break;
        case 'xoa':
          $id= $_GET['id'];
          $deleteQuery = "DELETE FROM product WHERE product_id = $id";
          if($conn->query($deleteQuery)) {
              header("Location: index.php?page=product");
          } else {
              echo "Lỗi khi xóa: " . $conn->error;
          }
            break;
        case 'lietke':
          include 'quanlysanpham/lietke.php';
            break; 
                                             
        // Thêm các trường hợp khác tương tự

        default:
            break;
    }
} else {
  include 'quanlysanpham/lietke.php';
}
?>

</div>


      


 