<?php
include "db.php";
include("sidebar.php");
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
        #confirmModal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255,255,255,0.2);
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
        <input type="text" name="pwd" id="pwd1" placeholder="新密碼（不修改可留空）"><br>
        <button type="button" onclick="confirmPassword()">更新資料</button>
    </form>
</div>

<!-- 密碼二次輸入彈窗 -->
<div id="confirmModal">
    <h3>請再次輸入新密碼</h3>
    <input type="password" id="pwd2" placeholder="再次輸入密碼" style="padding:8px; border-radius:5px;"><br><br>
    <button onclick="submitIfMatch()">確認</button>
    <button onclick="closeModal()">取消</button>
</div>

<script>
function confirmPassword() {
    const pwd = document.getElementById('pwd1').value;
    if (pwd === '') {
        // 沒輸入密碼視為不更改，直接送出
        document.querySelector('form').submit();
    } else {
        // 彈出確認視窗
        document.getElementById('confirmModal').style.display = 'block';
    }
}

function closeModal() {
    document.getElementById('confirmModal').style.display = 'none';
}

function submitIfMatch() {
    const pwd1 = document.getElementById('pwd1').value;
    const pwd2 = document.getElementById('pwd2').value;
    if (pwd1 === pwd2) {
        document.querySelector('form').submit();
    } else {
        alert("兩次輸入的密碼不一致，請重新輸入！");
    }
}
</script>

</body>
</html>
