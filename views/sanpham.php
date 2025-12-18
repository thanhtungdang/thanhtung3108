<?php 
include_once('layouts/header.php');
include_once("views/assets/CSS/all.php");
?>
<link rel="stylesheet" href="views/assets/CSS/sanpham.css">

<style>
            /* ===== PRODUCT DETAIL ===== */
    .product__details__text h3 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .product__details__price {
        font-size: 26px;
        color: #d10024;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .product__details__text p {
        font-size: 15px;
        line-height: 1.7;
        color: #555;
        margin-bottom: 25px;
    }

    /* ===== SIZE ===== */
    .form-label {
        font-size: 16px;
    }

    .btn-group .btn {
        min-width: 55px;
        font-weight: 600;
        border-radius: 6px;
    }

    .btn-group .btn small {
        display: block;
        font-size: 11px;
        font-weight: 400;
    }

    .btn-check:checked + .btn-outline-dark {
        background-color: #000;
        color: #fff;
    }

    /* ===== QUANTITY ===== */
    .quantity-controls {
        display: inline-flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 6px;
        overflow: hidden;
    }

    .qty-btn {
        width: 36px;
        height: 36px;
        border: none;
        background-color: #f5f5f5;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.2s;
    }

    .qty-btn:hover {
        background-color: #000;
        color: #fff;
    }

    .qty-input {
        width: 50px;
        height: 36px;
        border: none;
        text-align: center;
        font-weight: 600;
        background-color: #fff;
    }

    /* ===== ADD TO CART ===== */
    .primary-btn {
        margin-top: 20px;
        padding: 12px 35px;
        font-size: 15px;
        font-weight: 700;
        background-color: #000;
        color: #fff;
        border-radius: 30px;
        transition: 0.3s;
    }

    .primary-btn:hover {
        background-color: #d10024;
    }

    /* ===== IMAGE ===== */
    .product__details__pic img {
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    /* ===== MOBILE ===== */
    @media (max-width: 768px) {
        .product__details__text h3 {
            font-size: 22px;
        }

        .product__details__price {
            font-size: 22px;
        }

        .btn-group {
            flex-wrap: wrap;
            gap: 8px;
        }
    }

</style>

<section class="product-details spad">
    <div class="container">
        <div class="row">
            <?php if (isset($product1) && is_array($product1)): ?>
                <?php foreach ($product1 as $item): ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic thumB">
                            <img class="product__details__pic__item--large" 
                                 src="admin/<?= $item['img'] ?>" alt="">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <h3><?= htmlspecialchars($item['name']) ?></h3>
                            <div class="product__details__price"><?= number_format($item['price']) ?> VNĐ</div>
                            <p><?= $item['mota'] ?></p>

                            <form action="index.php?action=addtocart" method="POST">
                                <input type="hidden" name="idsp" value="<?= $item['id'] ?>">

                                <!-- ===== SIZE RADIO ===== -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Chọn Size:</label>

                                    <div class="btn-group" role="group">
                                        <?php foreach ($dsSize as $s): ?>
                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="size"
                                                id="size<?= $s['size'] ?>"
                                                value="<?= $s['size'] ?>"
                                                <?= ($s['soluong'] <= 0) ? 'disabled' : '' ?>
                                                required
                                            >
                                            <label
                                                class="btn btn-outline-dark <?= ($s['soluong'] <= 0) ? 'disabled opacity-50' : '' ?>"
                                                for="size<?= $s['size'] ?>"
                                            >
                                                <?= $s['size'] ?>
                                                <?= ($s['soluong'] <= 0) ? '<small>(Hết)</small>' : '' ?>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>


                                    <div class="mb-3">
                                        <label><b>Số lượng:</b></label>
                                        <div class="quantity-controls">
                                            <a href="javascript:void(0)" class="qty-btn" onclick="decreaseQty()">-</a>
                                            <input type="text" name="soluong" id="qty" class="qty-input" value="1" readonly>
                                            <a href="javascript:void(0)" class="qty-btn" onclick="increaseQty()">+</a>
                                        </div>
                                    </div>


                                <button type="submit" class="primary-btn" style="border:none">
                                    ADD TO CART
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
function increaseQty() {
    let qty = document.getElementById('qty');
    qty.value = parseInt(qty.value) + 1;
}

function decreaseQty() {
    let qty = document.getElementById('qty');
    if (parseInt(qty.value) > 1) {
        qty.value = parseInt(qty.value) - 1;
    }
}
</script>

<?php include_once('layouts/footer.php'); ?>
