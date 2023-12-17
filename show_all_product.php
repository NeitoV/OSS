<?php
require_once("config/config.php");
require_once(ROOT . "/include/function.php");
spl_autoload_register("loadClass");
session_start();

$obj = new Product();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full products</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/style1.css" rel="stylesheet" />

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#">Nguyễn Võ Tiến</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="show_all_product.php">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">Flash sale</a></li>
                        </ul>
                    </li>
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
                     
                                echo $count;
                                header("Location: show_all_product.php");
                            }
                        }
                        ?>
                    </span>
                </a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="d-md-flex align-items-md-center">
            <div class="h3">Future store</div>
            <div class="ml-auto d-flex align-items-center views"> <span class="btn text-success"> <span
                        class="fas fa-th px-md-2 px-1"></span><span>Grid view</span> </span> <span class="btn"> <span
                        class="fas fa-list-ul"></span><span class="px-md-2 px-1">List view</span> </span> <span
                    class="green-label px-md-2 px-1">428</span> <span class="text-muted">Products</span> </div>
        </div>
        <div class="d-lg-flex align-items-lg-center pt-2">
            <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2">
                <select name="manufacturer" id="country" class="bg-light" onchange="onSelectChanged()">
                    <option value="">Country</option>

                    <?php
                     $obj->getAllManufacturers();
                    ?>
                </select>
            </div>
        </div>
        <div class="filters"> <button class="btn btn-success" type="button" data-toggle="collapse"
                data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filter<span
                    class="px-1 fas fa-filter"></span></button> </div>
        <div id="mobile-filter">
            <div class="py-3">
                <h5 class="font-weight-bold">Categories</h5>
                <ul class="list-group">
                    <li
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                        vegetables <span class="badge badge-primary badge-pill">328</span> </li>
                    <li
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                        Fruits <span class="badge badge-primary badge-pill">112</span> </li>
                    <li
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                        Kitchen Accessories <span class="badge badge-primary badge-pill">32</span> </li>
                    <li
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                        Chefs Tips <span class="badge badge-primary badge-pill">48</span> </li>
                </ul>
            </div>

            <div class="py-3">
                <h5 class="font-weight-bold">Rating</h5>
                <form class="rating">
                    <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span
                                class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                class="fas fa-star"></span> <input type="checkbox"> <span class="check"></span> </label>
                    </div>
                    <div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span
                                class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span
                                class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span
                                class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span
                                class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                class="far fa-star px-1 text-muted"></span> <span
                                class="far fa-star px-1 text-muted"></span> <span
                                class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                class="check"></span> </label> </div>
                    <div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span
                                class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span
                                class="far fa-star px-1 text-muted"></span> <span
                                class="far fa-star px-1 text-muted"></span> <span
                                class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                class="check"></span> </label> </div>
                </form>
            </div>
        </div>
        <div class="content py-md-0 py-3">
            <section id="sidebar">
                <div class="py-3">
                    <h5 class="font-weight-bold">Categories</h5>
                    <ul class="list-group">
                        <?php
                        $obj->getAllCategories();
                        ?>
                    </ul>
                </div>

            </section> <!-- Products Section -->
            <section id="products">
                <div class="container py-3">
                    <div class="row" id="productContainer">
                        <?php
                        $totalPage = $obj->pagination();
                        ?>
                    </div>
                </div>
                <?php
                $manufacturer = isset($_GET['manufacturer']) ? $_GET['manufacturer'] : '';
                $category = isset($_GET['category']) ? $_GET['category'] : '';

                $queryParams = $_GET;
                unset($queryParams['page']); 
                
                echo '<nav aria-label="Page navigation example">
                      <ul class="pagination">';

                for ($i = 1; $i <= $totalPage; $i++) {
                    $queryParams['page'] = $i;
                    $queryString = http_build_query($queryParams);

                    echo '<li class="page-item"><a class="page-link" href="http://localhost/PHP_DoAn/shopping/show_all_product.php?' . $queryString . '">' . $i . '</a></li>';
                }

                echo '</ul>
                  </nav>';
                ?>

            </section>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
        function onSelectChanged() {
            var selectElement = document.getElementById('country');
            var manufacturerId = selectElement.value;

            var currentURL = window.location.href;
            var newURL = addToUrlParameter(currentURL, 'manufacturer', manufacturerId);

            window.location.href = newURL;
        }

        function handleTitleClick(event) {
            var clickedTitle = event.target;
            var categoryId = clickedTitle.dataset.category;

            var currentURL = window.location.href;
            var newURL = addToUrlParameter(currentURL, 'category', categoryId);

            window.location.href = newURL;


        }

        function addToUrlParameter(url, key, value) {
            var encodedValue = encodeURIComponent(value);
            var regex = new RegExp("([?&])" + key + "=[^&]*");

            if (regex.test(url)) {
                return url.replace(regex, '$1' + key + '=' + encodedValue);
            } else {
                var separator = url.includes('?') ? '&' : '?';
                return url + separator + key + '=' + encodedValue;
            }
        }
    </script>
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
</html>