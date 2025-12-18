<?php 
include_once("pdo.php");

class Top10 {
    public function top10New() {
        $sql = "select * from sanpham where deleted = 0 order by id desc limit 10";
        return pdo_query($sql);
    }
 
}
?>