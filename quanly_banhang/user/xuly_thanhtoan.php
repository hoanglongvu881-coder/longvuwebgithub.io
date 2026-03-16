<?php
session_start();
include("connect.php");
if (isset($_POST['btn_thanhtoan'])) {
    foreach($_SESSION['giohang'] as $sp){

$masp = $sp['masp'];
$soluong = $sp['soluong'];

$sql="UPDATE sanpham 
      SET soluong = soluong - $soluong 
      WHERE masp='$masp'";

$conn->query($sql);

}

// xóa giỏ hàng
unset($_SESSION['giohang']);


    $ma_kh = $_SESSION['ma_kh'] ?? 2;
    $ma_sp = intval($_POST['ma_sp']);
    $tongtien = $_POST['tongtien'];
    $ma_httt = $_POST['ma_httt'];
 
    $sql_dh = "INSERT INTO donhang(ma_kh, ngaydat, tongtien, trangthai, ma_httt)
               VALUES ($ma_kh, NOW(), $tongtien, 0, $ma_httt)";
    $conn->query($sql_dh);
    $ma_dh = $conn->insert_id;
    //THÊM CHI TIẾT ĐƠN HÀNG
    $sql_sp = "SELECT gia_sp FROM sanpham WHERE masp = $ma_sp";
    $gia = $conn->query($sql_sp)->fetch_assoc()['gia_sp'];
    $sql_ct = "INSERT INTO chitiet_donhang(ma_dh, ma_sp, soluong, dongia)
               VALUES ($ma_dh, $ma_sp, 1, $gia)";
    $conn->query($sql_ct);
    echo "<script>alert('Thanh toán thành công!'); location.href='index.php';</script>";




}
?>