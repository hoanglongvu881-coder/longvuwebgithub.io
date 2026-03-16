<?php
include("connect.php");

if(isset($_POST['btn_dk']))
{

$tendangnhap = $_POST['tendangnhap'];
$matkhau = $_POST['matkhau'];
$ten_kh = $_POST['ten_kh'];
$gioitinh = $_POST['gioitinh'];
$diachi = $_POST['diachi'];
$dienthoai = $_POST['dienthoai'];
$email = $_POST['email'];
$ngaysinh = $_POST['ngaysinh'];
$cccd = $_POST['cccd'];

$sql = "INSERT INTO khachhang
(tendangnhap,matkhau,ten_kh,gioitinh,diachi,dienthoai,email,ngaysinh,cccd,quantri_kh)
VALUES
('$tendangnhap','$matkhau','$ten_kh','$gioitinh','$diachi','$dienthoai','$email','$ngaysinh','$cccd',0)";

if($conn->query($sql))
{
echo "Đăng ký thành công";
}
else
{
echo "Lỗi";
}

}
?>