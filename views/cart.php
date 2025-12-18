<?php 
include_once('layouts/header.php'); 
include_once("views/assets/CSS/all.php");
?>

<style>
    :root {
        --fcb-navy: #181733;
        --fcb-red: #a50044;
        --fcb-gold: #edbb00;
        --fcb-light-gray: #f8f9fa;
        --fcb-text: #181733;
    }

    body {
        background-color: #fcfcfc;
        font-family: 'Inter', -apple-system, sans-serif;
        color: var(--fcb-text);
    }

    .shoping-cart { padding: 60px 0; }

    /* Breadcrumb đơn giản */
    .cart-title {
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 30px;
        border-left: 6px solid var(--fcb-red);
        padding-left: 15px;
        color: var(--fcb-navy);
    }

    /* Bảng giỏ hàng */
    .shoping__cart__table {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        overflow: hidden;
    }

    .shoping__cart__table table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: collapse;
    }

    .shoping__cart__table thead {
        background-color: var(--fcb-navy);
    }

    .shoping__cart__table th {
        color: #fff;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 1px;
        padding: 20px;
        font-weight: 700;
        border: none;
    }

    .shoping__cart__table td {
        padding: 25px 20px;
        vertical-align: middle;
        border-bottom: 1px solid #f0f0f0;
    }

    /* Ảnh sản phẩm */
    .cart-img-wrap {
        width: 90px;
        height: 90px;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .cart-img-wrap img {
        max-width: 85%;
        max-height: 85%;
        object-fit: contain;
    }

    /* Số lượng sản phẩm (+ / -) */
    .quantity-controls {
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--fcb-light-gray);
        border-radius: 30px;
        width: fit-content;
        margin: 0 auto;
        padding: 4px;
        border: 1px solid #e0e0e0;
    }

    .qty-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fff;
        color: var(--fcb-navy);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        text-decoration: none;
        transition: 0.3s;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .qty-btn:hover {
        background: var(--fcb-navy);
        color: #fff;
    }

    .qty-input {
        width: 45px;
        border: none;
        background: transparent;
        text-align: center;
        font-weight: 800;
        color: var(--fcb-navy);
        font-size: 15px;
    }

    /* Giá tiền */
    .price-old { text-decoration: line-through; color: #999; font-size: 13px; }
    .price-main { font-weight: 700; color: var(--fcb-navy); }
    .price-total { font-weight: 800; color: var(--fcb-red); font-size: 16px; }

    /* Sidebar Thanh toán */
    .shoping__checkout {
        background: var(--fcb-navy);
        padding: 35px;
        border-radius: 12px;
        color: #fff;
        position: sticky;
        top: 20px;
    }

    .shoping__checkout h5 {
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 25px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        padding-bottom: 15px;
    }

    .checkout__total li {
        list-style: none;
        display: flex;
        justify-content: space-between;
        font-size: 18px;
        margin-bottom: 15px;
    }

    .checkout__total li span {
        color: var(--fcb-gold);
        font-weight: 800;
        font-size: 22px;
    }

    .primary-btn {
        display: block;
        width: 100%;
        background: var(--fcb-gold);
        color: var(--fcb-navy);
        text-align: center;
        padding: 16px;
        font-weight: 800;
        text-transform: uppercase;
        text-decoration: none;
        border-radius: 6px;
        transition: 0.3s;
        letter-spacing: 1px;
    }

    .primary-btn:hover {
        background: #fff;
        transform: translateY(-3px);
    }

    /* Nút xóa */
    .btn-remove {
        color: #ccc;
        font-size: 18px;
        transition: 0.3s;
    }

    .btn-remove:hover {
        color: var(--fcb-red);
        transform: scale(1.2);
    }
</style>

<section class="shoping-cart spad">
    <div class="container">
        <h2 class="cart-title">Giỏ hàng của bạn</h2>
        <div class="row">
            <div class="col-lg-8">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($_SESSION['cart'])): ?>
                                <?php foreach ($_SESSION['cart'] as $item): ?>
                                    <tr>
                                        <td style="width: 100px;">
                                            <div class="cart-img-wrap">
                                                <img src="admin/<?= $item['img']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="text-start">
                                            <h6 class="fw-bold mb-1"><?= $item['name'] ?></h6>
                                            <small class="text-muted">Mã SP: #<?= $item['idsp'] ?></small>
                                        </td>
                                        <td class="price-main">
                                            <?= number_format($item['price']); ?>đ
                                        </td>
                                        <td>
                                            <div class="quantity-controls">
                                                <a href="index.php?action=updatecart&idsp=<?= $item['idsp']; ?>&type=decrease" class="qty-btn">-</a>
                                                <input type="text" class="qty-input" value="<?= $item['soLuong']; ?>" readonly>
                                                <a href="index.php?action=updatecart&idsp=<?= $item['idsp']; ?>&type=increase" class="qty-btn">+</a>
                                            </div>
                                        </td>
                                        <td class="price-total">
                                            <?= number_format($item['price'] * $item['soLuong']) ?>đ
                                        </td>
                                        <td>
                                            <a href="index.php?action=deletecart&idsp=<?= $item['idsp']; ?>" 
                                               onclick="return confirm('Bạn có muốn xoá sản phẩm này?')" 
                                               class="btn-remove">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <p class="mb-4">Giỏ hàng đang trống</p>
                                        <a href="index.php" class="btn btn-navy text-white" style="background: var(--fcb-navy)">Mua sắm ngay</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <a href="index.php" class="text-decoration-none text-dark fw-bold">
                        <i class="fa fa-long-arrow-left me-2"></i> Tiếp tục mua sắm
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="shoping__checkout">
                    <h5>Tóm tắt đơn hàng</h5>
                    <ul class="checkout__total p-0">
                        <li>Tạm tính <span><?= number_format($tongTien) ?>đ</span></li>
                        <li>Giao hàng <span style="font-size: 14px; color: #fff;">Miễn phí</span></li>
                        <hr style="border-color: rgba(255,255,255,0.1)">
                        <li>Tổng cộng <span><?= number_format($tongTien) ?>đ</span></li>
                    </ul>
                    <a href="index.php?action=showcheckout" class="primary-btn">Thanh toán</a>
                    
                    <div class="mt-4">
                        <small style="font-size: 11px; opacity: 0.7;">
                            <i class="fa fa-shield-alt me-1"></i> Thanh toán an toàn & Bảo mật thông tin.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('layouts/footer.php'); ?>