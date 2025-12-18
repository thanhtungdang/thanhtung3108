<?php 
// Đảm bảo CSS được load đúng
include_once("views/assets/CSS/all.php");
?>
<header class="header_area">
  <nav class="navbar navbar-expand-lg navbar-dark header_navbar" style="background-color: var(--fcb-navy, #181733); border-bottom: 3px solid var(--fcb-gold, #edbb00);">
    <div class="container-fluid">

      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="//store.fcbarcelona.com/cdn/shop/t/9/assets/logo-simple-white.svg?v=15706832919691285971675422275" alt="Barça Official Store" class="logobarca me-2" style="height: 50px;">
        <div class="logo-text d-none d-sm-block">
        </div>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbar">

        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active fw-bold" href="index.php">TRANG CHỦ</a></li> 
          <li class="nav-item"><a class="nav-link fw-bold" href="index.php?action=shop">SHOP</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-bold" data-bs-toggle="dropdown" href="#">PAGE</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?action=top10new">TOP 10 MỚI NHẤT</a></li>
              <li><a class="dropdown-item" href="index.php?action=cart">GIỎ HÀNG</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="index.php?action=showcheckout">THANH TOÁN</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link fw-bold" href="index.php?action=contact">CONTACT</a></li>  
        </ul>

        <ul class="navbar-nav header-right ms-lg-2 d-flex align-items-center">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" href="#" role="button">
              <i class="fa-solid fa-user me-2" style="font-size: 1.2rem;"></i>
              <span class="fw-bold" style="font-size: 13px; text-transform: uppercase;">
                <?php 
                  if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                    echo "Hi, " . $_SESSION['user']['user']; 
                  } else {
                    echo "TÀI KHOẢN";
                  }
                ?>
              </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow">
              <?php if(!isset($_SESSION['user'])): ?>
                <li><a class="dropdown-item" href="index.php?action=login"><i class="fa-solid fa-right-to-bracket me-2"></i>Đăng nhập</a></li>
              <?php else: ?>
                <li><a class="dropdown-item" href="index.php?action=profile"><i class="fa-solid fa-circle-user me-2"></i>Thông tin tài khoản</a></li>
                <li><a class="dropdown-item" href="index.php?action=HistoryCheckout"><i class="fa-solid fa-clock-rotate-left me-2"></i>Lịch sử mua hàng</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger fw-bold" href="index.php?action=logout"><i class="fa-solid fa-power-off me-2"></i>ĐĂNG XUẤT</a></li>
              <?php endif; ?>
            </ul>
          </li>

          <li class="nav-item ms-3">
            <a class="nav-link" href="index.php?action=cart">
              <i class="fa-solid fa-cart-arrow-down" style="font-size: 1.2rem;"></i>
            </a>
          </li>

        </ul>

      </div>
    </div>
  </nav>
</header>

<style>
  .header_navbar .nav-link {
    color: rgba(255,255,255,0.8) !important;
    transition: 0.3s;
  }
  .header_navbar .nav-link:hover, .header_navbar .nav-link.active {
    color: var(--fcb-gold, #edbb00) !important;
  }
  .dropdown-item:hover {
    background-color: var(--fcb-red, #a50044);
    color: white;
  }
</style>