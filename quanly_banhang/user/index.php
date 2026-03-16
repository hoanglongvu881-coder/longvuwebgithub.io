<?php
session_start();

include("connect.php");

if(isset($_POST['btn_them'])){

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
<?php
if(isset($_GET['xoa'])){
    $id = $_GET['xoa'];

    $sql = "DELETE FROM khachhang WHERE ma_kh = $id";
    $conn->query($sql);

    header("Location:index.php");
}
?>
<?php
if(isset($_SESSION['ten_kh'])){
echo "Xin chào: ".$_SESSION['ten_kh'];
}
?>

<?php
if(isset($_SESSION['quantri_kh']) && $_SESSION['quantri_kh']==1){

?>
<h2>DANH SÁCH KHÁCH HÀNG</h2>

<div class="top-bar">
<form method="GET" action="index.php">

<input type="text" name="tim" placeholder="Nhập mã KH hoặc họ tên">

<button type="submit">Tìm kiếm</button>

<a href="index.php" class="btn">Tải lại</a>

<a href="../admin/themKH.php" class="btn">Thêm khách hàng</a>

</form>
</div>

<br><br>

<?php

if(isset($_GET['tim']) && $_GET['tim'] != ""){
    $tim = $_GET['tim'];

    $sql = "SELECT * FROM khachhang 
            WHERE tendangnhap LIKE '%$tim%' 
            OR ten_kh LIKE '%$tim%'";
}
else{
    $sql = "SELECT * FROM khachhang";
}

$kq = $conn->query($sql);

?>

<table border="1" cellpadding="5" cellspacing="0">

<tr>
<th>Mã KH</th>
<th>Tên đăng nhập</th>
<th>Tên KH</th>
<th>Giới tính</th>
<th>Địa chỉ</th>
<th>Điện thoại</th>
<th>Email</th>
<th>CCCD</th>
<th>Thao tác</th>
</tr>

<?php
while($dong = $kq->fetch_assoc()){
?>

<tr>
<td><?=$dong['ma_kh'] ?></td>
<td><?=$dong['tendangnhap'] ?></td>
<td><?=$dong['ten_kh'] ?></td>
<td><?=$dong['gioitinh'] ?></td>
<td><?=$dong['diachi'] ?></td>
<td><?=$dong['dienthoai'] ?></td>
<td><?=$dong['email'] ?></td>
<td><?=$dong['cccd'] ?></td>

<td>
<a href="sua_KH.php?id=<?=$dong['ma_kh']?>">Sửa</a>
<a href="index.php?xoa=<?=$dong['ma_kh']?>"
onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?')">
Xóa
</a>
</td>

</tr>

<?php } ?>

</table>

<?php } ?>




<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ĐỒ ĐIỆN TỬ</title>
  <link rel="stylesheet" href="css/style_index.css">
  <link rel="stylesheet" href="css/style_giohang.css">
  <link rel="stylesheet" href="css/style_logo.css">
</head>

<body> 
  <header>
    <nav class="navbar">
      <div class="header">
        <img src="IMAGE/logo.png" class="logo" >

      </div>
      <ul class="menu">
        <li><a href="index.php">Trang chủ</a></li>
        
        <li><a href="#">Mua sắm</a>
          <ul class="sub-menu">
            <li><a href="#">PC Gaming</a></li>
              <ul>
                <li><a href="#">PC Esport</a></li>
                <li><a href="#">PC Stream game</a></li>                
              </ul>
            <li><a href="#">Laptop</a></li>
              <ul>
                <li><a href="#">Asus</a></li>
                <li><a href="#">Dell</a></li>    
                <li><a href="#">MacBook</a></li>            
              </ul>
            <li><a href="#">Phụ kiện</a></li>
              <ul>
                <li><a href="#">Tai nghe</a></li>
                <li><a href="#">Loa</a></li>    
                <li><a href="#">Chuột máy tính</a></li>            
              </ul>
            <li><a href="#">Tablet</a></li>
              <ul>
                <li><a href="#">Ipad</a></li>
                <li><a href="#">Samsung</a></li>                
              </ul>
          </ul>
        </li>
                   
        <li><a href="#">Khuyến mại</a></li>
        
        <li><a href="tintuc.php">Tin tức</a></li>
        
                  <?php
          if(isset($_SESSION['tendangnhap'])){
          ?>
          <li><a href="dangxuat.php">Đăng xuất</a></li>
          <?php
          }else{
          ?>
          <li><a href="dangky.php">Đăng ký</a></li>
          <li><a href="dangnhap.php">Đăng nhập</a></li>
          <?php
          }
          ?>
      </ul>
      <div class="giohang">

      <?php
      if(isset($_SESSION['quantri_kh']) && $_SESSION['quantri_kh'] == 0){
      ?>
      <img src="https://web.nvnstatic.net/tp/T0309/img/stores/28431/icon_cart.png?v=7" width="10%" height="20%">
      <a href="giohang.php">
      Giỏ hàng (<?php echo isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0; ?>)
      </a>

      <?php
      }
      ?>

</div>
<?php
$tong_sp = 0;

if(isset($_SESSION['giohang'])){
    foreach($_SESSION['giohang'] as $sp){
        $tong_sp += $sp['soluong'];
    }
}


?>
</a>
      </div>
    </nav>
  </header> 
<section class="product-list">
 <?php
      $sql = "SELECT sp.*, 
    (SELECT tentaptin_hsp
    FROM hinhsanpham
    WHERE ma_sp = sp.masp
    LIMIT 1) AS hinhanh
    FROM sanpham sp
    ";
  $kq= $conn->query($sql);
      
  if ($kq && $kq->num_rows > 0){
      while ($row=$kq->fetch_assoc()){
       $hinhanh = !empty($row['hinhanh'])
       ? "IMAGE/".$row['hinhanh']
       :"IMAGE/no-image.png";
        echo "<div class = 'product-item'>";
        echo "<a href='chitietSP.php?ma_sp=".$row['masp']."'>";
        echo "<img src='$hinhanh'>";
        echo "</a>";
        echo "<h3>". $row['tensp'] ."</h3>";
        echo "<p>" . number_format($row['gia_sp']) . " VNĐ</p>";
         if(isset($_SESSION['role']) && $_SESSION['role']==1){

echo "<a href='sua_sp.php?id=".$row['masp']."'>Sửa</a> | ";
echo "<a href='index.php?xoa=".$row['masp']."' 
onclick=\"return confirm('Bạn có chắc muốn xóa sản phẩm này?')\">Xóa</a>";



}else{

echo "<form method='post'>";
echo "<input type='hidden' name='ma_sp' value='{$row['masp']}'>";
echo "<button name='btn_them' class='btn-add-to-cart'>Thêm giỏ hàng</button>";
echo "</form>";

}
        echo"</div>";
        }
}
else{
  echo"<p>Không có sản phẩm nào để hiển thị</p>";
}
 ?>
</section>
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>GIỚI THIỆU</h3>
            <p>Thông tin công ty
              CÔNG TY TNHH LONGVUPC             
              Giấy chứng nhận đăng ký kinh doanh số 6646213 do Sở kế hoạch và đầu tư Thành phố Hà Nội cấp ngày 17/12/2025             
         
        </div>
        <div class="footer-section">
            <h3>LIÊN HỆ</h3>
            <ul>
                <li><a href="tel:+26548150">Điện thoại: 0377.949.631</a></li>
                <li><a href="mailto:info@shopdientu.com">Email: hoanglongvu19091612@gmail.com</a></li>
                <li><a href="mailto:info@shopdientu.com">Email: hoanglongvu881@gmail.com</a></li>
                <li><a href="#">Địa chỉ: Số 25 đường Trịnh Văn Bô, Phường Xuân Phương, Thành phố Hà Nội, Việt Nam</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>  CHÍNH SÁCH</h3>
            <ul>
                <li><a href="#">Chính sách thẻ vip</a></li>
                <li><a href="mailto:info@shopdientu.com">Chính sách tích điểm - tiêu điểm</a></li>
                <li><a href="#">Chính sách ưu đãi sinh nhật</a></li>
            </ul>                
        </div>
        
        <div class="footer-section">
          <h3>Đăng Ký Để Nhận Ưu Đãi</h3>      
          <form>
              <ul>
                <li><input type="email" placeholder="Nhập email của bạn" required> </li>    
                <li><input type="phone" placeholder="Nhập số điện thoại" required> <br>   </li>      
                <li><button type="submit">Đăng ký</button></li>
              </ul>          
          </form>
          
      </div>
    </div>    
<div class="footer-bottom">
        <p>&copy; 2025 Bản quyền TH </p>
</div>
</footer>
<script src="script.js"></script>
</body>
</html>
