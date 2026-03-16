<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "quanli_banhang_it7";
    //mở kết nối đến csdl quanli_banhang_it7
    // $conn = myspli_connect("localhost",
    //"root", "quanli_banhang_it7");
    $conn = new mysqli(hostname:$servername,
    username: $username, password: $password,
    database: $dbname);
    if ($conn->connect_error){
        die("Connect error".$conn->connect_error);
    }
   // else{
    //    echo "Connect success!";
   // }
?>
