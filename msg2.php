<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $post_id = $_POST['post_id'] ?? 0;
    $comment = trim($_POST['comment']);
    $user = $_SESSION['acc'] ?? '匿名';

    if ($post_id && !empty($comment)) {
        $post_id = (int)$post_id;
        $user = mysqli_real_escape_string($link, $user);
        $comment = mysqli_real_escape_string($link, $comment);

        $sql = "INSERT INTO `comments` (`post_id`, `user`, `comment`) 
                VALUES ('$post_id', '$user', '$comment')";

        if (mysqli_query($link, $sql)) {
            header("Location: msg.php?id=$post_id");
            exit;
        } else {
            echo "留言失敗：" . mysqli_error($link);
        }
    } else {
        echo "留言內容或貼文 ID 不可為空";
    }
}
?>
