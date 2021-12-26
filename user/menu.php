<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="menu">
        <ul>
            <li>
                <a href="./index.php">Trang chủ</a>
            </li>
            <li>
                <a href="./viewCart.php">Giỏ hàng</a>
            </li>
            <?php if(empty($_SESSION['id'])) { ?>
                <li>
                    <a href="./signin.php">Đăng nhập</a>
                </li>
                <li>
                    <a href="./signup.php">Đăng ký</a>
                </li>
             <?php } else {?>
                <?php echo "Chào " . $_SESSION['name'] ?>
                <li>
                    <a href="./signout.php">Đăng xuất</a>
                </li>
            <?php }?>

        </ul>
    </div>
</body>

</html>