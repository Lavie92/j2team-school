<?php 
    session_start();
    if (isset($_COOKIE['remember'])) {
        $token = $_COOKIE['remember'];
        require_once './connect.php';
        $sql = "select * from customers
        where token = '$token'
        limit 1";
        $result = mysqli_query($connect, $sql);
        $numberRows = mysqli_num_rows($result);
        if ($numberRows == 1) {
            $each = mysqli_fetch_array($result);
            $_SESSION['id'] = $each['id'];
            $_SESSION['name'] = $each['name'];
        }
    }
    if (isset($_SESSION['id'])) {
        header('location:user.php');
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
    <?php 
        if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset ($_SESSION['error']);
        }
    ?>
    <form action="processSignin.php" method="post">
        Email
        <input type="text" name="email">
        <br>
        Mật khẩu
        <input type="password" name="password">
        <br>
        <button>Đăng nhập</button>
        <br>
        Giữ tôi đăng nhập
        <input type="checkbox" name="remember">
    </form>
</body>
</html>