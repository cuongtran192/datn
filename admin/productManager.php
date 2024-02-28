<div class="flex flex-col items-left mr-2 my-2  bg-white p-4 rounded-[15px]">

<?php


include '../connectdb.php';
require __DIR__ . '/../vendor/autoload.php';
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;

// Cấu hình thông tin đăng nhập của Cloudinary
$config = [
    "cloud_name" => 'dhwhjdkrr',
    "api_key" => '869728322565296',
    "api_secret" => 'XdyEWnWw_fdHGeFRwy5wTxa-JJc',
    "secure" => true,
];

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
            if (isset($_FILES['image_1']) && $_FILES['image_1']['error'] === UPLOAD_ERR_OK) {
              // Tạo đối tượng Cloudinary với cấu hình
              $cloudinary = new Cloudinary($config);
      
              // Lấy đường dẫn tạm thời của file được chọn
              $tmpFilePath1 = $_FILES['image_1']['tmp_name'];
              $tmpFilePath2 = $_FILES['image_2']['tmp_name'];
              $tmpFilePath3 = $_FILES['image_3']['tmp_name'];
              $tmpFilePath4 = $_FILES['image_4']['tmp_name'];
      
              // Lệnh upload hình ảnh
              $result1 = $cloudinary->uploadApi()->upload($tmpFilePath1);
              $result2 = $cloudinary->uploadApi()->upload($tmpFilePath2);
              $result3 = $cloudinary->uploadApi()->upload($tmpFilePath3);
              $result4 = $cloudinary->uploadApi()->upload($tmpFilePath4);
      
              // Hiển thị kết quả
              echo "Image uploaded successfully.<br>";
              
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $number = $_POST['number'];
            $number_buy = $_POST['number_buy'];
            $type_id = $_POST['type_id'];
            $brand_id = $_POST['brand_id'];
            $purpose_id = $_POST['purpose_id'];
            $image_link_1=$result1['secure_url'];
            $image_link_2=$result2['secure_url'];
            $image_link_3=$result3['secure_url'];
            $image_link_4=$result4['secure_url'];
            echo $image_link_1."  ".$image_link_2 ."  ".$image_link_1."  ".$image_link_2;
            $sql = "INSERT INTO product (name, description, price, discount, number, number_buy, type_id, brand_id, purpose_id, image_link_1, image_link_2, image_link_3, image_link_4)
            VALUES ('$name', '$description', $price, $discount, $number, $number_buy, $type_id, $brand_id, $purpose_id, '$image_link_1', '$image_link_2', '$image_link_3', '$image_link_4')";
    
    // Thực hiện truy vấn
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



          } else {
              // Xử lý nếu không có file được chọn
              echo "Please choose an image to upload.";
          }
          



          
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


      


 