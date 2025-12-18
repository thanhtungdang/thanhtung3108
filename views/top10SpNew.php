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
            --fcb-dark-blue: #004d98;
            --fcb-red: #a50044;
            --fcb-gold: #edbb00;
            --fcb-navy-bg: #0a091e;
            --fcb-card-navy: #181733;
            --text-light: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--fcb-navy-bg);
            color: var(--text-light);
            margin: 0; padding: 0;
        }

        /* --- SỬA LẠI BANNER TẠI ĐÂY --- */
        .hero-banner {
            position: relative;
            width: 100%;
            height: 500px; /* Tăng chiều cao để banner hoành tráng hơn */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-bottom: 5px solid var(--fcb-gold);
        }

        /* Ảnh nền banner */
        .hero-bg-image {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: 1;
            /* Bạn có thể thay đổi URL ảnh dưới đây */
            background-image: url('views/assets/images/anhkitto.png'); 
            background-size: cover;
            background-position: center;
        }

        /* Lớp phủ màu tối để làm nổi bật chữ */
        .hero-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(to right, rgba(10, 9, 30, 0.8) 0%, rgba(10, 9, 30, 0.2) 100%);
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            text-align: left; /* Căn trái giống trang chủ Barca */
            width: 80%;
        }

        .hero-content span {
            color: var(--fcb-gold);
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 1.2rem;
            display: block;
            margin-bottom: 10px;
        }

        .hero-content h1 {
            font-weight: 900;
            font-size: 4.5rem;
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
            border-radius: 0;
            transition: 0.3s;
            display: inline-block;
        }

        .hero-btn:hover {
            background-color: #fff;
            color: var(--fcb-navy-bg);
            transform: scale(1.05);
        }

        /* --- KẾT THÚC PHẦN SỬA BANNER --- */

        /* Sidebar & Card giữ nguyên phong cách cũ của bạn */
        .category-card { background: var(--fcb-card-navy); border-radius: 8px; border: none; }
        .category-header { background: var(--fcb-dark-blue); color: white; padding: 15px; font-weight: 700; text-transform: uppercase; }
        .list-group-item { background: transparent; border-color: rgba(255, 255, 255, 0.1); padding: 12px 15px; }
        .list-group-item a { color: #ccc; text-decoration: none; display: block; }
        .list-group-item:hover a { color: var(--fcb-gold); padding-left: 5px; }
        
        .section-title { border-left: 6px solid var(--fcb-red); padding-left: 20px; margin-bottom: 30px; font-weight: 800; text-transform: uppercase; }

        .product-card { border: none; transition: 0.3s; background: var(--fcb-card-navy); border-radius: 8px; overflow: hidden; height: 100%; }
        .product-card:hover { transform: translateY(-8px); box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        .image-container { position: relative; background-color: #fff; padding-bottom: 110%; }
        .product-image { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 15px; }
        
        .product-actions { position: absolute; bottom: -60px; left: 0; width: 100%; display: flex; justify-content: center; gap: 10px; padding: 15px; background: linear-gradient(transparent, var(--fcb-card-navy)); transition: 0.4s ease; opacity: 0; }
        .product-card:hover .product-actions { bottom: 0; opacity: 1; }
        .btn-action { width: 40px; height: 40px; border-radius: 50%; background: var(--fcb-dark-blue); color: white; display: flex; align-items: center; justify-content: center; text-decoration: none; }
        .btn-action:hover { background: var(--fcb-red); }

        .product-info { padding: 15px; text-align: center; }
        .category-label { font-size: 10px; color: var(--fcb-gold); font-weight: 700; text-transform: uppercase; }
        .product-name { font-size: 14px; font-weight: 600; color: var(--text-light); text-decoration: none; height: 40px; overflow: hidden; display: block; }
        .product-price { font-size: 16px; font-weight: 800; color: var(--fcb-gold); }
        .btn-buy-now { width: 100%; background: transparent; color: white; border: 1px solid var(--fcb-gold); padding: 8px; font-weight: 700; text-transform: uppercase; margin-top: 10px; display: block; text-decoration: none;}
        .btn-buy-now:hover { background: var(--fcb-gold); color: var(--fcb-navy-bg); }
</style>
</head>
<body>

<?php include_once('layouts/header.php'); ?>

<div class="hero-banner">
    <div class="hero-bg-image"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content container">
        <span>Mùa giải 2024/25</span>
        <h1>CULERS<br>COLLECTION</h1>
        <a href="index.php?action=shop" class="hero-btn">Khám phá ngay</a>
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
            <h2 class="section-title">Top 10 sản phẩm mới nhất</h2>
            
            <div class="row g-4">
                <?php foreach ($top10New as $item): ?>
                    <div class="col-6 col-md-4">
                        <div class="product-card shadow-sm">
                            <div class="image-container">
                                <img src="admin/<?= !empty($item['img']) ? $item['img'] : 'default.png'; ?>" 
                                     alt="<?= $item['name']; ?>" 
                                     class="product-image">
                                
                                <div class="product-actions">
                                    <a href="index.php?action=sanpham&&id=<?= $item['id'] ?>" class="btn-action">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="index.php?action=addtocart&idsp=<?= $item['id']; ?>" class="btn-action">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product-info">
                                <span class="category-label">FC Barcelona</span>
                                <a href="index.php?action=sanpham&&id=<?= $item['id'] ?>" class="product-name">
                                    <?= $item['name']; ?>
                                </a>
                                <div class="product-price">
                                    <?= number_format($item['price'], 0, ',', '.') ?> đ
                                </div>
                                <a href="index.php?action=addtocart&idsp=<?= $item['id']; ?>" class="btn btn-buy-now">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php include_once('layouts/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>