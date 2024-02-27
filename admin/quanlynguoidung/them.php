<div class="">Thêm người dùng</div>
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
