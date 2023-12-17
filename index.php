<?php
require "config/config.php";
require ROOT . "/include/function.php";
spl_autoload_register("loadClass");
session_start();

 $obj = new Product();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#">Nguyễn Võ Tiến</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="show_all_product.php">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="history.php">History shopping</a></li>
                            <li><a class="dropdown-item" href="#!">Flash sale</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Đăng xuất</a></li>
                </ul>
                <a href="cart.php" class="btn btn-outline-dark d-flex align-items-center text-decoration-none">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">
                        <?php
                               $count = isset($_SESSION['product_id']) ? count($_SESSION['product_id']) : 0;
                               echo $count;
                         if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            if (isset($_GET['add_to_cart'])) {
                                header("Location: index.php");
                            }
                        }
                        ?>
                    </span>
                </a>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">A place where they are born equal.</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $obj->getRand();
                ?>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['add_to_cart'])) {

        $product_id = $_GET['product_id'];

        if (isset($_SESSION)) {
            if (!isset($_SESSION['product_id'])) {
                $_SESSION['product_id'][] = $product_id;
            } else {
                if (!in_array($product_id, $_SESSION['product_id'])) {
                    $_SESSION['product_id'][] = $product_id;
                }
            }
        } else {
            $_SESSION['product_id'][] = $product_id;
        }

    }

}
?>
<?php
    // $db = new DB();
    //   $sql = 'INSERT INTO user (fullname, email, password, role_id) VALUES (:name, :email, :password, :roleId)';
    //   $arr = array(":name" => "admin", ":email" => "admin@gmail.com", ":password" => md5("123456"), ":roleId" => 1);
    //   $row = $db->insert($sql, $arr);

    //   if($row > 0) {
    //     echo 'tạo thành công';
    //   }
?> 

</html>