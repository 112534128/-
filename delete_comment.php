<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["comment_id"])) {
    $comment_id = intval($_POST["comment_id"]);
    $current_user = $_SESSION["acc"] ?? '';

    // 檢查該留言是目前登入者發的
    $check_sql = "SELECT * FROM comments WHERE id = $comment_id AND user = '$current_user'";
    $check_result = mysqli_query($link, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $delete_sql = "DELETE FROM comments WHERE id = $comment_id";
        mysqli_query($link, $delete_sql);
    }
}

// 刪完回原本頁面
$referer = $_SERVER['HTTP_REFERER'] ?? 'msg.php';
header("Location: $referer");
exit;
?>
