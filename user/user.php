<?php session_start();
if (empty($_SESSION['id'])) {
    $_SESSION['error'] = "Đăng nhập để tiếp tục";
    header('location:signin.php?');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Đây là trang người dùng, xin chào bạn 
    <?php echo $_SESSION['name'] ?>
    <br>
    <?php require_once './menu.php' ?>
</body>
</html>