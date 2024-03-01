
<div class="flex flex-col items-left mr-2 my-2  bg-white p-4 rounded-[15px]">
<form action="index.php?page=order&action=timkiem" method="POST" enctype="multipart/form-data" class="flex items-center bg-gray-100 p-2 opacity-50 round-lg" onsubmit="return validateForm()">
    <input type="text" name="search_term" placeholder="Tìm kiếm..." class="w-[400px] border border-gray-300 p-2 rounded-l-md focus:outline-none focus:border-gray-600" value="<?php echo isset($_POST['search_term']) ? htmlspecialchars($_POST['search_term']) : ''; ?>">

    <select name="search_type" id="search_type" class="border border-gray-300 p-2 focus:outline-none" onchange="toggleDateInput()">
        <option value="name" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'name') ? 'selected' : ''; ?>>Tên người nhận</option>
        <option value="phone" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'phone') ? 'selected' : ''; ?>>Số điện thoại</option>
        <option value="address" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'address') ? 'selected' : ''; ?>>Địa chỉ</option>
        <option value="id" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'id') ? 'selected' : ''; ?>>ID người đặt</option>
        <option value="bigger" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'bigger') ? 'selected' : ''; ?>>Giá trị lớn hơn</option>
        <option value="smaller" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'smaller') ? 'selected' : ''; ?>>Giá trị nhỏ hơn</option>
        <option value="date" <?php echo (isset($_POST['search_type']) && $_POST['search_type'] == 'date') ? 'selected' : ''; ?>>Ngày tháng</option>
    </select>

    <!-- Thêm trường chọn ngày tháng, nhưng ẩn nó ban đầu -->
    <input type="date" name="search_date" id="search_date" class="border border-gray-300 p-2 focus:outline-none" style="display:<?php echo (isset($_POST['search_date'])&&$_POST['search_type']==='date') ? 'block' : 'none'; ?>;" value="<?php echo isset($_POST['search_date']) ? $_POST['search_date'] : ''; ?>">

    <button type="submit" name="search" class="text-black px-4 py-2 border border-gray-300 rounded-r-md hover:bg-gray-200 hover:border-gray-800 focus:outline-none">
        <i class="fas fa-search"></i>
    </button>
</form>

<script>
function toggleDateInput() {
    var searchType = document.getElementById("search_type");
    var searchDate = document.getElementById("search_date");
    
    // Nếu lựa chọn là "Ngày tháng", hiển thị trường chọn ngày và vô hiệu hóa trường nhập từ tìm kiếm
    if (searchType.value === "date") {
        searchDate.style.display = "block";
       
    } else {
        // Ngược lại, ẩn trường chọn ngày và kích hoạt trường nhập từ tìm kiếm
        searchDate.style.display = "none";
      

    }
}

function validateForm() {
    // Thêm các điều kiện kiểm tra cần thiết trước khi submit form (nếu cần)
    return true;
}
</script>


<?php


include '../connectdb.php';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
   
    // Sử dụng $page để include file tương ứng
    switch ($action) {
        case 'them':
            include 'quanlydonhang/them.php';
            break;
        case 'timkiem':
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
            $searchType = $_POST['search_type'];
            $searchTerm = $_POST['search_term'];
           
        
            include 'quanlydonhang/timkiem.php';
          
           
        }
      

         
          break;
        case 'xulysua':
         
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idd = $_POST['id'];
          $name = $_POST['name'];
            $address = $_POST['address'];
          $phone = $_POST['phone'];
          $state = $_POST['order_status'];

  
  // Cập nhật dữ liệu trong bảng users
        $sql = "UPDATE orders SET name='$name', Address='$address', phone='$phone', state='$state' WHERE order_id=$idd";

       if ($conn->query($sql) === TRUE) {
        include "quanlydonhang/lietke.php";
        } else {
            echo "Lỗi: " . $conn->error;
      }
        } break;          
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


          $deleteQuery = "DELETE FROM orders WHERE order_id = $id";
          $deleteProductorderQuery = "DELETE FROM order_product WHERE order_id = $id";
          $resultDeleteProductorder = $conn->query($deleteProductorderQuery);

          if($conn->query($deleteQuery)) {
            include "quanlydonhang/lietke.php";

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


      


 