<?php
include "db.php";  // 引入資料庫連接

// 確保接收到 POST 參數
$acc = $_POST["acc"];
$pwd = $_POST["pwd"];
// 檢查帳號是否存在
$sql = "SELECT * FROM `user` WHERE `acc` = '$acc'";
$res = mysqli_query($link, $sql);

// 如果查詢到該帳號
if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);

    if ($pwd == $row['pwd']) {
        $_SESSION['acc'] = $row['acc'];
        $_SESSION['type'] = $row['type'];
        if ($row['type'] == "u") {
            header("Location: index.php"); 
        } elseif ($row['type'] == "a") {
            header("Location: a.php"); 
        }
        exit(); 
    } else {
        echo "<script>alert('帳號或密碼錯誤'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('帳號或密碼錯誤'); window.location.href='login.php';</script>";
}
?>
