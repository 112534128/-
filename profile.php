<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人頁面</title>
</head>
<body><?php
include("sidebar.php");
include "db.php";
$acc = $_SESSION['acc'];
$sql = "SELECT * FROM user WHERE acc = '$acc'";
$res = mysqli_query($link, $sql);
$user = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>個人頁面</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #121212;
            color: white;
            font-family: Arial, sans-serif;
        }
        .profile-container {
            max-width: 500px;
            margin: 50px auto;
            background: #1e1e1e;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        h2 {
            margin-bottom: 10px;
        }
        .info {
            margin: 10px 0;
            font-size: 16px;
            color: #bbb;
        }
        .btn {
            padding: 10px 20px;
            background-color: #bb86fc;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #9c64fb;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img class="profile-avatar" src="<?php echo $user['avatar'] ?: 'pngtree-default-male-avatar-png-image_2811083.jpg'; ?>" alt="頭像">
        <h2><?php echo htmlspecialchars($user['acc']); ?></h2>
        <a class="btn" href="edit_profile.php">編輯個人資料</a>
    </div>
</body>
</html>

    
</body>
</html>