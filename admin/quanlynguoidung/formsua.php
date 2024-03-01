<?php


include '../connectdb.php';


// Function to fetch a user by ID from the database
function getUserById($userId) {
    global $conn;
    $userId = mysqli_real_escape_string($conn, $userId);
    $result = $conn->query("SELECT * FROM users WHERE user_id = '$userId'");
    $user = $result->fetch_assoc();
    return $user;
}

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user details by ID
    $user = getUserById($userId);
}



?><div class="flex flex-col justify-center ">
<div class="m-5 justify-self-start "><a class=" rounded-2xl p-3 bg-green-400 text-white " href="./?page=user&action=lietke">Trở lại </a></div>


<div class=" text-3xl font-bold my-4">Chỉnh sửa thông tin</div>
<form action="index.php?page=user&action=xulysua" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['user_id']; ?>">
    <div class="flex flex-row ">
        <label class="text-xl p-3 "  for="name">Họ và tên:</label>
        <input class="bg-gray-500 p-3"  type="text" id="name" name="name" value="<?php echo $user['name']; ?>"><br>
    </div>
     <div class="flex flex-row ">
             <label class="text-xl p-3" for="address">Địa chỉ:</label>
        <input class="bg-gray-500 p-3 focus:bg-green-200" type="text" id="address" name="address" value="<?php echo $user['Address']; ?>"><br>
    </div>
     <div class="flex flex-row ">
             <label class="text-xl p-3" for="phone">Số điện thoại:</label>
        <input class="bg-gray-500 p-3" type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>"><br>
    </div>
     <div class="flex flex-row ">
             <label class="text-xl p-3" for="email">Email:</label>
        <input class="bg-gray-500 p-3" type="text" id="email" name="email" value="<?php echo $user['email']; ?>"><br>
    </div>




       


        <button class="text-2xl bg-green-200 rounded-xl p-2" type="submit">Lưu thông tin</button>
    </form>

    </div>