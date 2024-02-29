<?php
include 'header.php';
include 'connectdb.php';

$address = '';

if (isset($_SESSION['phone'])) {
    $phone = $_SESSION['phone'];
    
    if (isset($conn)) {
        $sql = "SELECT name, address, phone, email, password FROM users WHERE phone = '$phone'";
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $address = $row['address'];
            $phone = $row['phone'];
            $email = $row['email'];
            $password = $row['password'];
        } else {
            echo "No user information found.";
        }
    } else {
        echo "Connection not established!";
    }
} else {
    echo "Phone number not set in session!";
}

// Xử lý cập nhật thông tin người dùng
if(isset($_POST['update'])) {
    $newName = $_POST['name'];
    $newAddress = $_POST['address'];
    $newEmail = $_POST['email'];
    $newPhone = $phone; // Giữ nguyên số điện thoại hiện tại
    $newPassword = $_POST['password'];
    
    // Kiểm tra xem có dữ liệu được nhập vào không
    if(!empty($newName) && !empty($newAddress) && !empty($newEmail) && !empty($newPassword)) {
        // Cập nhật thông tin vào cơ sở dữ liệu
        $updateSql = "UPDATE users SET name='$newName', address='$newAddress', email='$newEmail', password='$newPassword' WHERE phone='$phone'";
        $updateResult = $conn->query($updateSql);
        
        if($updateResult) {
            echo "<script>alert('Cập nhật thông tin thành công');</script>";
            // Cập nhật biến với thông tin mới
            $name = $newName;
            $address = $newAddress;
            $email = $newEmail;
            $password = $newPassword;
        } else {
            echo "<script>alert('Cập nhật thông tin thất bại');</script>";
        }
    } else {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin');</script>";
    }
}
?>

<div class="container">
<h1 class="mt-5" style="font-family: 'Arial', sans-serif;">Thông tin người dùng</h1>

    <div class="row mt-4">
        <div class="col-md-5 offset-md-0">
            <?php if (isset($name)): ?>
                <table class="table table-bordered table-rounded">
                    <tbody>
                        <tr class="table-primary">
                            <th scope="row">Tên :</th>
                            <td><?php echo $name; ?></td>
                        </tr>
                        <tr class="table-secondary">
                            <th scope="row">Địa chỉ :</th>
                            <td><?php echo !empty($address) ? $address : "Chưa có thông tin"; ?></td>
                        </tr>
                        <tr class="table-success">
                            <th scope="row">Số điện thoại :</th>
                            <td><?php echo $phone; ?></td>
                        </tr>
                        <tr class="table-info">
                            <th scope="row">Email :</th>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr class="table-primary">
                            <th scope="row">Mật khẩu :</th>
                            <td><?php echo $password; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No user information available.</p>
            <?php endif; ?>
        </div>
        <div class="col-md-3">
            <div class="text-center">
                <button type="button" class="btn btn-primary mr-3" onclick="showUpdateForm()">Cập nhật thông tin</button>
                <a href="logout.php" class="btn btn-danger">Đăng xuất</a>
            </div>
        </div>
    </div>

    <div id="edit-form" style="display: none;">
        <form id="update-form" method="POST" action="user.php">
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <input type="hidden" name="phone" value="<?php echo $phone; ?>"> <!-- Thêm trường ẩn để lưu số điện thoại -->
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Cập nhật</button>
            <button type="button" class="btn btn-secondary ml-2" onclick="cancelUpdate()">Hủy</button>
        </form>
    </div>
</div>

<script>
    function showUpdateForm() {
        document.getElementById('edit-form').style.display = 'block';
    }

    function cancelUpdate() {
        document.getElementById('edit-form').style.display = 'none';
    }
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include 'footer.php';
?>
