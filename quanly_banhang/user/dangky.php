<link rel="stylesheet" href="css/style_login.css">
<div class="form-box">

<h2>ĐĂNG KÝ</h2>

<form method="post" action="xuly_dangky.php">

Tên đăng nhập
<input type="text" name="tendangnhap" required>

Mật khẩu
<input type="password" name="matkhau" required>

Họ tên
<input type="text" name="ten_kh">

Giới tính
<select name="gioitinh">
<option value="Nam">Nam</option>
<option value="Nữ">Nữ</option>
</select>

Địa chỉ
<input type="text" name="diachi">

Điện thoại
<input type="text" name="dienthoai">

Email
<input type="email" name="email">

Ngày sinh
<input type="date" name="ngaysinh">

CCCD
<input type="text" name="cccd">

<button type="submit" name="btn_dk">Đăng ký</button>

</form>

<p>Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>

</div>