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
                        <?php if (!empty($listCart)): ?>
                            <?php foreach ($listCart as $item): ?>
                                <tr>
                                    <td style="width:100px">
                                        <div class="cart-img-wrap">
                                            <img src="admin/<?= $item['img']; ?>">
                                        </div>
                                    </td>

                                    <td>
                                        <h6><?= $item['name'] ?></h6>
                                        <small>Size: <?= $item['size'] ?></small>
                                    </td>

                                    <td><?= number_format($item['price']) ?>đ</td>

                                    <td>
                                        <div class="quantity-controls">
                                            <a class="qty-btn"
                                               href="index.php?action=updatecart&idsp=<?= $item['id_sanpham']; ?>&size=<?= $item['size']; ?>&type=decrease">-</a>

                                            <input class="qty-input" readonly value="<?= $item['soluong']; ?>">

                                            <a class="qty-btn"
                                               href="index.php?action=updatecart&idsp=<?= $item['id_sanpham']; ?>&size=<?= $item['size']; ?>&type=increase">+</a>
                                        </div>
                                    </td>

                                    <td><?= number_format($item['price'] * $item['soluong']) ?>đ</td>

                                    <td>
                                        <a class="btn-remove"
                                           onclick="return confirm('Xóa sản phẩm này?')"
                                           href="index.php?action=deletecart&idsp=<?= $item['id_sanpham']; ?>&size=<?= $item['size']; ?>">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Giỏ hàng trống</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="shoping__checkout">
                    <h5>Tóm tắt</h5>
                    <ul class="checkout__total">
                        <li>Tổng <span><?= number_format($tongTien) ?>đ</span></li>
                    </ul>
                    <a href="index.php?action=showcheckout" class="primary-btn">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('layouts/footer.php'); ?>
