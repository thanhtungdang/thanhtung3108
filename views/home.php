<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include_once("views/assets/CSS/all.php");
    ?>
</head>
<body>

<div class="main_banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left_content">
                    <div class="thumB">
                        <img src="views/assets/images/anhmainkit.jpg">
                        <div class="inner_content">                    
                            <span>AWAY COLLECTION</span>
                            <h4>BACK IN STOCK</h4>
                            <div class="main_border_button">
                                <a href="index.php?action=shop">PURCHASE NOW</a>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
 
            <div class="col-lg-6">  
                <div class="right_content">
                    <div class="row">
                        <?php 
                        // Lấy tối đa 4 danh mục đầu tiên để đổ vào 4 ô bên phải
                        $count = 0;
                        foreach ($productsDanhMuc as $dm): 
                            if($count >= 4) break; 
                        ?>
                        <div class="col-lg-6">
                            <div class="right_first_image">
                                <div class="thumB">
                                    <div class="inner_content">
                                        <h4><?= strtoupper($dm['name']) ?></h4>
                                        <span>Official Barca <?= $dm['name'] ?></span>
                                    </div>  
                                    <div class="hover_content">
                                        <div class="INNER">
                                            <h4><?= strtoupper($dm['name']) ?></h4>
                                            <p>Explore our exclusive collection of <?= $dm['name'] ?> and more.</p>
                                            <div class="main_border_button">
                                                <a href="index.php?action=danhmuc&iddm=<?= $dm['id'] ?>">Discover More</a>   
                                            </div>
                                        </div>
                                    </div>
                                    <img src="views/assets/images/anhao<?= $count ?>.jpg">
                                </div>
                            </div>
                        </div>
                        <?php 
                        $count++;
                        endforeach; ?>
                    </div>    
                </div>
            </div>
        </div>
    </div>    
</div>

<section class="section" id="kitsbanner">
    <div class="container-fluid position-relative p-0">
        <img src="views/assets/images/anhkitto.png" class="img-fluid w-100" alt="Banner">
        <div class="thumbbanner position-absolute top-50 start-50 translate-middle">
            <div class="kit_title">
                <strong>KITS</strong>
            </div>
            <a href="index.php?action=shop">
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
            <?php 
            // Chia mảng sản phẩm thành từng nhóm 4 sản phẩm cho mỗi slide
            $productChunks = array_chunk($products, 4);
            foreach ($productChunks as $index => $chunk): 
            ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <div class="d-flex">
                    <?php foreach ($chunk as $product): ?>
                    <div class="col-3 px-1">
                        <a href="index.php?action=sanpham&id=<?= $product['id'] ?>">
                            <img src="admin/<?= $product['img'] ?>" class="d-block w-100" title="<?= $product['name'] ?>">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#kitcarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#kitcarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>
</section>

<section class="section" id="xmasbanner">
    <div class="text-center mb-4">
            <h2 class="fw-bold">EXPLORE COLLECTIONS</h2>
            <p class="text-light-emphasis">Find all the best necessary items for a true Blaugrana</p>
    </div>

    <!-- <div class="container-fluid">
        <div class="row g-3"> 
            <?php 
            // Đổ 3 danh mục tiếp theo (ví dụ từ danh mục thứ 5 trở đi)
            $otherCats = array_slice($productsDanhMuc, 4, 3);
            foreach ($otherCats as $index => $dm): 
            ?>
            <div class="col-lg-4 col-md-6">
                <a href="index.php?action=danhmuc&iddm=<?= $dm['id'] ?>" class="text-decoration-none">
                    <div class="img_thumb">
                        <img src="views/assets/images/anhcollection<?= $index+1 ?>.png" class="img-fluid w-100">
                        <div class="img_text"><?= strtoupper($dm['name']) ?></div>
                    </div>       
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div> -->
</section>

</body>
</html>