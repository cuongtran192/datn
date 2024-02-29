
<?php
include '../connectdb.php';

// Thực hiện truy vấn SQL
$sql = "SELECT SUM(total_price) AS TongDoanhThu FROM `orders` WHERE MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE())";
$result = $conn->query($sql);

// Kiểm tra và hiển thị kết quả
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo  $row['TongDoanhThu'];
} else {
    echo "0";
}

// Đóng kết nối

?>

<div class="flex flex-col items-left mr-2 my-2  bg-white p-4 rounded-[15px]">
      <!-- phần thông tin chính  -->
      <div class="flex flex-row">
        <div class="w-1/4 h-[200px] m-2 border border-4 border-gray-400/50 rounded-lg ">
          <div class="flex flex-row justify-between"> 
            <div class="m-4">
              <div class="font-bold text-2xl">Tổng doanh thu</div>
              <div class="text-gray-400"> trong tháng </div>
            </div>
            <div class="m-4"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-green-500">
               <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
          </div>
          <div class=" m-4 font-bold"><span class="font-bold text-4xl">
             <?php  $sql = "SELECT SUM(total_price) AS TongDoanhThu FROM `orders` WHERE MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE())";
                    $result = $conn->query($sql);

// Kiểm tra và hiển thị kết quả
                    if ($result->num_rows > 0) {
                       $row = $result->fetch_assoc();
                       echo  number_format($row['TongDoanhThu']); ;
                         } else {
                       echo "0";
}
?> 
  </span><span class=" text-2xl text-gray-500"> đ</span></div>
        </div>
        <div class="w-1/4 h-[200px] m-2 border border-4 border-gray-400/50 rounded-lg ">
        <div class="flex flex-row justify-between"> 
            <div class="m-4">
              <div class="font-bold text-2xl text-gray-600">Số đơn đặt hàng</div>
              <div class="text-gray-400"> trong tháng </div>
            </div>
            <div class="m-4">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-red-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
              </svg>

            </div>
          </div>
          <div class="m-4 font-bold"><span class="font-bold text-4xl">   <?php $sql2 = "SELECT COUNT(*) AS SoLuongDonHang FROM orders WHERE MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE())";
                    $result2 = $conn->query($sql2);

// Kiểm tra và hiển thị kết quả
                    if ($result2->num_rows > 0) {
                       $row = $result2->fetch_assoc();
                       echo  number_format($row['SoLuongDonHang']); ;
                         } else {
                       echo "0";
}
?>  </span><span class=" text-2xl text-gray-500"> đơn hàng</span></div>
        </div>
        <div class="w-1/4 h-[200px] m-2 border border-4 border-gray-400/50 rounded-lg ">
        <div class="flex flex-row justify-between"> 
            <div class="m-4">
              <div class="font-bold text-2xl"> Số khách hàng</div>
              <div class="text-gray-400">  </div>
            </div>
            <div class="m-4"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-yellow-500">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
              </svg>
            </div>
          </div>
          <div class="m-4 font-bold"><span class="font-bold text-4xl"> 
              <?php $sql = "SELECT COUNT(*) AS SoLuongNguoi FROM users";
                          $result = $conn->query($sql);

                          // Kiểm tra và in kết quả
                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();
                              echo  $row["SoLuongNguoi"];
                          } else {
                              echo "0";
} ?> 
</span><span class=" text-2xl text-gray-500"> khách hàng</span></div>
        </div>
        <div class="w-1/4 h-[200px] m-2 border border-4 border-gray-400/50 rounded-lg ">
        <div class="flex flex-row justify-between"> 
            <div class="m-4">
              <div class="font-bold text-2xl">Số sản phẩm bán</div>
              <div class="text-gray-400"> trong tháng </div>
            </div>
            <div class="m-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-blue-500">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
            </svg>

            </div>
          </div>
          <div class="m-4 font-bold"><span class="font-bold text-4xl">
                        <?php 
                        date_default_timezone_set('Asia/Ho_Chi_Minh');

                        // Lấy tháng hiện tại
                        $currentMonth = date("n");
                        $currentYear = date("Y");
                   

                        $sql = "SELECT SUM(op.number) AS total_sold
                        FROM `orders` o
                        JOIN order_product op ON o.order_id = op.order_id
                        WHERE MONTH(o.order_date) = $currentMonth
                        AND YEAR(o.order_date) = $currentYear";
                
                $result = $conn->query($sql);
                
                // Kiểm tra và xử lý kết quả
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo  $row["total_sold"];
                } else {
                    echo "0";
                }
 ?>  </span><span class=" text-2xl text-gray-500"> sản phẩm</span></div>
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