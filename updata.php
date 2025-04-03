<?php
include "db.php";
if (!isset($_GET['id'])) {
    echo "無效的貼文 ID";
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM `msg` WHERE id='$id'";
$res = mysqli_query($link, $sql);

if ($row = mysqli_fetch_assoc($res)) {
    $title = $row['title'];
    $text = $row['text'];
    $img = $row['img'];
} else {
    echo "找不到該貼文";
    exit;
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改貼文</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url('picture/aa.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.container {
    background-color: white;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 100%;
    max-width: 600px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4B0082;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #28004D;
}

#message {
    text-align: center;
    margin-top: 10px;
    font-size: 16px;
    color: green;
}
</style>
<body>

    <div class="container">
        <h2>修改貼文</h2>

        <form id="postForm" action="updata2.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="title">標題：</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" required>

            <label for="content">內容：</label>
            <textarea id="content" name="text" rows="5"><?php echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); ?></textarea>

            <label for="img">圖片:</label>
            <input type="file" name="img">
            <?php if (!empty($img)) { ?>
                <div>
                    <p>目前圖片：</p>
                    <img src="<?php echo $img; ?>" width="200" height="200" alt="貼文圖片">
                </div>
            <?php } ?>

            <button type="submit">修改</button>
        </form>

        <div id="message"></div>
    </div>

</body>
</html>
