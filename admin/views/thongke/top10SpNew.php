<?php
include_once("views/layouts/header.php");
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thống kê sản phẩm</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thống kê</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="?action=listthongke" class="btn btn-primary"> Quay lại </a>
                <a href="?action=thongke10spbanchaynhat" class="btn btn-primary"> Top 10 sản phẩm bán chạy nhất </a>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="col-1">Id</th>
                            <th class="col-1">Danh mục</th>
                            <th class="col-2">Tên sản phẩm</th>
                            <th class="col-1">Giá sp</th>
                            <th class="col-1">Ảnh</th>
                            <th class="col-3">Mô tả</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productsNew as $item) { ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['tendanhmuc'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['price'] ?> VND</td>
                                <td><img width="100px" src="./<?= $item['img'] ?>" alt=""></td>
                                <td><?= $item['mota'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?php
include_once("views/layouts/footer.php");
?>