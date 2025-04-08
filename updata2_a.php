<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = intval($_POST['id']); // 取得要更新的貼文 ID
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $text = mysqli_real_escape_string($link, $_POST['text']);
    $uptime = date('Y-m-d H:i:s');
    $sql = "UPDATE `announcement` SET `title`='$title', `text`='$text', `uptime`='$uptime' WHERE `id`='$id'";
    
    if (mysqli_query($link, $sql)) {
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "更新失敗: " . mysqli_error($link);
    }
}
?>
