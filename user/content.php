<?php
if (isset($_SESSION['success'])) {
    echo ($_SESSION['success']);
    unset($_SESSION['success']);
} 
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
require_once './connect.php';
$sql = "select * from products";
$result = mysqli_query($connect, $sql);
?>
<div id="content">
    <?php foreach ($result as $each) { ?>
        <div class="product">
            <h1><?php echo $each['name'] ?></h1>
            <img src="./admin/products/photos/<?php echo $each['photo'] ?>" height="100px">
            <p><?php echo '$'.$each['price'] ?></p>
            <a href="productDetail.php?id=<?php echo $each['id'] ?>">Xem chi tiết</a>
            <br>
            <?php if(!empty($_SESSION['id'])) { ?>
            <a href="addToCart.php?id=<?php echo $each['id'] ?>">Thêm vào giỏ hàng</a>
            <?php } ?>
        </div>
    <?php } ?>
</div>