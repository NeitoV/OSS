<?php
class Product extends Db
{
    public function filterPage()

    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $url = $_GET['url'] ?? "product";

            if ($url == 'product') {
                echo "    <h1> Sản phẩm</h1>";
                echo "    <table class='table mt-3'>";
                echo "<thead>";
                echo "    <tr>";
                echo "        <th>ID</th>";
                echo "        <th>Tên sản phẩm</th>";
                echo "        <th>Giá</th>";
                echo "        <th>Số lượng</th>";
                echo "        <th>Loại</th>";
                echo "        <th>Xưởng</th>";
                echo "        <th>&nbsp;</th>";
                echo "         <th>&nbsp;</th>";
                echo "    </tr>";
                echo "</thead>";

                $tongSo1Trang = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
                $page = !empty($_GET['page']) ? $_GET['page'] : 1;
                $db = new Db();
                $sql = "SELECT COUNT(*) FROM product";
                $result = $db->select($sql)[0];
                $totalItem = $result['COUNT(*)'];
                $offSet = ($page - 1) * $tongSo1Trang;

                $sql_product = "SELECT product.id, product.name, product.stocks, product.price,
                categories.name as categories,
                manufacturer.name as manufacturer 
                FROM product 
                JOIN manufacturer on product.manufacturer_id = manufacturer.id
                JOIN categories on product.categories_id = categories.id
                order by id 
                limit " . $offSet . "," . $tongSo1Trang;
                $productList = $db->select($sql_product);

                echo "<tbody>";
                foreach ($productList as $product){
                    echo '<tr>';
                    echo '<td>' . $product['id'] . '</td>';
                    echo '<td>' . $product['name'] . '</td>';
                    echo '<td>' . number_format($product['price'], 0) . ' $</td>';
                    echo '<td>' . $product['stocks'] . '</td>';
                    echo '<td>' . $product['categories'] . '</td>';
                    echo '<td>' . $product['manufacturer'] . '</td>';
                    echo '<td><a href ="update_product.php?id=' . $product['id'] . '">Sửa</a><td>';
                    echo '<td><a href ="delete_product.php?id=' . $product['id'] . '">Xoá</a><td>';
                    echo '</tr>';
                }
                echo "</tbody>";
                echo "</table>";
                echo "<div>";

                $tongSoTrang = ceil($totalItem / $tongSo1Trang);

                // First page
                if($tongSoTrang != 1){
                if ($page) {
                    $first_page = 1;
                    echo "<a class = 'page-item num-page' href='index.php?url=" . $url . "&per_page=" . $tongSo1Trang . "&page=" . $first_page . "'>  First  </a> ";
                }

                //pages

                for ($i = 1; $i <= $tongSoTrang; $i++) {
                    if ($i != $page) {
                        if ($i > $page - 2 && $i < $page + 2) {
                            echo "<a class = 'page-item num-page' href='index.php?url=" . $url . "&per_page=" . $tongSo1Trang . "&page=" . $i . "'>" . $i . "</a> ";
                        }
                    } else {
                        echo "<strong class ='current-page page-item btn'>$i </strong>";
                    }
                }

                //Last Page
                if ($page == $tongSoTrang - $page) {
                    $last_page = $tongSoTrang;
                    echo "<a class = 'page-item num-page' href='index.php?url=" . $url . "&per_page=" . $tongSo1Trang . "&page=" . $last_page . "'>  Last  </a> ";
                }}
                echo "</div>";
            }

        }
    }
}
