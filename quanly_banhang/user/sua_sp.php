<?php
include("connect.php");

$id = $_GET['id'];

$sql = "SELECT * FROM sanpham WHERE masp='$id'";
$kq = $conn->query($sql);
$row = $kq->fetch_assoc();

if(isset($_POST['btn_sua'])){

$tensp = $_POST['tensp'];
$gia = $_POST['gia_sp'];
$soluong = $_POST['soluong'];

$sql_update = "UPDATE sanpham 
SET tensp='$tensp',
gia_sp='$gia',
soluong='$soluong'
WHERE masp='$id'";

$conn->query($sql_update);

header("Location: index.php");
exit();
}
?>

<h2>Sửa sản phẩm</h2>

<form method="post">

Tên sản phẩm<br>
<input type="text" name="tensp" value="<?php echo $row['tensp']; ?>"><br><br>

Giá sản phẩm<br>
<input type="text" name="gia_sp" value="<?php echo $row['gia_sp']; ?>"><br><br>

Số lượng<br>
<input type="text" name="soluong" value="<?php echo $row['soluong']; ?>"><br><br>

<button name="btn_sua">Cập nhật</button>

</form>