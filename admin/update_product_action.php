<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create-product"])) {

$productName = $_POST["name"] ?? '';
$productPrice = $_POST["price"] ?? '';
$productStocks = $_POST["stocks"] ?? '';
// $productImage = $_FILES["image"] ?? null;
$manufacturer = $_POST["manufacturer"] ?? '';
$category = $_POST["categories"] ?? '';
$description = $_POST["description"] ?? '';
$id = $_POST['id'] ?? 0;

$currentDirectory = __DIR__;
$parentDirectory = dirname($currentDirectory);

// $targetDir = $parentDirectory . '/img/';
// $targetPath = $targetDir . basename($productImage['name']);

// if (!move_uploaded_file($productImage["tmp_name"], $targetPath)) {
//     echo "Có lỗi xảy ra khi lưu trữ file. Xin hãy thử lại";
// } else {
    
    require "config/config.php";
    require ROOT . "/include/function.php";
    spl_autoload_register("loadClass");
    $db = new Db();

    $sql = 'select count(*) from product where name=:name';
    $arr = array(":name"=>$productName);
    $result = $db->select($sql, $arr)[0];

    if($result['count(*)'] > 1) {
        echo '<h1>Tên Sản phẩm đã tồn tại, vui lòng sửa tên sản phẩm khác</h1>';
        echo '<a href="index.php">Nhấp vào đây để về lại trang chủ</a>';
        exit();
    }
    
    $sql = "update product set name = :name, price = :price, stocks = :stocks, manufacturer_id = :manufacturer_id,
     categories_id = :categories_id, description = :description
    where id=:id";
    
    $arr = array(":name"=>$productName, ":price"=>$productPrice, ":stocks"=>$productStocks
    ,":manufacturer_id"=>$manufacturer, ":categories_id"=>$category, ":description"=>$description, ":id"=>$id);
    
    $result = $db->update($sql, $arr);
    
    if($result > 0) {
        echo "<h1>Sửa thành công</h1>";
    }
    else {
        echo '<h1>Sửa sản phẩm thất bại, xin hãy thử lại</h1>';
    }
}
echo '<a href="index.php">Nhấp vào đây để về lại trang chủ</a>';



// }

?>