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
        session_start();
        if(empty($_SESSION['cart'])) {
            $_SESSION['error'] = "Thêm sản phảm vào giỏ hàng để tiếp tục";
            header('location:index.php');
        }
        $cart = $_SESSION['cart'];
        $sum = 0;
    ?>
    <a href="./index.php">Trang chủ</a>
    <table border="1" width = "100%">
        <tr>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Xoá</th>
        </tr>
        <?php foreach ($cart as $id => $each) { ?>
                <tr>
                    <td>
                        <img src="./admin/products/photos/<?php echo $each['photo'] ?>" height="100px">
                    </td>
                    <td>
                        <?php echo $each['name'] ?>
                    </td>
                    <td>
                        <?php echo $each['price'] ?>
                    </td>
                    <td>
                        <a href="updateQuantityToCart.php?id=<?php echo $id ?>&type=decre"> - </a>
                        <?php echo $each['quantity'] ?>
                        <a href="updateQuantityToCart.php?id=<?php echo $id ?>&type=incre"> + </a>
                    </td>
                    <td>
                        <?php
                            $result = $each['quantity'] * $each['price'];
                            $sum += $result;
                            echo $result;
                        ?>
                    </td>
                    <td>
                        <a href="deleteFromCart.php?id=<?php echo $id ?>">Xoá</a>
                    </td>
                </tr>
        <?php } ?>
    </table>
    <h1>
        Tổng tiền hoá đơn: $<?php echo($sum) ?>
    </h1>
    <?php 
        $id = $_SESSION['id'];
        require_once './connect.php';
        $sql = "select * from customers 
        where id = '$id'";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
    ?>
    <form action="processCheckout.php" method="post">
        Tên người nhận
        <input type="text" name="nameReceiver" value="<?php echo $each['name'] ?>">
        <br>
        Số điện thoại 
        <input type="text" name="phoneNumberReceiver" value="<?php echo $each['phoneNumber'] ?>">
        <br>
        Địa chỉ
        <input type="text" name="addressReceiver" value="<?php echo $each['address'] ?>">
        <br>
        <button>Đặt hàng</button>
    </form>
</body>
</html>