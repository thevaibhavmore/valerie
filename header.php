<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon/1.png" type="image/x-icon">
    <title>Valerie Vuitton</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Philosopher:400,700" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/css/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="assets/css/color1.css" media="screen" id="color">

    <!--font awesomel-->
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        #welcomeBanner {
            /*display:none;*/
            position: fixed;
            top: 0;
            z-index: 111;
            background-image: url("assets/images/christmas/bg.jpg");
            background-size: cover;
            left: 0px;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

        .box {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box img {
            /*width: 100%;*/
            max-width: 50vw;
            height: auto;
        }

        #welcomeBanner .welcome--btn {
            /*background-color: #fbd6d5;*/
            /*color: #dbba51;*/
            /*border-color:#dbba51;*/
        }
    </style>

</head>

<body class="christmas "
      style="background-image:url('assets/images/christmas/bg.jpg');background-size:cover;background-repeat:none;">
<!-- pre-loader start -->
<div id="preloader"></div>
<!-- pre-loader end -->


<!-- header start -->
<header class="header-christmas">
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header-contact">
                        <ul>
                            <!--<li>Welcome to Our store Multikart</li>-->
                            <li><i class="fa fa-envelope" aria-hidden="true"></i>Email Us: info@valerievuitton.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 text-right">
                    <ul class="header-dropdown">
                        <li class="mobile-wishlist"><a href="#" title="wishlist"><i class="fa fa-heart"
                                                                                    aria-hidden="true"></i></a>
                        </li>
                        <li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i>
                            My Account
                            <ul class="onhover-show-div">
                                <li><a href="#" data-lng="en">Login</a></li>
                                <li><a href="#" data-lng="es">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <!--                        <div class="menu-left">
                                                <div class="brand-logo">
                                                    <a href="index.php"> <img src="assets/images/icon/logo/f5.png"
                                                            class="img-fluid blur-up lazyload" alt=""></a>
                                                </div>
                                            </div>-->
                    <div style="margin: 0 auto;">
                        <nav id="main-nav">
                            <div class="toggle-nav">
                                <i class="fa fa-bars sidebar-bar"></i>
                            </div>
                            <!-- Horizontal menu -->
                            <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                <li>
                                    <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2"
                                                                               aria-hidden="true"></i></div>
                                </li>
                                <li class="menu-itm">
                                    <a data-heading="home" href="index.php"><?php echo utf8_encode('�ber Mich'); ?></a>

                                </li>
                                <li class="menu-itm">
                                    <a data-heading="gallery" href="javascript:;"><?php echo utf8_encode('Photo Gallery'); ?></a>

                                </li>
                                <li class="menu-itm">
                                    <a data-heading="category" href="javascript:;"><?php echo utf8_encode('Shop'); ?></a>

                                </li>


                                <li class="menu-img">
                                    <a data-heading="" href="index.php"> <img src="assets/images/icon/logo/f5.png"
                                                              class="img-fluid blur-up lazyload" alt=""></a>
                                </li>

                                <li class="menu-itm">
                                    <a data-heading="footer_banner" href="javascript:;"><?php echo utf8_encode('Aktionen'); ?></a>

                                </li>

                                <li class="menu-itm">
                                    <a data-heading="form" href="javascript:;"><?php echo utf8_encode('Buch Mich'); ?></a>

                                </li>

                                <li class="menu-itm">
                                    <a data-heading="footer" href="javascript:;"><?php echo utf8_encode('Kontakt'); ?></a>

                                </li>


                            </ul>
                        </nav>
                    </div>
                    <!--                       <div class="menu-right pull-right">
                                                <div>
                                                    <div class="icon-nav">
                                                        <ul>


                                                            <li class="onhover-div mobile-cart">
                                                                <div><img src="assets/images/icon/shopping-cart.png"  class="img-fluid blur-up lazyload" alt="">
                                                                       <i class="fa fa-shopping-cart"></i>
                                                                </div>
                                                                <ul class="show-div shopping-cart">
                                                                    <li>
                                                                        <div class="media">
                                                                            <a href="#"><img alt="" class="mr-3"  src="assets/images/fashion/product/1.jpg"></a>
                                                                            <div class="media-body">
                                                                                <a href="#">
                                                                                    <h4>item name</h4>
                                                                                </a>
                                                                                <h4><span>1 x $ 299.00</span></h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="close-circle">
                                                                            <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="media">
                                                                            <a href="#"><img alt="" class="mr-3"
                                                                                    src="assets/images/fashion/product/2.jpg"></a>
                                                                            <div class="media-body">
                                                                                <a href="#">
                                                                                    <h4>item name</h4>
                                                                                </a>
                                                                                <h4><span>1 x $ 299.00</span></h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="close-circle">
                                                                            <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="total">
                                                                            <h5>subtotal : <span>$299.00</span></h5>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="buttons">
                                                                            <a href="javascript:;" class="view-cart">view cart</a>
                                                                            <a href="javascript:;" class="checkout">checkout</a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>-->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->