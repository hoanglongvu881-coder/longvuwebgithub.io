<?php
include("connect.php");

if(isset($_GET['ma_sp'])){
    $ma_sp = $_GET['ma_sp'];
}else{
    echo "Không tìm thấy sản phẩm";
    exit();
}

/* Lấy thông tin sản phẩm */
$sql = "SELECT sanpham.*, loaisanpham.ten_lsp, nhasanxuat.ten_nsx
FROM sanpham
JOIN loaisanpham ON sanpham.ma_lsp = loaisanpham.ma_lsp
JOIN nhasanxuat ON sanpham.ma_nsx = nhasanxuat.ma_nsx
WHERE sanpham.masp = $ma_sp";
$kq = $conn->query($sql);

if($kq->num_rows == 0){
    echo "Không tìm thấy sản phẩm";
    exit();
}

$sp = $kq->fetch_assoc();

/* Lấy hình ảnh sản phẩm */
$sql_img = "SELECT tentaptin_hsp FROM hinhsanpham WHERE ma_sp = $ma_sp";
$kq_img = $conn->query($sql_img);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="css/style_index.css">
    <link rel="stylesheet" href="css/style_chitietSP.css">
</head>
<body>

<div class="product-detail">

    <div class="product-images">
        <div class="main-image">
            <?php 
            $firstImg = $kq_img->fetch_assoc(); 
            ?>
            <img id="mainImg" src="IMAGE/<?php echo $firstImg['tentaptin_hsp']; ?>">
        </div>

        <div class="thumb-images">
            <?php
            mysqli_data_seek($kq_img, 0);
            while ($img = $kq_img->fetch_assoc()) {
                echo "<img src='IMAGE/{$img['tentaptin_hsp']}'
                      onclick=\"document.getElementById('mainImg').src=this.src\">";
            }
            ?>
        </div>
    </div>

    <div class="product-info">
        <h2><?php echo $sp['tensp']; ?></h2>

        <p><b>GIá mới:</b> <?php echo $sp['gia_sp']; ?></p>
        <p><b>Giá cũ:</b> <?php echo $sp['giacu_sp']; ?></p>
        <p><b>Loại:</b> <?php echo $sp['ten_lsp']; ?></p>
        <p><b>Hãng:</b> <?php echo $sp['ten_nsx']; ?></p>
        <p><b>Mô tả:</b> <?php echo $sp['mota_sp']; ?></p>
        <p><b>Chi tiết:</b><br><?php echo $sp['mota_chitiet_sp']; ?></p>

        <form method="post" action="giohang.php">
            <input type="hidden" name="ma_sp" value="<?php echo $sp['masp']; ?>">
            <button type="submit" name="btn_them">Thêm vào giỏ hàng</button>
        </form>

        <form method="post" action="thanhtoan.php">
    <input type="hidden" name="ma_sp" value="<?php echo $sp['masp']; ?>">
    <button type="submit" name="btn_mua">Mua ngay</button>
</form>
    </div>

</div>

</body>
</html>
