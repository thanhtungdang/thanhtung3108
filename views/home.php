<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLAUGRANA</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" href="views/assets/CSS/barcatemplates.css">
  <link rel="stylesheet" href="views/assets/CSS/carousel.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php 
include_once("layouts/header.php")
?>



<!--Main Banner-->
<div class="main_banner">
    <div class="container-fluid">
        <div class="row">
            <!--Cot trai-->
            <div class="col-lg-6">
                <div class="left_content">
                    <div class="thumB">
                        <img src="views/assets/images/anhmainkit.jpg">
                        <div class="inner_content">                    
                            <span>AWAY COLLECTION</span>
                            <h4>BACK IN STOCK</h4>
                            <div class="main_border_button">
                                <a href="#">PURCHASE NOW</a>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
 
            <!--Cot phai-->
            <div class="col-lg-6">  
                <div class="right_content">
                    <div class="row">
                        <!--ảnh đầu bên phải-->
                        
                        <!--cột 6-->
                        <div class="col-lg-6">
                            <div class="right_first_image">
                                <div class="thumB">
                                    <!--chu-->
                                    <div class="inner_content">
                                        <h4>KITS</h4>
                                        <span>Barcelona Full Kits Collection</span>
                                    </div>  
                                    <div class="hover_content">
                                        <div class="INNER">
                                            <h4>KITS</h4>
                                            <p>Home Kit, Away Kit, Third Kit, Old Season Kit, Retro Kit, , Others..</p>
                                            <div class="main_border_button">
                                                <a href="#">Discover More</a>   
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!--anh-->
                                    <img src="views/assets/images/anhao0.jpg">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="right_first_image">
                                <div class="thumB">
                                    <div class="inner_content">
                                        <h4>CHRISTMAS GUIDE</h4>
                                        <span>Your Ultimate Holiday Gift Guide</span>
                                    </div>
                                    <div class="hover_content">
                                        <div class="INNER">
                                            <h4>CHRISTMAS GUIDE</h4>
                                            <p>Xmas Gifts, Kits Gifts, Kids Gifts, Retro Gifts, Souvernirs Gifts, Others...</p>
                                            <div class="main_border_button">
                                                <a href="#">Discover More</a>   
                                            </div>
                                        </div>
                                    </div>
                                    <img src="views/assets/images/anhao1.jpg">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="right_first_image">
                                <div class="thumB">
                                    <div class="inner_content">
                                        <h4>GIFT AND ACCESORIES</h4>
                                        <span>Perfect Add-on For Every Culés</span>
                                    </div>
                                    <div class="hover_content">
                                        <div class="INNER">
                                            <h4>GIFT AND ACCESORIES</h4>
                                            <p>Backpacks And Bags, Headwear, Socks, Watches And Jewelry, Wallets.</p>
                                            <div class="main_border_button">
                                                <a href="#">Discover More</a>   
                                            </div>
                                        </div>    
                                    </div>
                                    <img src="views/assets/images/anhao2.jpg">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="right_first_image">
                                <div class="thumB">
                                    <div class="inner_content">
                                        <h4>TRAINING</h4>
                                        <span>Best Gear For Your Traing Session</span>
                                    </div>
                                    <div class="hover_content">
                                        <div class="INNER">
                                            <h4>TRAINING</h4>
                                            <p>Jacket, SwearShirt, T-shirts, Pants And Shorts, Tracksuits...</p>
                                            <div class="main_border_button">
                                                <a href="#">Discover More</a>   
                                            </div>
                                        </div>
                                    </div>
                                    <img src="views/assets/images/anhao3.jpg">
                                </div>
                            </div>
                        </div>

                    </div>    
                </div>
            </div>
        </div>
    </div>    
</div>

<!--KITS-->
<section class="section" id="kitsbanner">
    <div class="container-fluid position-relative p-0">
        <img src="views/assets/images/anhkitto.png" class="img-fluid w-100" alt="Banner">
        <div class="thumbbanner  position-absolute top-50 start-50 translate-middle">
            <div class="kit_title">
                <strong>KITS</strong>
            </div>
            <a href="kit.html">
                <div class="banner_border_button">
                SHOP NOW ->
                </div>
            </a>
        </div>
    </div>
</section>


<section class="section" id="kits">
   <div class="container-fluid">
    <div id="kitcarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="d-flex">
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit1.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit2.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit3.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit4.png" class="d-block w-100">
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="d-flex">
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit5.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit6.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit7.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit8.png" class="d-block w-100">
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="d-flex">
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit9.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit10.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit11.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhkit12.png" class="d-block w-100">
                    </div>
                </div>
            </div>

        </div>

        <!-- Nút điều hướng -->
        <button class="carousel-control-prev" type="button" data-bs-target="#kitcarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#kitcarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</div>
</section>


<!--CHRISTMAS GUIDE-->
<section class="section" id="xmasbanner">
    <div class="text-center mb-4">
            <h2 class="fw-bold">OTHERS COLLECTION</h2>
            <p class="text-light-emphasis">all the best neccessary items for the barca</p>
    </div>

    <div class="container-fluid">
        <div class="row g-3"> 
            <div class="col-lg-4 col-md-6">
                <div class="img_thumb">
                    <img src="views/assets/images/anhxmas4.png" class="img-fluid w-100">
                    <div class="img_text">KIT COLLECTION</div>
                </div>       
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="img_thumb">
                    <img src="views/assets/images/anhcollection2.png" class="img-fluid w-100">
                    <div class="img_text">ACCESSORYIES</div>
                </div>       
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="img_thumb">
                    <img src="views/assets/images/anhcollection1.png" class="img-fluid w-100">
                    <div class="img_text">SOUVERNIRS</div>
                </div>       
            </div>
        </div>
    </div>
</section>



<section class="section" id="xmas">
   <div class="container-fluid">
    <div id="xmascarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="d-flex">
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas1.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas2.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas3.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas4.png" class="d-block w-100">
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="d-flex">
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas5.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas6.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas7.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas8.png" class="d-block w-100">
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="d-flex">
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas9.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas10.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas11.png" class="d-block w-100">
                    </div>
                    <div class="col-3 px-1">
                        <img src="views/assets/images/anhxmas12.png" class="d-block w-100">
                    </div>
                </div>
            </div>

        </div>

        <!-- Nút điều hướng -->
        <button class="carousel-control-prev" type="button" data-bs-target="#xmascarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#xmascarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</div>
</section>

<?php 
include_once("layouts/footer.php")
?>

</body>
</html>
