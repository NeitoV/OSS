<?php
require "config/config.php";
require ROOT . "/include/function.php";
spl_autoload_register("loadClass");
session_start();
$db = new Db();

if (isset($_GET)) {
    $orderId = $_GET['id'];

    if (isset($_SESSION["user"])) {
        $email = $_SESSION["user"];
        $sql = 'select * from orders join user on user.id = orders.user_id where user.email =:email and orders.id =:id';
        $arr = array(':email'=>$email, ':id' => $orderId);

        $result = $db->select($sql, $arr);
    
        if(empty($result)) {
            echo '<h1>Bạn không thể huỷ đơn hàng của người khác<h1>';
            echo '<a href="history.php">Nhấp vào đây để quay lại</a>';
            exit();
        }
        exit();
    }

    $sql = 'update orders set status = "cancel" where id =:id';
    $arr = array(':id' => $orderId);

    $result = $db->update($sql, $arr);

    echo '<h1>Huỷ đơn đặt hàng thành công</h1>';
    echo '<a href="history.php">Nhấp vào đây để quay lại</a>';
}

?>