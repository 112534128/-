<?php
include "db.php"; 
$acc = $_SESSION["acc"];
$upload_dir = "uploads/avatars/";
$avatar_dir = "avatar/"; 
if (!empty($_FILES["avatar"]["name"])) {
    $ext = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
    $filename = uniqid("avatar_") . "." . $ext;
    $img_path_db = $upload_dir . $filename;
    $img_path_avatar = $avatar_dir . $filename;
    if (!file_exists($avatar_dir)) {
        mkdir($avatar_dir, 0777, true); 
    }
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $img_path_db)) {
        if (copy($img_path_db, $img_path_avatar)) {
            $stmt = $link->prepare("UPDATE `user` SET `avatar` = ? WHERE `acc` = ?");
            $stmt->bind_param("ss", $img_path_db, $acc);
            $stmt->execute(); 
            echo "<script>location='index.php';</script>";
        } else {
            echo "將圖片複製到 'avatar' 資料夾失敗。";
        }
    } else {
        echo "檔案上傳失敗。";
    }
} else {
    echo "請選擇圖片檔案。";
}
?>
