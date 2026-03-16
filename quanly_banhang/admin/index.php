<?php
    include("connect.php");
    header("location:quanlyKH.php");
?>
<?php
session_start();

if($_SESSION['quantri_kh']!=1){
echo "Bạn không có quyền vào trang này";
exit();
}
?>