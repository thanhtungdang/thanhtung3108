<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý cửa hàng bánh</title>
    <link rel="icon" type="image/x-icon" href="views/img/logo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="views/assets/css/bootstrap.css">

    <link rel="stylesheet" href="views/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="views/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="views/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="views/assets/css/app.css">
    <link rel="shortcut icon" href="views/assets/images/favicon.svg" type="image/x-icon">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="http://localhost/duanbanh/index.php?action=home"><img src="views/assets/images/logo/logo.png" alt="Logo" style="width:150px; height:auto;"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?= str_contains($_SERVER['REQUEST_URI'], "danhmuc") ? 'active' : '' ?>">
                            <a href="index.php?action=listdanhmuc" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Danh mục</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= str_contains($_SERVER['REQUEST_URI'], "sanpham") ? 'active' : '' ?>">
                            <a href="index.php?action=listsanpham" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Sản phẩm</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= str_contains($_SERVER['REQUEST_URI'], "hoadon") ? 'active' : '' ?>">
                            <a href="index.php?action=listhoadon" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Hóa đơn</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= str_contains($_SERVER['REQUEST_URI'], "thongke") ? 'active' : '' ?>">
                            <a href="index.php?action=listthongke" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Thống kê</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= str_contains($_SERVER['REQUEST_URI'], "taikhoan") ? 'active' : '' ?>">
                            <a href="index.php?action=listtaikhoan" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Tài khoản</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-footer mt-5 p-3">
                    <a href="index.php?action=logout" class="btn btn-danger w-100">
                        <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                    </a>
                </div>

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>