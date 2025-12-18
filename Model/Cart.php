<?php
require_once 'pdo.php';

class Cart {

    public function getCartByUser($id_user) {
        $sql = "SELECT g.*, s.name, s.price, s.img
                FROM giohang g
                JOIN sanpham s ON g.id_sanpham = s.id
                WHERE g.id_user = ?";
        return pdo_query($sql, $id_user);
    }

    public function updateOrInsertCart($id_user, $id_pro, $soluong, $size) {
        $check = pdo_query_one(
            "SELECT id, soluong FROM giohang WHERE id_user=? AND id_sanpham=? AND size=?",
            $id_user, $id_pro, $size
        );

        if ($check) {
            pdo_execute(
                "UPDATE giohang SET soluong=? WHERE id=?",
                $check['soluong'] + $soluong,
                $check['id']
            );
        } else {
            pdo_execute(
                "INSERT INTO giohang(id_user,id_sanpham,size,soluong) VALUES (?,?,?,?)",
                $id_user, $id_pro, $size, $soluong
            );
        }
    }

    public function updateQuantity($id_user, $id_pro, $size, $type) {
        $item = pdo_query_one(
            "SELECT g.id,g.soluong,ss.soluong tonkho
             FROM giohang g
             JOIN sanpham_size ss ON g.id_sanpham=ss.id_sanpham AND g.size=ss.size
             WHERE g.id_user=? AND g.id_sanpham=? AND g.size=?",
            $id_user, $id_pro, $size
        );

        if (!$item) return;

        $newQty = ($type == 'increase') ? $item['soluong'] + 1 : $item['soluong'] - 1;

        if ($newQty > $item['tonkho']) return "over_stock";

        if ($newQty > 0) {
            pdo_execute("UPDATE giohang SET soluong=? WHERE id=?", $newQty, $item['id']);
        } else {
            $this->deleteCartItem($id_user, $id_pro, $size);
        }
    }

    public function deleteCartItem($id_user, $id_pro, $size) {
        pdo_execute(
            "DELETE FROM giohang WHERE id_user=? AND id_sanpham=? AND size=?",
            $id_user, $id_pro, $size
        );
    }
}
