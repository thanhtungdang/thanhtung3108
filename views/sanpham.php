<?php 
include_once('layouts/header.php');
include_once("views/assets/CSS/all.php");
?>
<!-- Link CSS Barca style -->
<link rel="stylesheet" href="views/assets/CSS/sanpham.css">

  <!-- <link rel="stylesheet" href="views/assets/CSS/barcatemplates.css">
  <link rel="stylesheet" href="views/assets/CSS/carousel.css"> -->



<section class="product-details spad">
    <div class="container">
        <div class="row">
            <?php 
            if (isset($product1) && is_array($product1) && count($product1) > 0) {
                foreach ($product1 as $item) { ?>
                <!-- Cột ảnh sản phẩm -->
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic thumB">
                        <img class="product__details__pic__item--large" 
                             src="admin/<?php echo isset($item['img']) ? $item['img'] : 'default.png'; ?>" 
                             alt="<?= htmlspecialchars($item['name']) ?>">
                    </div>
                </div>

                <!-- Cột thông tin sản phẩm -->
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?= htmlspecialchars($item['name']) ?></h3>
                        <div class="product__details__price"><?= number_format($item['price']) ?> VNĐ</div>
                        <p><?= $item['mota'] ?></p>

                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" value="1" min="1">
                                </div>
                            </div>
                        </div>

                        <a href="index.php?action=addtocart&idsp=<?= $item['id'] ?>" class="primary-btn">Add to Cart</a>
                        <!-- <a href="#" class="heart-icon"><i class="fa-regular fa-heart"></i></a> -->
                    </div>
                </div>
            <?php } 
            } else { ?>
                <div class="col-12">
                    <p class="no-product">Sản phẩm không tồn tại</p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include_once('layouts/footer.php'); ?>
