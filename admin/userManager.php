<div class="flex flex-col items-left mr-2 my-2  bg-white p-4 rounded-[15px]">
      <!-- phần thông tin chính  -->
      <div class="mx-auto">

      <div class="grid grid-cols-10  border-double border-double border-4 border-indigo-600 rounded-2xl p-3">
      <div class="border-b-2 text-gray-400 font-bold text-xl p-2">ID</div>
      <div class="border-b-2 text-gray-400 font-bold text-xl p-2">Khách hàng</div>
      <div class="col-span-4 border-b-2 text-gray-400 p-2 font-bold text-xl">Địa chỉ</div>
      <div class="border-b-2 text-gray-400 font-bold text-xl p-2">Số điện thoại</div>
      <div class="border-b-2 text-gray-400 col-span-2 font-bold text-xl p-2">Email</div>
      <div class="border-b-2 text-gray-400 font-bold text-xl p-2">Hành động</div>
      <?php
    include '../connectdb.php';

    // Function to fetch users from the database
    function getUsers() {
        global $conn;
        $result = $conn->query("SELECT * FROM users");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }

    // Display users
    $users = getUsers();

    foreach ($users as $user) {

    
      echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $user['user_id'] . "</div>";
      $name = empty($user['name']) ? "Chưa cập nhật" : $user['name'];
      echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $name . "</div>";
      $address = empty($user['Address']) ? "Chưa cập nhật" : $user['Address'];
      echo "<div class='col-span-4 border-b-2 font-sans font-base text-base p-2 '>" . $address . "</div>";
      
      
      echo "<div class='border-b-2 font-sans font-base text-base p-2'>" . $user['phone'] . "</div>";
      $email= empty($user['email']) ? "Chưa cập nhật" : $user['email'];
      echo "<div class='border-b-2 font-sans col-span-2 font-base text-base p-2'>" . $email. "</div>";
      echo "<div class='border-b-2 font-sans font-base text-base p-2'>"  ;
      echo "<a href='userProcess.php?action=edit&id={$user['user_id']}' class='text-blue-500 px-2'>Sửa</a>";
      echo "<a href='userProcess.php?action=delete&id={$user['user_id']}' class='text-red-500 px-2'>Xóa</a>";
     echo "</div>";

    }
    ?>

</div>




    
   
</div>
    </div>