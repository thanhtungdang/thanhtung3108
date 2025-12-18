<!DOCTYPE html>
<html lang="vi">
<head>
    <?php 
    include_once('layouts/header.php'); 
    include_once("views/assets/CSS/all.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLAUGRANA STORE | Official Style</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        :root {
            --fcb-dark-blue: #004d98;      /* Xanh Blau */
            --fcb-red: #a50044;            /* Đỏ Grana */
            --fcb-gold: #edbb00;           /* Vàng Gold */
            --fcb-navy-bg: #0a091e;        /* Xanh Navy siêu đậm */
            --fcb-card-navy: #181733;      /* Xanh Navy cho Card */
            --text-light: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--fcb-navy-bg);
            color: var(--text-light);
            margin: 0;
            padding: 0;
        }

        /* --- NEW HERO BANNER STYLE --- */
        .hero-banner {
            position: relative;
            width: 100%;
            height: 450px; 
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-bottom: 5px solid var(--fcb-gold);
        }

        .hero-bg-image {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: 1;
            background-image: url('views/assets/images/anhkitto.png'); 
            background-size: cover;
            background-position: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(to right, rgba(10, 9, 30, 0.85) 0%, rgba(10, 9, 30, 0.2) 100%);
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            text-align: left;
            width: 100%;
        }

        .hero-content span {
            color: var(--fcb-gold);
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 1.1rem;
            display: block;
            margin-bottom: 10px;
        }

        .hero-content h1 {
            font-weight: 900;
            font-size: 4rem;
            text-transform: uppercase;
            line-height: 1;
            margin-bottom: 25px;
            color: #fff;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }

        .hero-btn {
            background-color: var(--fcb-gold);
            color: var(--fcb-navy-bg);
            padding: 12px 35px;
            font-weight: 800;
            text-decoration: none;
            text-transform: uppercase;
            display: inline-block;
            transition: 0.3s;
        }

        .hero-btn:hover {
            background-color: #fff;
            transform: scale(1.05);
            color: var(--fcb-navy-bg);
        }

        /* --- SIDEBAR & PRODUCTS --- */
        .category-card {
            background: var(--fcb-card-navy);
            border-radius: 8px;
            overflow: hidden;
            border: none;
        }

        .category-header {
            background: var(--fcb-dark-blue);
            color: white;
            padding: 15px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .list-group-item {
            background: transparent !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
            padding: 12px 15px;
            transition: 0.3s;
        }

        .list-group-item a {
            color: #ccc;
            text-decoration: none;
            font-size: 0.9rem;
            display: block;
        }

        .list-group-item:hover {
            background: rgba(255, 255, 255, 0.05) !important;
        }

        .list-group-item:hover a {
            color: var(--fcb-gold);
            padding-left: 5px;
        }

        .section-title {
            border-left: 6px solid var(--fcb-red);
            padding-left: 20px;
            margin-bottom: 30px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #fff;
        }

        .product-card {
            border: none;
            transition: all 0.3s ease;
            position: relative;
            background: var(--fcb-card-navy);
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        }

        .image-container {
            position: relative;
            background-color: #fff;
            padding-bottom: 110%; 
            overflow: hidden;
        }

        .product-image {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            object-fit: contain;
            padding: 15px;
            transition: transform 0.5s ease;
        }

        .product-actions {
            position: absolute;
            bottom: -60px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 15px;
            background: linear-gradient(transparent, var(--fcb-card-navy));
            transition: 0.4s ease;
            opacity: 0;
        }

        .product-card:hover .product-actions {
            bottom: 0;
            opacity: 1;
        }

        .btn-action {
            width: 40px; height: 40px; border-radius: 50%;
            background: var(--fcb-dark-blue); color: white;
            display: flex; align-items: center; justify-content: center;
            text-decoration: none; transition: 0.3s;
        }

        .btn-action:hover {
            background: var(--fcb-red);
        }

        .product-info {
            padding: 15px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .category-label {
            font-size: 10px;
            color: var(--fcb-gold);
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .product-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-light);
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            height: 40px;
            overflow: hidden;
        }

        .product-price {
            font-size: 16px;
            font-weight: 800;
            color: var(--fcb-gold);
        }

        .btn-buy-now {
            width: 100%;
            background: transparent;
            color: white;
            border: 1px solid var(--fcb-gold);
            padding: 8px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 12px;
            transition: 0.3s;
            margin-top: 10px;
            text-decoration: none;
            display: block;
        }

        .btn-buy-now:hover {
            background: var(--fcb-gold);
            color: var(--fcb-navy-bg);
        }
    </style>
</head>
<body>

<?php include_once('layouts/header.php'); ?>

<div class="hero-banner">
    <div class="hero-bg-image"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content container">
        <div class="row">
            <div class="col-lg-8">
                <span>Mùa giải mới 2024/25</span>
                <h1>CULERS<br>COLLECTION</h1>
                <a href="index.php?action=shop" class="hero-btn shadow">Mua ngay</a>
            </div>
        </div>
    </div>
</div>

<main class="container my-5">
    <div class="row">
        <div class="col-lg-3 d-none d-lg-block">
            <div class="category-card shadow">
                <div class="category-header">
                    <i class="fa fa-bars me-2"></i> DANH MỤC
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($productsDanhMuc as $item) : ?>
                        <li class="list-group-item">
                            <a href="index.php?action=danhmuc&iddm=<?= $item['id'] ?>">
                                <i class="fa fa-chevron-right me-2" style="font-size: 10px;"></i>
                                <?= $item['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-lg-9 col-12">
            <h2 class="section-title">
                <?= isset($currentCategoryName) ? $currentCategoryName : "Sản phẩm mới nhất" ?>
            </h2>
            
            <div class="row g-4">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-6 col-md-4">
                            <div class="product-card shadow-sm">
                                <div class="image-container">
                                    <img src="admin/<?= !empty($product['img']) ? $product['img'] : 'default.png'; ?>" 
                                         alt="<?= $product['name']; ?>" 
                                         class="product-image">
                                    
                                    <div class="product-actions">
                                        <a href="index.php?action=sanpham&&id=<?= $product['id'] ?>" class="btn-action">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="index.php?action=addtocart&idsp=<?= $product['id']; ?>" class="btn-action">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="product-info">
                                    <div>
                                        <span class="category-label">FC Barcelona</span>
                                        <a href="index.php?action=sanpham&&id=<?= $product['id'] ?>" class="product-name">
                                            <?= $product['name']; ?>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="product-price">
                                            <?= number_format($product['price'], 0, ',', '.') ?> đ
                                        </div>
                                        <a href="index.php?action=addtocart&idsp=<?= $product['id']; ?>" class="btn btn-buy-now">
                                            Mua ngay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Không tìm thấy sản phẩm nào trong danh mục này.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php include_once('layouts/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>