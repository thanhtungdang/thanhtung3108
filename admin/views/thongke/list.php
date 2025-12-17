<?php
include_once("views/layouts/header.php");
?>

<body>
    <div class="page-heading">
        <h3>Trang thống kê</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="bi bi-bar-chart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Tổng doanh thu</h6>
                                        <h6 class="font-extrabold mb-0"><?= number_format($tongDoanhThu['tongDoanhThu']) ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="fas fa-chart-line"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Tổng hoá đơn</h6>
                                        <h6 class="font-extrabold mb-0"><?php echo $tongDon['tongdon']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-6">

                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="bi bi-pie-chart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Tổng số sản phẩm đã bán</h6>
                                        <h6 class="font-extrabold mb-0"><?php echo ($tongDaBan['tong_soluong']) ?></h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="index.php?action=listthongke" method="GET" class="d-flex">
                        <input type="hidden" name="action" value="listthongke">

                        <input type="date" name="date_from" class="form-control me-2"
                            value="<?= $dateFrom ?>">

                        <input type="date" name="date_to" class="form-control me-2"
                            value="<?= $dateTo ?>">

                        <button class="btn btn-primary">Lọc</button>
                    </form>
                    <?php
                    $ngay = [];
                    $soLuongDon = [];
                    $doanhThu = [];

                    foreach ($listDoanhThu as $row) {
                        $ngay[] = $row['ngay'];
                        $soLuongDon[] = (int)$row['so_luong_don'];
                        $doanhThu[]   = (int)$row['doanh_thu'];
                    }
                    ?>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var chart = new ApexCharts(document.querySelector("#chart-profile-visit"), {
                                chart: {
                                    type: "bar",
                                    height: 350
                                },
                                series: [{
                                    name: "Doanh thu",
                                    data: <?= json_encode($doanhThu) ?>
                                }],
                                xaxis: {
                                    categories: <?= json_encode($ngay) ?>
                                }
                            });

                            chart.render();
                        });
                    </script>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Profile Visit</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3>Top 10 sản phẩm bán chạy nhất</h3>
                        <a href="index.php?action=thongke10spbanchaynhat" class="btn btn-primary">Chi tiết</a>
                        <table class="table table-striped" id="">
                            <thead>
                                <tr>
                                    <th class="col-1">Id</th>
                                    <th class="col-1">Danh mục</th>
                                    <th class="col-2">Tên sản phẩm</th>

                                    <th class="col-1">Ảnh</th>



                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productsBanChay as $item) { ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['tendanhmuc'] ?></td>
                                        <td><?= $item['name'] ?></td>

                                        <td><img width="100px" src="./<?= $item['img'] ?>" alt=""></td>



                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>



                    <div class="col-6">
                        <h3>Top 10 sản phẩm mới nhất</h3>
                        <a href="index.php?action=thongke10spnew" class="btn btn-primary">Chi tiết</a>
                        <table class="table table-striped" id="">
                            <thead>
                                <tr>
                                    <th class="col-1">Id</th>
                                    <th class="col-1">Danh mục</th>
                                    <th class="col-2">Tên sản phẩm</th>

                                    <th class="col-1">Ảnh</th>



                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productsNew as $item) { ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['tendanhmuc'] ?></td>
                                        <td><?= $item['name'] ?></td>

                                        <td><img width="100px" src="./<?= $item['img'] ?>" alt=""></td>



                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </section>
    </div>






    <?php
    include_once("views/layouts/footer.php");
    ?>