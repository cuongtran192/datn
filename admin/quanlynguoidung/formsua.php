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



?>

<a href="./?page=user&action=lietke">Trở lại </a>

<div class="">Chỉnh sửa thông tin</div>
<form action="index.php?page=user&action=xulysua" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['user_id']; ?>">
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"><br>

        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" value="<?php echo $user['Address']; ?>"><br>

        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>"><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>"><br>

        <button type="submit">Lưu thông tin</button>
    </form>

