<?php  
session_start();
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];
$password = $_POST['password'];

require_once './connect.php';
$sql = "select count(*) from customers
where email = '$email'";
$result = mysqli_query($connect, $sql);
$numberRows = mysqli_fetch_array($result) ['count(*)'];
if ($numberRows == 1) {
    $_SESSION['error'] = "Email này đã có tài khoản";
    header('location:signup.php');
    exit;
}
$sql = "insert into customers (name, birthday, email, phoneNumber, address, password) values
('$name', '$birthday', '$email', '$phoneNumber', '$address', '$password')";
mysqli_query($connect, $sql);
header('location:index.php');
$sql = "select id from customers where email = '$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result) ['id'];
$_SESSION['id'] = $id; 
$_SESSION['name'] = $name; 
mysqli_close($connect);
