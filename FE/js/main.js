// Hàm thêm sản phẩm vào giỏ hàng
function addToCart(productId) {
    $.ajax({
        url: "http://localhost/showproduct/FE/controllers/additemtocart.php",
        method: "POST",
        data: { product_id: productId },
        success: function (response) {
            alert(response);

        },
        error: function (xhr, status, error) {
            alert("Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng!");
        }
    });
}

function updateCartQuantity() {
    $.ajax({
        url: "http://localhost/showproduct/FE/controllers/getcart.php",
        method: "GET",
        success: function (response) {
            $(".badge").text(response);
        },
        error: function (xhr, status, error) {
            console.error("Error updating cart quantity:", error);
        }
    });
}

function showCartInfo() {
    $.ajax({
        url: "http://localhost/showproduct/FE/view/viewcart.php",
        method: "GET",
        success: function (response) {
            $("#cartContent").html(response);

            // Hiển thị modal
            $("#cartModal").modal("show");

        },
        error: function (xhr, status, error) {
            console.error("Error fetching cart info:", error);
            alert("Đã xảy ra lỗi khi tải thông tin giỏ hàng!");
        }
    });
}

function updateQuantity(productId, action, button) {
    $.ajax({
        url: 'http://localhost/showproduct/FE/controllers/updateCart.php',
        type: 'POST',
        data: {
            product_id: productId,
            action: action
        },
        success: function (response) {
            var data = JSON.parse(response);
            if (data.success) {
                $(button).parent().find('.quantity-display').text(data.newQuantity);
                $('.total-items').text(data.totalItems);
                $('.total-price').text(data.totalPrice);
            }
        }
    });
}



$(document).ready(function () {
    
    $(".add-to-cart-btn").click(function (e) {
        e.preventDefault();


        var productId = $(this).data("product-id");
        addToCart(productId);
        updateCartQuantity();
    });
    $("#cart-btn").submit(function (e) {
        e.preventDefault();

        showCartInfo();
    });
    $('.quantity-update').click(function() {
        console.log("click")
        var productId = $(this).data('id');
        var action = $(this).data('action');
    
        updateQuantity(productId, action, $(this));
    });
    


});
