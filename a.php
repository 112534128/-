<?php
include "db.php";
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $sql = "DELETE FROM msg WHERE id = $delete_id";
    if (mysqli_query($link, $sql)) {
        echo "<script>alert('貼文已刪除'); location.href='a.php';</script>";
    } else {
        echo "<script>alert('刪除失敗');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['announcement'])) {
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $content = mysqli_real_escape_string($link, $_POST['content']);
    $sql = "INSERT INTO announcement (title, text, acc, is_announcement) VALUES ('$title', '$content', '管理員', 1)";
    
    if (mysqli_query($link, $sql)) {
        echo "<script>alert('公告已發布'); location.href='a.php';</script>";
    } else {
        echo "<script>alert('發布失敗');</script>";
    }
}

$sql = "SELECT * FROM msg ORDER BY addtime DESC";
$res = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者介面</title>
    <style>
        body {
            background-color: #181818;
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .post-card {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
            transition: 0.3s;
        }
        .announcement {
            background-color: #3a3a3a; 
            font-weight: bold;
        }
        .delete-btn {
            background-color: #ff5555;
            border: none;
            padding: 8px 12px;
            color: white;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #ff3333;
        }
        .announcement-form {
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        input, textarea, button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        a{
            background-color: #ff5555;
            border: none;
            padding: 8px 12px;
            color: white;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        a{
            background-color: #ff3333;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div><h1>管理者介面</h1></div>
            <a href="logout.php" >登出</a>
            <a href="index.php" >首頁</a>
        </header>
        <div class="announcement-form">
            <h2>發布公告</h2>
            <form method="POST">
                <input type="text" name="title" placeholder="公告標題" required>
                <textarea name="content" placeholder="公告內容" required></textarea>
                <button type="submit" name="announcement">發布公告</button>
            </form>
        </div>

        <h2>所有貼文</h2>
        <?php while ($row = mysqli_fetch_assoc($res)): ?>
            <div class="post-card">
                <h3><?= htmlspecialchars($row['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars($row['text'])) ?></p>
                <p><small>發布者: <?= htmlspecialchars($row['acc']) ?> | 時間: <?= $row['addtime'] ?></small></p>
                <button class="delete-btn" onclick="location.href='a.php?delete_id=<?= $row['id'] ?>'">刪除</button>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
