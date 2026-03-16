<?php
session_start();
include("connect.php");

if(isset($_POST['btn_dn'])){

$tendangnhap = $_POST['tendangnhap'];
$matkhau = $_POST['matkhau'];

$sql = "SELECT * FROM khachhang 
WHERE tendangnhap='$tendangnhap' 
AND matkhau='$matkhau'
";

$kq = $conn->query($sql);

if($kq->num_rows > 0){

$row = $kq->fetch_assoc();

$_SESSION['ten_kh'] = $row['ten_kh'];
$_SESSION['dienthoai'] = $row['dienthoai'];
$_SESSION['diachi'] = $row['diachi'];
$_SESSION['role'] = $row['quantri_kh'];
$_SESSION['tendangnhap'] = $row['tendangnhap'];
$_SESSION['quantri_kh'] = $row['quantri_kh'];

if($row['quantri_kh']==1){
header("Location: index.php");
}
else{
header("Location: index.php");
}

}
else{
echo "Sai tài khoản hoặc mật khẩu";
}

}
?>