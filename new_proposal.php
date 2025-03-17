<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增貼文</title>
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
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
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
        <h2>新增貼文</h2>

        <form id="postForm" action="new_proposal2.php" method="POST" enctype="multipart/form-data">
            <label for="title">標題：</label>
            <input type="text" id="title" name="title" placeholder="輸入貼文標題" required>

            <label for="content">內容：</label>
            <textarea id="content" name="text" rows="5" placeholder="輸入貼文內容" required></textarea>
            <label for="title">圖片:</label>
            <input type="file" name="img">
            <button type="submit">新增貼文</button>
        </form>

        <div id="message"></div>
    </div>

    <script src="script.js"></script>
</body>
</html>
