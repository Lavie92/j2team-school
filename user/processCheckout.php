<?php 
session_start();
$customerId = $_SESSION['id'];
$nameReceiver = $_POST['nameReceiver']; 
$phoneNumberReceiver = $_POST['phoneNumberReceiver']; 
$addressReceiver = $_POST['addressReceiver']; 
$status = 0;// Mới đặt
require_once './connect.php';
$cart = $_SESSION['cart'];
$totalPrice = 0;
foreach ($cart as $each) {
    $totalPrice += $each['quantity'] * $each['price'];
}
$sql = "insert into orders (customerId, nameReceiver, phoneNumberReceiver, addressReceiver, status, totalPrice) values 
('$customerId', '$nameReceiver', '$phoneNumberReceiver', '$addressReceiver', '$status', '$totalPrice')";
mysqli_query($connect, $sql);
