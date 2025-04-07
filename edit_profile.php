<?php
include "db.php";

$acc = $_SESSION['acc'];
$sql = "SELECT * FROM user WHERE acc = '$acc'";
$res = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>個人資料</title>
    <style>
        body {
            font-family: Arial;
            background: #121212;
            color: white;
            text-align: center;
        }
        .profile-card {
            background: #1e1e1e;
            padding: 30px;
            border-radius: 10px;
            margin: 50px auto;
            max-width: 400px;
            box-shadow: 0 0 10px rgba(255,255,255,0.1);
        }
        .avatar {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="file"] {
            padding: 8px;
            width: 90%;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
        }
        button {
            padding: 10px 20px;
            background: #6200ea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #3700b3;
        }
    </style>
</head>
<body>

<div class="profile-card">
    <h2>個人資料</h2>
    <img class="avatar" src="<?php echo $row['avatar']; ?>" alt="頭像">
    <form action="update_profile.php" method="post" enctype="multipart/form-data">
        <p>帳號：<?php echo htmlspecialchars($row['acc']); ?></p>
        <input type="text" name="acc" value="<?php echo htmlspecialchars($row['acc']); ?>" placeholder="暱稱"><br>
        <input type="text" name="pwd" placeholder="新密碼（不修改可留空）"><br>
        <button type="submit">更新資料</button>
    </form>
</div>

</body>
</html>
