<?php
class Product extends Db
{
   
    public function getRand()
    {
        $sql = "select * from product order by rand() limit 0,8";
        $products = $this->select($sql);

        foreach ($products as $product) {
            echo '<div class="col mb-5">';
            echo '<div class="card h-100">';
            echo '<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>';
            echo '<img class="card-img-top" src=img/' . $product['image'] . ' alt="..." width = "350px" height = "120px"/>';
            echo '<div class="card-body p-4">';
            echo '<div class="text-center">';
            echo '<h5 class="fw-bolder">' . $product['name'] . '</h5>';
            echo '<div class="d-flex justify-content-center small text-warning mb-2">';

            for ($i = 0; $i < $product['review']; $i++) {
                echo '<div class="bi-star-fill"></div>';
            }

            echo '</div>';
            echo '<span class="text-muted text-decoration-line-through">$' . number_format($product['price'] + 300, 2) . '</span>';
            echo '$' . number_format($product['price'], 2);
            echo '</div>';
            echo '</div>';
            echo '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <form action="index.php" method="GET">
                <input type="hidden" name="product_id" value="' . $product['id'] . '"> 
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-dark mt-auto" name="add_to_cart">Add to cart</button>
                </div>
            </form>
        </div>';
            echo '</div>';
            echo '</div>';
        }

    }
}
?>