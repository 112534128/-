<?php 
include 'db.php';
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>你發布的貼文</title>
    <style>
        body {
            background-color: #121212;
            color: white;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #ffcc00;
            margin-bottom: 30px;
        }

        .post-card {
            background-color: #1e1e1e;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 700px;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .post-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 15px rgba(255, 255, 255, 0.2);
        }

        .post-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
        }

        .post-header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid #555;
        }

        .post-title {
            font-size: 20px;
            color: #bb86fc;
            margin: 0;
        }

        .post-author {
            font-size: 14px;
            color: #a0a0a0;
        }

        .post-content {
            padding: 15px 0;
        }

        .post-content p {
            font-size: 16px;
            line-height: 1.6;
        }

        .post-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
            box-shadow: 0 2px 8px rgba(255, 255, 255, 0.1);
        }

        .post-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            border-top: 1px solid #333;
            padding-top: 10px;
            color: #a0a0a0;
            flex-wrap: wrap;
        }

        .post-actions {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .delete-btn {
            background: transparent;
            border: 1px solid #666;
            color: #ccc;
            font-size: 14px;
            cursor: pointer;
            padding: 6px 12px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #444;
            color: white;
            border-color: white;
        }

        .no-post {
            text-align: center;
            margin-top: 50px;
            font-size: 18px;
            color: #aaa;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION["acc"])) {
    $acc = $_SESSION["acc"];
    $sql = "
        SELECT msg.*, user.avatar 
        FROM msg 
        JOIN user ON msg.acc = user.acc 
        WHERE msg.acc = '$acc' 
        ORDER BY msg.addtime DESC
    ";
    $res = mysqli_query($link, $sql);

    echo "<h2>你發布的貼文</h2>";

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $title = htmlspecialchars($row['title']);
            $text = nl2br(htmlspecialchars($row['text']));
            $acc = htmlspecialchars($row['acc']);
            $img = htmlspecialchars($row['img']);
            $avatar = htmlspecialchars($row['avatar'] ?: 'pngtree-default-male-avatar-png-image_2811083.jpg');

            echo "<div class='post-card'>";
            echo "<div class='post-header'>";
            echo "<div class='post-header-left'>";
            echo "<img src='{$avatar}' class='avatar'>";
            echo "<div>";
            echo "<h3 class='post-title'>{$title}</h3>";
            echo "<span class='post-author'>發布者: {$acc}</span>";
            echo "</div>";
            echo "</div>";
            echo "</div>"; // header

            echo "<div class='post-content'>";
            echo "<p>{$text}</p>";
            if (!empty($img)) {
                echo "<img src='{$img}' alt='貼文圖片' class='post-image'>";
            }
            echo "</div>";

            echo "<div class='post-footer'>";
            echo "<span>發布時間: {$row['addtime']} | 更新時間: " . ($row['uptime'] ?: '無') . "</span>";
            echo "<div class='post-actions'>";
            echo "<button class='delete-btn' onclick=\"location.href='dele.php?id={$row['id']}'\">🗑 刪除</button>";
            echo "<button class='delete-btn' onclick=\"location.href='updata.php?id={$row['id']}'\">✏ 編輯</button>";
            echo "<button class='delete-btn' onclick=\"location.href='msg.php?id={$row['id']}'\">🗨 留言</button>";
            echo "</div>";
            echo "</div>"; // footer
            echo "</div>"; // post-card
        }
    } else {
        echo "<p class='no-post'>你還沒有發表任何貼文。</p>";
    }
} else {
    echo "<p class='no-post'>請先登入以查看你發布的貼文。</p>";
}
?>

</body>
</html>
