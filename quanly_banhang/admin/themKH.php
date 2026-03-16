<?php
include("connect.php");

$sql= "INSERT INTO khachhang
(tendangnhap, matkhau, ten_kh, gioitinh, diachi, dienthoai, email, ngaysinh, cccd, makichhoat, trangthai, quantri_kh)

VALUES
('hung', '123456', 'Nguyen Van Hung', 'Nam', 'Ha Noi', '0988888888', 'hung@gmail.com', '2000-05-20', '123456789012','HUNG002', 1, 0)";

$kq = $conn->query($sql);

if ($kq){
    echo "<script>
    alert('Thêm khách hàng thành công');
    window.location.href='../user/index.php';
    </script>";
}
else{
    echo "<script>
    alert('Không thêm được khách hàng');
    window.location.href='../user/index.php';
    </script>";
}

$conn->close();
?>