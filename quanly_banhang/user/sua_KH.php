<?php
include("connect.php");

$id = $_GET['id'];

$sql = "SELECT * FROM khachhang WHERE ma_kh='$id'";
$kq = $conn->query($sql);
$row = $kq->fetch_assoc();

if(isset($_POST['btn_sua'])){

$ten = $_POST['ten_kh'];
$gioitinh = $_POST['gioitinh'];
$diachi = $_POST['diachi'];
$dienthoai = $_POST['dienthoai'];
$email = $_POST['email'];
$cccd = $_POST['cccd'];

$sql_update = "UPDATE khachhang SET
ten_kh='$ten',
gioitinh='$gioitinh',
diachi='$diachi',
dienthoai='$dienthoai',
email='$email',
cccd='$cccd'
WHERE ma_kh='$id'";

$conn->query($sql_update);

header("Location: index.php");
exit();
}
?>

<h2>Sửa khách hàng</h2>

<form method="post">

Tên KH<br>
<input type="text" name="ten_kh" value="<?php echo $row['ten_kh']; ?>"><br><br>

Giới tính<br>
<input type="text" name="gioitinh" value="<?php echo $row['gioitinh']; ?>"><br><br>

Địa chỉ<br>
<input type="text" name="diachi" value="<?php echo $row['diachi']; ?>"><br><br>

Điện thoại<br>
<input type="text" name="dienthoai" value="<?php echo $row['dienthoai']; ?>"><br><br>

Email<br>
<input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>

CCCD<br>
<input type="text" name="cccd" value="<?php echo $row['cccd']; ?>"><br><br>

<button name="btn_sua">Cập nhật</button>

</form>