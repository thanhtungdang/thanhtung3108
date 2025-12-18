<?php 
include_once("views/layouts/header.php");

include_once("Controller/HomeController.php");
include_once("Controller/CartController.php");
// include_once("Controller/CheckOutController.php");
include_once("Controller/Top10Controller.php");
// include_once("Controller/SearchController.php");
include_once("Controller/HistoryCheckoutController.php");

$home = new HomeController();
$cart = new CartController();
// $checkOut = new CheckOutController();
$top10 = new Top10Controller();
// $searchProduct = new SearchController();
// $HistoryCheckout = new HistoryCheckoutController();

session_start();
if(isset($_GET['action']) && $_GET['action'] != "") {
    $action = $_GET['action'];
    switch($action) {
        case "home":
            $home->home();   
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
        // case "showcheckout":
        //     $checkOut->index();   
        //     break;
        // case "checkout":
        //     $checkOut->add1();   
        //     break;
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
        // case "search":
        //     $searchProduct->search();   
        //     break;
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
