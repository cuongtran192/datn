<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/style.css">  
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>


<body class="">

<!-- thẻ header -->
<div class="flex flex-row my-4  mx-auto justify-between w-[80%]"> 
    <a class=" " href="./"  ><span class="  text  opacity-50 round-lg text-4xl font-bold">Admin</span></a>
    <div class="flex ">
         <div class="flex items-center bg-gray-100 p-2 opacity-50 round-lg ">
            <input type="text" placeholder="Tìm kiếm..." class=" w-[400px] border border-gray-300 p-2 rounded-l-md focus:outline-none focus:border-gray-600">
            <button class=" text-black px-4 py-2 border border-gray-300 rounded-r-md hover:bg-gray-200 hover:border-gray-800 focus:outline-none">
            <i class="fas fa-search"></i>
            </button>
         </div >
    </div>
    <div class="flex flex-row items-center">
        <div class="bg-gray-100 p-2 mx-4 opacity-50 text-2xl ring-2 ring-blue-500 font-semibold rounded-[15px]">15/2/2024</div>
        <div class="text-white mx-4 ">
            <i class="fas fa-bell text-red-400 text-4xl hover:text-red-300"></i>
        </div>

    <!-- Biểu tượng người dùng -->
    <div class="text-white mx-4  ">
      <i class="fas fa-user text-blue-400 hover:text-blue-300 text-4xl"></i>
    </div>
    </div>

</div>


<!-- <div class="h-1 bg-gray-0 "></div> -->
 
<!-- phần nội dung -->
<div  class=" flex flex-row bg-gray-50 h-screen px-2">     
    <!-- phần bên trái  -->
<div class="flex flex-col items-left m-2 w-[20%] bg-white p-4 rounded-[15px]">
  <!-- Biểu đồ -->

    <a href="index.php?page=default" class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg">
        <i class="fas fa-chart-bar  w-10 text-4xl mr-4"></i>
        <p class="text-2xl">Dashboard</p>
     </a>

  <!-- Người dùng -->
    <a  href="index.php?page=user" class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg">
     <i class="fas fa-user text-4xl  mr-4  w-10"></i>
     <p class="text-2xl">Quản lý Người dùng</p>
    </a>

  <!-- Sản phẩm -->
    <a href="index.php?page=product"  class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg">
     <i class="fas fa-box text-4xl mr-4 w-10"></i>
     <p class="text-2xl"> Quản lý Sản phẩm</p>
     </a>

  <!-- Đơn hàng -->
    <a  href="index.php?page=order"  class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg ">
     <i class="fas fa-shopping-cart text-4xl mr-4  w-10"></i>
     <p class="text-2xl">Quản lý Đơn hàng</p>
    </a>

  <!-- Khuyến mãi -->
    <a  href="index.php?page=sales"  class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg ">
        <i class="fas fa-gift text-4xl mr-4  w-10"></i>
        <p class="text-2xl">Quản lý Khuyến mãi</p>
    </a>

    <a href="index.php?page=setting"  class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg ">
    
        <i class="fas fa-cogs text-4xl mr-4  w-10"></i>
        <p class="text-2xl">Cài đặt </p>
    </a>
</div>
    
   <!-- content  -->
   <div id="content" class="w-[80%]">


   <?php
  
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    // Sử dụng $page để include file tương ứng
    switch ($page) {
        case 'default':
            include 'default.php';
            break;

        case 'user':
            include 'userManager.php';
            break;

        case 'product':
            include 'productManager.php';
            break;
        case 'order':
          include 'cartManager.php';
            break;
          
        case 'sales':
          include 'salesManager.php';
            break;
        case 'setting':
          include 'setting.php';
            break;
                                             
        // Thêm các trường hợp khác tương tự

        default:
            break;
    }
} else {
  include 'default.php';
}
?>


    </div>
</div>


</body>