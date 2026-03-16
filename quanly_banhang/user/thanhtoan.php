<?php
session_start();
include("connect.php");

if(isset($_POST['ma_sp'])){
    $ma_sp = intval($_POST['ma_sp']);
}


// Lấy thông tin khách hàng
$ma_kh = 1;
$sql_kh = "SELECT * FROM khachhang WHERE ma_kh = $ma_kh";
$kh = $conn->query($sql_kh)->fetch_assoc();

$tongtien = 0;
$tong_sl = 0;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title></title>
    
    <link rel="stylesheet" href="css/style_thanhtoan.css">
</head>

<h2>Thanh toán đơn hàng</h2>

<div class="product-detail">

<!-- THÔNG TIN KHÁCH HÀNG -->
<div class="product-info">
<h3>Thông tin khách hàng</h3>

<p><b>Họ tên:</b> <?php echo $_SESSION['ten_kh']; ?></p>

<p><b>Địa chỉ:</b> <?php echo $_SESSION['diachi']; ?></p>

<p><b>Điện thoại:</b> <?php echo $_SESSION['dienthoai']; ?></p>


</div>

<!-- CHI TIẾT ĐƠN HÀNG -->
<div class="product-info">

<h3>Chi tiết đơn hàng</h3>

<table border="1" width="100%" cellpadding="10">

<tr>
<th>Sản phẩm</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Thành tiền</th>
</tr>

<?php
if(!empty($_SESSION['giohang'])){

foreach($_SESSION['giohang'] as $sp){

$tt = $sp['gia'] * $sp['soluong'];

$tongtien += $tt;
$tong_sl += $sp['soluong'];
?>

<tr>

<td><?= $sp['tensp'] ?></td>

<td><?= number_format($sp['gia']) ?> VND</td>

<td><?= $sp['soluong'] ?></td>

<td><?= number_format($tt) ?> VND</td>

</tr>

<?php } } ?>

<tr>

<td colspan="2"><b>Tổng số lượng</b></td>
<td colspan="2"><?= $tong_sl ?></td>

</tr>

<tr>

<td colspan="2"><b>Tổng tiền</b></td>

<td colspan="2" style="color:red">

<?= number_format($tongtien) ?> VND

</td>

</tr>

</table>

</div>

<!-- THANH TOÁN -->

<div class="payment-box">

<form method="post" action="xuly_thanhtoan.php">

<input type="hidden" name="tongtien" value="<?= $tongtien ?>">

<label>Hình thức thanh toán:</label>

<br>

<select name="ma_httt" required>

<option value="">Chọn phương thức</option>

<option value="1">Thanh toán khi nhận hàng (COD)</option>

<option value="2">Chuyển khoản ngân hàng</option>



</select>

<br><br>

<button type="submit" name="btn_thanhtoan" class="btn-pay">

Xác nhận thanh toán

</button>

</form>

</div>

</form>

</div>

</div>