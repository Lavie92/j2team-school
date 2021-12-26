<?php require_once './connect.php';
$id = $_GET['id'];
$sql = "select * from products where id = $id";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
?>
<div id="content">
    <h1><?php echo $each ['name'] ?></h1>
    <img src="./admin/products/photos/<?php echo $each['photo'] ?>" height="200px">
    <p><?php echo '$'.$each['price'] ?></p>
    <p><?php echo $each['description'] ?></p>
</div>