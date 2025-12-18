<?php 
session_start();
ob_start();

include_once("views/layouts/header.php");

include_once("Controller/HomeController.php");
include_once("Controller/CartController.php");
include_once("Controller/CheckoutController.php");
include_once("Controller/Top10Controller.php");
include_once("Controller/HistoryCheckoutController.php");
include_once("Controller/UserController.php"); 

$home = new HomeController();
$cart = new CartController();
$checkout = new CheckoutController();
$top10 = new Top10Controller();
$HistoryCheckout = new HistoryCheckoutController();
$user = new UserController();

if(isset($_GET['action']) && $_GET['action'] != "") {
    $action = $_GET['action'];
    switch($action) {
        case "home":
            $home->home();   
            break;
        case "login":
            $user->login(); 
            break;
        case "login_submit":
            $user->login_submit();
            break;
        case "register_submit":
            $user->register_submit();
            break;
        case "profile":
            $user->profile();
            break;
        case "update_profile":
            $user->update_profile();
            break;
        case "logout":
            $user->logout();
            break;
        case "aboutUs":
            $home->aboutUs();   
            break;
        case "contact":
            $home->contact();   
            break;
        case "addtocart":
            $cart->add();   
            break;
        case "cart":
            $cart->cart();   
            break;
        case 'updatecart':
            $cart->update();
            break;
        case "deletecart":
            $cart->delete();   
            break;
        case "showcheckout":
            $checkout->index();   
            break;
        case "checkout":
            $checkout->add1();   
            break;
        case "top10new":
            $top10->top10New();   
            break;
        case "sanpham":
            $home->sanpham();   
            break;
        case "shop":
            $home->shop();   
            break;
        case "danhmuc":
            $home->danhmuc();   
            break;
        case "HistoryCheckout":
            $HistoryCheckout->search();
            break;

        case "HistoryCheckoutDetail":
            $HistoryCheckout->detail();
            break;
    }
} 
else {
    $home->home();   
} 

include_once("views/layouts/footer.php");
?>