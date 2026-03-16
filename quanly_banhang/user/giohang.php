<?php
session_start();
include("connect.php");




if(isset($_GET['cong'])){
$id = $_GET['cong'];
$_SESSION['giohang'][$id]['soluong']++;
header("Location: giohang.php");
exit();
}

if(isset($_GET['tru'])){
$id = $_GET['tru'];
$_SESSION['giohang'][$id]['soluong']--;

if($_SESSION['giohang'][$id]['soluong'] <= 0){
unset($_SESSION['giohang'][$id]);
header("Location: giohang.php");
exit();
}
}

if(isset($_GET['xoa'])){
$id = $_GET['xoa'];
unset($_SESSION['giohang'][$id]);
header("Location: giohang.php");
exit();
}


if(isset($_POST['btn_them']) || isset($_POST['muangay'])){

$ma_sp = $_POST['ma_sp'];

$sql = "SELECT sp.*, 
(SELECT tentaptin_hsp 
FROM hinhsanpham 
WHERE ma_sp = sp.masp 
LIMIT 1) AS hinhanh
FROM sanpham sp
WHERE sp.masp='$ma_sp'";

$kq = $conn->query($sql);
$row = $kq->fetch_assoc();

if(!isset($_SESSION['giohang'])){
$_SESSION['giohang'] = [];
}

if(isset($_SESSION['giohang'][$ma_sp])){
$_SESSION['giohang'][$ma_sp]['soluong']++;
}else{
$_SESSION['giohang'][$ma_sp] = [
'tensp'=>$row['tensp'],
'gia'=>$row['gia_sp'],
'soluong'=>1,
'hinhanh'=>$row['hinhanh']
];
}

}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="css/style_index.css">
    <link rel="stylesheet" href="css/style_giohang.css">
</head>
<body>
<br>
<h2>GIỎ HÀNG CỦA BẠN</h2>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    
<tr>
<th>Hình ảnh</th>
<th>Tên sản phẩm</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Thành tiền</th>
<th>Xóa</th>
</tr>

<?php

$tong = 0;

if(isset($_SESSION['giohang'])){

foreach($_SESSION['giohang'] as $id=>$sp){

$tt = $sp['gia'] * $sp['soluong'];
$tong += $tt;

echo "<tr>";

echo "<td><img src='IMAGE/".$sp['hinhanh']."' width='80'></td>";

echo "<td>".$sp['tensp']."</td>";

echo "<td>".number_format($sp['gia'])." VND</td>";

echo "<td>
<a href='giohang.php?tru=$id'>-</a>
".$sp['soluong']."
<a href='giohang.php?cong=$id'>+</a>
</td>";

echo "<td>".number_format($tt)." VND</td>";

echo "<td>
<a href='giohang.php?xoa=$id'>Xóa</a>
</td>";

echo "</tr>";

}

}

echo "<tr>";
echo "<td colspan='4'><b>Tổng tiền</b></td>";
echo "<td>".number_format($tong)." VND</td>";
echo "<td></td>";
echo "</tr>";
?>
</table>
</table>
<div style="margin-top:20px;">
    <a href="thanhtoan.php">
        <button style="
            padding:10px 25px;
            background:#8a2be2;
            color:white;
            border:none;
            border-radius:5px;
            font-size:16px;
            cursor:pointer;">
            Thanh toán ngay
        </button>
    </a>
</div>
<br>
<a href="index.php">Tiếp tục mua sắm</a>
</body>
</html>
