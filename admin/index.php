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
    <div class=" "  ><span class="  text  opacity-50 round-lg text-4xl font-bold">Admin</span></div>
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

    <a href="./" class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg">
        <i class="fas fa-chart-bar  w-10 text-4xl mr-4"></i>
        <p class="text-2xl">Dashboard</p>
     </a>

  <!-- Người dùng -->
    <button  onclick="loadContent('userManager.php')" class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg">
     <i class="fas fa-user text-4xl  mr-4  w-10"></i>
     <p class="text-2xl">Quản lý Người dùng</p>
    </button>

  <!-- Sản phẩm -->
    <button onclick="loadContent('productManager.php')"  class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg">
     <i class="fas fa-box text-4xl mr-4 w-10"></i>
     <p class="text-2xl"> Quản lý Sản phẩm</p>
     </button>

  <!-- Đơn hàng -->
    <button  onclick="loadContent('cartManager.php')"  class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg ">
     <i class="fas fa-shopping-cart text-4xl mr-4  w-10"></i>
     <p class="text-2xl">Quản lý Đơn hàng</p>
    </button>

  <!-- Khuyến mãi -->
    <button onclick="loadContent('salesManager.php')"  class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg ">
        <i class="fas fa-gift text-4xl mr-4  w-10"></i>
        <p class="text-2xl">Quản lý Khuyến mãi</p>
    </button>

    <button onclick="loadContent('setting.php')"  class="text-gray-500 flex flex-row my-2  hover:bg-gray-300 p-2 rounded-lg ">
    
        <i class="fas fa-cogs text-4xl mr-4  w-10"></i>
        <p class="text-2xl">Cài đặt </p>
    </button>
</div>
    
   <!-- content  -->
   <div id="content" class="w-[80%]">
    <div class="flex flex-col items-left mr-2 my-2  bg-white p-4 rounded-[15px]">
      <!-- phần thông tin chính  -->
      <div class="flex flex-row">
        <div class="w-1/4 h-[200px] m-2 border border-4 border-gray-400/50 rounded-lg ">
          <div class="flex flex-row justify-between"> 
            <div class="m-4">
              <div class="font-bold text-2xl">Tổng doanh thu</div>
              <div class="text-gray-400"> 30 ngày gần đây </div>
            </div>
            <div class="m-4"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-green-500">
               <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
          </div>
          <div class=" m-4 font-bold"><span class="font-bold text-4xl">255555 </span><span class=" text-2xl text-gray-500"> .000 đồng</span></div>
        </div>
        <div class="w-1/4 h-[200px] m-2 border border-4 border-gray-400/50 rounded-lg ">
        <div class="flex flex-row justify-between"> 
            <div class="m-4">
              <div class="font-bold text-2xl text-gray-600">Số đơn đặt hàng</div>
              <div class="text-gray-400"> 30 ngày gần đây </div>
            </div>
            <div class="m-4">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-red-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
              </svg>

            </div>
          </div>
          <div class="m-4 font-bold"><span class="font-bold text-4xl">255555 </span><span class=" text-2xl text-gray-500"> đơn hàng</span></div>
        </div>
        <div class="w-1/4 h-[200px] m-2 border border-4 border-gray-400/50 rounded-lg ">
        <div class="flex flex-row justify-between"> 
            <div class="m-4">
              <div class="font-bold text-2xl"> Số khách hàng</div>
              <div class="text-gray-400"> 30 ngày gần đây </div>
            </div>
            <div class="m-4"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-yellow-500">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
              </svg>
            </div>
          </div>
          <div class="m-4 font-bold"><span class="font-bold text-4xl">188 </span><span class=" text-2xl text-gray-500"> khách hàng</span></div>
        </div>
        <div class="w-1/4 h-[200px] m-2 border border-4 border-gray-400/50 rounded-lg ">
        <div class="flex flex-row justify-between"> 
            <div class="m-4">
              <div class="font-bold text-2xl">Số sản phẩm bán</div>
              <div class="text-gray-400"> 30 ngày gần đây </div>
            </div>
            <div class="m-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-blue-500">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
            </svg>

            </div>
          </div>
          <div class="m-4 font-bold"><span class="font-bold text-4xl">2533 </span><span class=" text-2xl text-gray-500"> sản phẩm</span></div>
        </div>
      </div>
      <!-- phần biểu đồ doanh thu  -->

      <div class="w-[80%] mx-auto my-8" >

      <div  ><span class="text-4xl font-bold">Biểu đồ doanh thu</span><span class="text-2xl font-bold text-gray-400">  (12 tháng)</span></div>
        <canvas id="myChart"></canvas>
      </div>

    <script>

        document.addEventListener("DOMContentLoaded", function () {
            // Fetch data from data.php
            fetch('postdata.php')
                .then(response => response.json())
                .then(data => {
                    var labels = data.map(item => item.month);
                    var values = data.map(item => item.revenue);

                    var ctx = document.getElementById('myChart').getContext('2d');

                    var existingChart = Chart.getChart(ctx);

// If a chart instance exists, destroy it
                if (existingChart) {
                existingChart.destroy();
                  }


                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'doanh thu-nghìn đồng',
                                data: values,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
        });
    </script>



      <!-- phần sản phẩm sắp hết và sản phẩm bán chạy  -->

    </div>
    </div>
</div>

<script>
    function loadContent(page) {
        // Use AJAX to load content dynamically
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", page, true);
        xhttp.send();
    }
</script>
</body>