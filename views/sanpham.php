<?php 
include_once('layouts/header.php');
include_once("views/assets/CSS/all.php");
?>
<link rel="stylesheet" href="views/assets/CSS/sanpham.css">

<style>
/* ===== CHỈ SỬA QUANTITY CONTROL GIỐNG GIỎ HÀNG ===== */
:root {
    --fcb-navy: #181733;
    --fcb-red: #a50044;
    --fcb-gold: #edbb00;
    --fcb-light-gray: #f8f9fa;
    --fcb-text: #181733;
}

/* QUANTITY CONTROL */
.quantity-wrapper .form-label {
    margin-bottom: 6px;
    font-weight: 700;
    color: var(--fcb-text);
}

.quantity-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--fcb-light-gray);
    border-radius: 30px;
    width: fit-content;
    margin: 0;
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
    cursor: pointer;
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
    pointer-events: none;
}

/* PHẦN KHÁC GIỮ NGUYÊN */
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
    color: #ffffffff;
    margin-bottom: 25px;
}

.btn-group .btn {
    min-width: 55px;
    font-weight: 600;
    border-radius: 6px;
    color: #ffffffff;
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

.product__details__pic img {
    width: 100%;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

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

                                <!-- SIZE -->
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

                                <!-- QUANTITY -->
                                <div class="quantity-wrapper mb-3">
                                    <label class="form-label fw-bold">Số lượng:</label>
                                    <div class="quantity-controls">
                                        <button type="button" class="qty-btn qty-decrease">-</button>
                                        <input type="text" name="soluong" id="qty" class="qty-input" value="1" readonly>
                                        <button type="button" class="qty-btn qty-increase">+</button>
                                    </div>
                                </div>

                                <!-- ADD TO CART -->
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
document.querySelector('.qty-increase').addEventListener('click', () => {
    let qty = document.getElementById('qty');
    qty.value = parseInt(qty.value) + 1;
});

document.querySelector('.qty-decrease').addEventListener('click', () => {
    let qty = document.getElementById('qty');
    if (parseInt(qty.value) > 1) {
        qty.value = parseInt(qty.value) - 1;
    }
});
</script>

<?php include_once('layouts/footer.php'); ?>
