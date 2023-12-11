<?php
class Product extends Db
{
    public function filterPage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // var_dump($_GET['url']);exit;
            $url = $_GET['url'] ?? null;

            if ($url == 'product') {
                $db = new Db();
                $sql = "select * from product";
                $productList = $db->select($sql);
                echo "    <table class='table'>";
                echo "<thead>";
                echo "    <tr>";
                echo "        <th>ID</th>";
                echo "        <th>Name</th>";
                echo "        <th>Price</th>";
                echo "        <th>Stocks</th>";
                echo "        <th>&nbsp;</th>";
                echo "         <th>&nbsp;</th>";
                echo "    </tr>";
                echo "</thead>";
                foreach ($productList as $product) {
                    echo '<tr>';
                    echo '<td>' . $product['id'] . '</td>';
                    echo '<td>' . $product['name'] . '</td>';
                    echo '<td>' . number_format($product['price'], 0) . '</td>';
                    echo '<td>' . $product['stocks'] . '</td>';
                    echo '<td><a href ="update_product.php?id=' . $product['id'] . '">Sửa</a><td>';
                    echo '<td><a href ="delete_product.php?id=' . $product['id'] . '">Xoá</a><td>';
                    echo '</tr>';
                }
                echo "</table>";
            }

            if ($url == 'manufacturer') {
                $db = new Db();
                $sql = "SELECT * from manufacturer";
                $manufacturerList = $db->select($sql);
                echo "    <table class='table'>";
                echo "<thead>";
                echo "    <tr>";
                echo "        <th>ID</th>";
                echo "        <th>Name</th>";
                echo "        <th>&nbsp;</th>";
                echo "         <th>&nbsp;</th>";
                echo "    </tr>";
                echo "</thead>";
                foreach ($manufacturerList as $manufacturer) {
                    echo '<tr>';
                    echo '<td>' . $manufacturer['id'] . '</td>';
                    echo '<td>' . $manufacturer['name'] . '</td>';
                    echo '<td><a href ="update_manufacturer.php?id=' . $manufacturer['id'] . '">Sửa</a><td>';
                    echo '<td><a href ="delete_manufacturer.php?id=' . $manufacturer['id'] . '">Xoá</a><td>';
                    echo '</tr>';
                }
                echo "</table>";
            }


            if ($url == 'categories') {
                $db = new Db();
                $sql = "SELECT * from categories";
                $categoryList = $db->select($sql);
                echo "    <table class='table'>";
                echo "<thead>";
                echo "    <tr>";
                echo "        <th>ID</th>";
                echo "        <th>Name</th>";
                echo "        <th>&nbsp;</th>";
                echo "         <th>&nbsp;</th>";
                echo "    </tr>";
                echo "</thead>";
                foreach ($categoryList as $category) {
                    echo '<tr>';
                    echo '<td>' . $category['id'] . '</td>';
                    echo '<td>' . $category['name'] . '</td>';
                    echo '<td><a href ="update_category.php?id=' . $category['id'] . '">Sửa</a><td>';
                    echo '<td><a href ="delete_category.php?id=' . $category['id'] . '">Xoá</a><td>';
                    echo '</tr>';
                }
                echo "</table>";
            }

            if ($url == 'order') {
                $db = new Db();
                $sql = "SELECT * from orders";
                $orderList = $db->select($sql);
        
                echo "    <table class='table'>";
                echo "  <thead>";
                echo "    <tr>";
                echo "          <th>ID</th>";
                echo "          <th>Total</th>";
                echo "          <th>status</th>";
                echo "          <th>DELETE</th>";

                echo "    </tr>";
                echo "  </thead>";
                foreach ($orderList as $order) {
            
                    echo '<tr>';
                    echo '<td>' . $order['id'] . '</td>';
                    echo '<td>' . number_format($order['total'], 0) . '</td>';
                    echo '<td>' . $order['status'] . '</td>';
  
                    echo '<td><a href ="delete_order.php?id=' . $order['id'] . '">Xoá</a><td>';
                    echo '</tr>';
                }
                echo "</table>";
            }
        }
    }
}
?>