<?php
include_once ('./config/dbconnect.php');
$sql = "SELECT * FROM product, category WHERE product.category_id=category.category_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col mb-5 product">
            <div class="card h-100">
                <img class="card-img-top" src="<?= htmlspecialchars($row["product_image"]) ?>" alt="..." />
                <div class="card-body p-4">
                    <div class="text-center">
                        <h5 class="fw-bolder"><?= htmlspecialchars($row["product_name"]) ?></h5>
                        <?= htmlspecialchars($row["price"]) ?>$
                    </div>
                    <div class="product-detail card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                    <!-- Thêm các thông tin chi tiết sản phẩm vào đây -->
                    <h5 class="fw-bolder"><?= htmlspecialchars($row["product_name"]) ?></h5>
                    <p class="fw-normal"><?= htmlspecialchars($row["product_desc"]) ?></p>
                    <p class="fw-bold"><?= htmlspecialchars($row["price"]) ?>$</p>
                </div>
            </div>
                </div>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart-btn" href="#"
                            data-product-id='<?= $row["product_id"] ?>'>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            
        </div>
        < <?php
    }
}

?>