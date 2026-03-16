<?php
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý khách hàng</title>
</head>
<body>
<h2>DANH SÁCH KHÁCH HÀNG</h2>

<div class="top-bar">
<form method="GET">
<input type="text" name="tim" placeholder="Nhập mã KH hoặc họ tên">
<button type="submit">Tìm kiếm</button>
<button type="submit">Tải lại</button>
<button type="submit">Thêm khách hàng</button>

</form>
</div>
<br><br>
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
    $sql= "select * from khachhang";
    $kq= $conn->query($sql);//thực hiện truy vấn->tạo bảng->gán cho biến kq
    while($dong = $kq->fetch_assoc()){//xét mamgr kq theo mảng kết hợp
        
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
        <a href="suaKH.php?id=<?= $dong['ma_kh'] ?>">Sửa</a> |
        <a href="xoaKH.php?id=<?= $dong['ma_kh'] ?>"
        onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?')">
        Xóa
        </a>
    </td>
</tr>
<?php
}
?>
</table>
</body>
</html>
