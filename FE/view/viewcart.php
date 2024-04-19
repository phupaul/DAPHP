<?php
session_start();

include '../config/dbconnect.php';

if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
    foreach ($_SESSION["cart"] as $product_id => $quantity) {

        $stmt = $conn->prepare("SELECT * FROM product WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="<?= htmlspecialchars($row["product_image"]) ?>"></div>
                        <div class="col">
                            <div class="row text-muted"><?= htmlspecialchars($row["product_name"]) ?></div>

                        </div>
                        <div class="col">
                            <button class="quantity-update" data-id="<?= $product_id ?>" data-action="remove"
                                onclick="updateQuantity(<?= $product_id ?>, 'remove', this)">-</button>
                            <span class="quantity-display"><?= $quantity ?></span>
                            <button class="quantity-update" data-id="<?= $product_id ?>" data-action="add"
                                onclick="updateQuantity(<?= $product_id ?>, 'add', this)">+</button>

                        </div>
                        <div class="col"> <?= htmlspecialchars($row["price"]) * $quantity ?>$ <span class="close">&#10005;</span></div>
                    </div>
                </div>
                <?php
            }
        }
        $stmt->close();
    }
} else {
    echo "<p>Giỏ hàng của bạn đang trống.</p>";
}
?>
<div class="back-to-shop"><a href="./index.php">&leftarrow;</a><span class="text-muted">Back to shop</span></div>

</div>
<div class="col-md-4 summary">
    <div>
    </div>
    <hr>
    <div class="row">
        <div class="col" style="padding-left:0;">ITEMS</div>
        <div class="col text-right total-items"> </div>
    </div>
    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
        <div class="col">TOTAL PRICE</div>
        <div class="col text-right total-price"> $</div>
    </div>
    <button class="btn btn-primary">Thanh Toán</button>
</div>
</div>
</div>