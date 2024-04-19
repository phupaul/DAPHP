<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Bán Nón</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="user/access/css/jquery.toast.css">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="assets/jquery.toast.js"></script>



    <style>
        header {
            background-image: url('./uploads/thumbail.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 300px;
        }

        .modal-open {
            overflow: hidden;
        }

        .modal-backdrop {
            opacity: 0.5;
        }

        .product-detail {
            display: none;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .product:hover .product-detail {
            display: block;
            opacity: 1;
        }
    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Helmet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>

                        </ul>
                    </li>
                </ul>
                <form class="d-flex" id="cart-btn">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Giỏ hàng
                        <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                    </button>
                </form>
                <a class="btn btn-outline-dark" id="btn-login" href="user/login.html">Đăng nhập</a>
                <span class="say-hello" style="display: none;"></span>
            </div>
            <button class="btn btn-outline-dark" id="btn_logout" type="button" style="display: none;">
                <i class="bi-box-arrow-right me-1"></i> <!-- Biểu tượng đăng xuất -->
                Đăng xuất
            </button>

        </div>
        </div>
    </nav>
    </div>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Helmet</h1>
                <p class="lead fw-normal text-white-50 mb-0">An toàn & Phong cách cho bạn</p>
            </div>
        </div>
    </header>

    <!--Cart-->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Giỏ hàng của bạn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Nội dung giỏ hàng sẽ được thêm vào đây -->
                    <div id="cartContent" class="cartModel"></div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                include 'view/viewproduct.php';
                ?>

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white"> &copy; Nhóm 18</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/main.js"></script>
    <script type="text/javascript" src="user/sever.js"></script>
</body>

</html>