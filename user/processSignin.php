<?php 
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
if (isset($_POST['remember'])) {
    $remember = true;
}
else {
    $remember = false;
}

require_once './connect.php';
$sql = "select * from customers
where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
$numberRows = mysqli_num_rows($result);
if ($numberRows == 1) {
    echo ("Đăng nhập thành công");
    session_start();
    $each = mysqli_fetch_array($result);
    $_SESSION['id'] = $each['id'];
    $_SESSION['name'] = $each['name'];
    if ($remember) {
        $token = uniqid('user_', true);
        $sql = "update customers
                set token = '$token' 
                where id = '$id'";
        setcookie('remember', $token, time() + 60 * 60 * 24 * 30); 
    }
    header('location:user.php');
    exit;
}
else {
    $_SESSION['error'] = "Thông tin đăng nhập không chính xác";
}
mysqli_close($connect);
header('location:signin.php');