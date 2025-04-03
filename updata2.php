<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = intval($_POST['id']); // 取得要更新的貼文 ID
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $text = mysqli_real_escape_string($link, $_POST['text']);
    $uptime = date('Y-m-d H:i:s'); // 設定更新時間

    // 先查詢目前的圖片名稱
    $sql = "SELECT img FROM `msg` WHERE id='$id'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($res);
    $currentImg = $row['img']; // 原本的圖片路徑

    // 處理圖片上傳
    if ($_FILES['img']['error'] == 0) { 
        $imgName = "uploads/" . basename($_FILES['img']['name']); 
        move_uploaded_file($_FILES['img']['tmp_name'], $imgName);
    } else {
        $imgName = $currentImg; // 沒上傳圖片就用原本的
    }

    // 更新資料庫
    $sql = "UPDATE `msg` SET `title`='$title', `text`='$text', `img`='$imgName', `uptime`='$uptime' WHERE `id`='$id'";
    
    if (mysqli_query($link, $sql)) {
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "更新失敗: " . mysqli_error($link);
    }
}
?>
