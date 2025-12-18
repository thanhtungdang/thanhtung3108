<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIÊN HỆ | BLAUGRANA STORE</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <?php 
    // Giữ nguyên các file CSS gốc của bạn
    include_once("views/assets/CSS/all.php");
    ?>

    <style>
        :root {
            --fcb-navy: #181733;
            --fcb-dark: #0a091e;
            --fcb-red: #a50044;
            --fcb-gold: #edbb00;
            --fcb-blue: #004d98;
        }

        body {
            background-color: #f4f7f6;
            font-family: 'Inter', sans-serif;
            color: #333;
        }

        /* Breadcrumb Section */
        .breadcrumb-section {
            position: relative;
            background-size: cover;
            background-position: center;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .breadcrumb-section::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(24, 23, 51, 0.75); /* Lớp phủ Navy tối */
        }

        .breadcrumb__text {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .breadcrumb__text h2 {
            font-size: 40px;
            color: var(--fcb-gold);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .breadcrumb__option a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .breadcrumb__option span {
            color: #ccc;
            margin-left: 5px;
        }

        /* Contact Info Cards */
        .contact-info-wrapper {
            margin-top: -50px; /* Đẩy thẻ lên trên một chút */
            position: relative;
            z-index: 10;
        }

        .contact__widget {
            background: #fff;
            padding: 35px 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            border-bottom: 4px solid transparent;
        }

        .contact__widget:hover {
            transform: translateY(-10px);
            border-bottom: 4px solid var(--fcb-red);
        }

        .contact__widget span {
            font-size: 36px;
            color: var(--fcb-navy);
            margin-bottom: 20px;
            display: inline-block;
        }

        .contact__widget h4 {
            font-size: 18px;
            font-weight: 700;
            color: var(--fcb-navy);
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .contact__widget p {
            font-size: 15px;
            color: #666;
            margin-bottom: 0;
        }

        /* Map */
        .map {
            margin: 60px 0;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border: 8px solid #fff;
        }

        /* Contact Form */
        .contact-form-section {
            padding-bottom: 80px;
        }

        .contact__form__title h2 {
            font-weight: 800;
            color: var(--fcb-navy);
            text-transform: uppercase;
            margin-bottom: 40px;
            position: relative;
            display: inline-block;
        }

        .contact__form__title h2::after {
            content: "";
            position: absolute;
            width: 50px;
            height: 4px;
            background: var(--fcb-red);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .contact-form form input, 
        .contact-form form textarea {
            width: 100%;
            border: 1px solid #ddd;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 16px;
            background: #fff;
            transition: 0.3s;
        }

        .contact-form form input:focus, 
        .contact-form form textarea:focus {
            border-color: var(--fcb-blue);
            outline: none;
            box-shadow: 0 0 15px rgba(0, 77, 152, 0.1);
        }

        .contact-form form textarea {
            height: 150px;
            resize: none;
        }

        .site-btn {
            background: var(--fcb-navy);
            color: #fff;
            padding: 16px 50px;
            font-weight: 700;
            border: none;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
            cursor: pointer;
        }

        .site-btn:hover {
            background: var(--fcb-red);
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(165, 0, 68, 0.2);
        }
    </style>
</head>
<body>

<?php include_once("layouts/header.php"); ?>

    <section class="breadcrumb-section" data-setbg="./views/contact1.jpg" style="background-image: url('./views/contact1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h2>Liên Hệ Với Chúng Tôi</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Trang chủ</a>
                            <i class="fa fa-chevron-right" style="color:#fff; font-size: 12px; margin: 0 10px;"></i>
                            <span>Liên hệ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-info-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="contact__widget">
                        <span class="fa fa-phone-alt"></span>
                        <h4>Điện thoại</h4>
                        <p>096XXXXXXX</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="contact__widget">
                        <span class="fa fa-map-marker-alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>Hải Phòng</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="contact__widget">
                        <span class="fa fa-clock"></span>
                        <h4>Giờ mở cửa</h4>
                        <p>24/7 (Culers never sleep)</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="contact__widget">
                        <span class="fa fa-envelope"></span>
                        <h4>Email</h4>
                        <p>thanhtung3108@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="map">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.4616652427847!2d106.6806371!3d20.8433436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7af39e3f173b%3A0xd641f238805f778c!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1700000000000"
                width="100%" height="450" style="border:0;" 
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="contact-form-section">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form shadow-sm p-5 bg-white rounded-4">
                        <div class="contact__form__title text-center">
                            <h2>Để Lại Lời Nhắn</h2>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" placeholder="Tên của bạn">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="email" placeholder="Email của bạn">
                                </div>
                                <div class="col-lg-12 text-center">
                                    <textarea placeholder="Nội dung liên hệ..."></textarea>
                                    <button type="submit" class="site-btn">Gửi Tin Nhắn Ngay</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

<?php include_once("layouts/footer.php"); ?>

</body>
</html>