<?php
include("db.php");
$post_id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM `msg` WHERE `id` = $post_id";
$res = mysqli_query($link, $sql);
$post = mysqli_fetch_assoc($res);

if (!$post) {
    echo "<div class='post-card'>貼文不存在。</div>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    $comment = mysqli_real_escape_string($link, $_POST['comment']);
    $user = $_SESSION["acc"] ?? '匿名';
    $sql_insert = "INSERT INTO `comments` (`post_id`, `user`, `comment`) VALUES ('$post_id', '$user', '$comment')";
    mysqli_query($link, $sql_insert);
    header("Location: msg.php?id=$post_id");
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言功能</title>
    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 60px;
            height: 100%;
            background-color: #1e1e1e;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.4);
        }
        .back-btn {
            font-size: 24px;
            color: #f0f0f0;
            text-decoration: none;
            background-color: #333;
            padding: 8px 12px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .back-btn:hover {
            background-color: #555;
        }
        .main-content {
            margin-left: 80px;
            padding: 20px;
        }
        .post-card {
            background-color: #1e1e1e;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 700px;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
        }
        .post-card img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 10px;
        }
        .comment-form {
            background-color: #2a2a2a;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 700px;
        }
        .comment-form textarea {
            width: 100%;
            height: 100px;
            border: none;
            border-radius: 5px;
            padding: 10px;
            resize: vertical;
            font-size: 16px;
            background-color: #333;
            color: #fff;
        }
        .comment-form button {
            margin-top: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .comment-form button:hover {
            background-color: #45a049;
        }
        .comment {
            background-color: #1c1c1c;
            border-left: 5px solid #4caf50;
            padding: 15px;
            margin: 10px auto;
            max-width: 700px;
            border-radius: 8px;
            position: relative;
        }
        .comment .time {
            font-size: 12px;
            color: #aaa;
            margin-top: 5px;
        }
        h2 {
            color: #90caf9;
        }
        strong {
            color: #ffcc80;
        }
        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .delete-btn form {
            position: relative;
            display: inline-block;
        }
        .delete-btn button {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #888;
            position: relative;
        }
        .delete-btn .tooltip {
            display: none;
            position: absolute;
            top: -28px;
            right: 0;
            background-color: #ffffff;
            color: #000;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            z-index: 10;
        }
        .delete-btn button:hover .tooltip {
            display: block;
        }
        
        .dots {
            font-size: 20px;
            color: #888;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="index.php" class="back-btn">&lt;</a>
</div>

<div class="main-content">
    <div class='post-card'>
        <h2><?= htmlspecialchars($post['title']) ?></h2>
        <p><?= nl2br(htmlspecialchars($post['text'])) ?></p>
        <?php if (!empty($post['img'])): ?>
            <img src="<?= htmlspecialchars($post['img']) ?>" class='post-image'>
        <?php endif; ?>
        <p>發布者: <?= htmlspecialchars($post['acc']) ?> | 發布時間: <?= $post['addtime'] ?></p>
    </div>

    <form method='post' class='comment-form'>
        <h3>留言</h3>
        <textarea name='comment' required placeholder='輸入留言內容'></textarea><br>
        <button type='submit'>送出留言</button>
    </form>

    <?php
    $sql_comments = "SELECT * FROM comments WHERE post_id = $post_id ORDER BY addtime DESC";
    $res_comments = mysqli_query($link, $sql_comments);

    while ($row = mysqli_fetch_assoc($res_comments)) {
        echo "<div class='comment'>";
        echo "<p><strong>" . htmlspecialchars($row['user']) . "</strong> 說：</p>";
        echo "<p>" . nl2br(htmlspecialchars($row['comment'])) . "</p>";
        echo "<p class='time'>{$row['addtime']}</p>";

        if (isset($_SESSION["acc"]) && $_SESSION["acc"] === $row['user']) {
            echo "
            <div class='delete-btn'>
                <form method='post' action='delete_comment.php' onsubmit='return confirm(\"確定刪除這則留言嗎？\");'>
                    <input type='hidden' name='comment_id' value='{$row['id']}'>
                    <input type='hidden' name='post_id' value='{$post_id}'>
                    <button type='submit' title='刪除這則留言'>
                        <span class='dots'>⋯</span>
                        <span class='tooltip'>刪除</span>
                    </button>
                </form>
            </div>";
        }

        echo "</div>";
    }
    ?>
</div>

</body>
</html>
