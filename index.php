<!DOCTYPE html>
<html lang="zh-TW">
    <?php include "db.php"; ?>    
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>論壇社區</title>
<link rel="icon" href="ll.png" type="image/png" />
<style>
    table {
        width: 100%;
        height: 100%;
        border-collapse: collapse;
    }
    tr, td {
        border: 1px solid black;
        text-align: center;
    }
    .t2 {
        width: 10%;
    }
    .header {
        display: flex; 
        align-items: center; 
        justify-content: space-between;
        padding: 10px;
    }
    .header-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .nav-button {
        padding: 8px 15px;
        font-size: 16px;
        background-color: #28004D;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        border: none;
        transition: 0.3s;
    }
    .nav-button:hover {
        background-color: #4B0082;
    }
    .search-form {
        display: flex;
        justify-content: flex-end;
    }
    .login {
        display: flex;
        padding: 5px;
        font-size: 16px;
        background-color: #28004D;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        text-decoration: none;
        border: none;
    }
    .search-form input {
        padding: 5px;
        font-size: 16px;
    }
    .search-form button {
        padding: 5px 10px;
        font-size: 16px;
        cursor: pointer;
    }
    a {
        text-decoration: none;
        color: black;
    }
    .aaa {
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
    }
    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        cursor: pointer;
    }
    .dropdown-menu {
        display: none;
        position: absolute;
        top: 50px;
        right: 0;
        background: white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        width: 150px;
        z-index: 1000;
    }
    .dropdown-menu a {
        display: block;
        padding: 10px;
        color: black;
        text-decoration: none;
        font-size: 14px;
        text-align: left;
    }
    .dropdown-menu a:hover {
        background: #f0f0f0;
    }
    .post-image {
        max-width: 200px;
        max-height: 200px;
        width: auto;
        height: auto; 
        display: block;
        margin-top: 10px;
    }
    body {
        background-color: #121212;
        color: white;
        font-family: Arial, sans-serif;
    }
    .post-card {
        background-color: #1e1e1e;
        border-radius: 10px;
        padding: 20px;
        margin: 20px auto;
        max-width: 700px;
        box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .post-card:hover {
        transform: scale(1.02);
        box-shadow: 0px 6px 15px rgba(255, 255, 255, 0.2);
    }
    .post-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #333;
        padding-bottom: 10px;
    }
    .post-header h2 {
        font-size: 20px;
        margin: 0;
        color: #bb86fc;
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
        line-height: 1.5;
    }
    .post-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-top: 10px;
        box-shadow: 0px 2px 8px rgba(255, 255, 255, 0.1);
    }
    .post-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
        border-top: 1px solid #333;
        padding-top: 10px;
        color: #a0a0a0;
        gap: 10px;
    }
    
    .delete-btn {
  background: transparent;
  border: none;
  color: #ccc;
  font-size: 20px;
  cursor: pointer;
  padding: 4px 8px;
}

.delete-btn:hover {
  background-color: #888;
  color: white;
  border-radius: 5px;
}

    
    .announcement-section {
    max-width: 800px;
    margin: 30px auto;
    padding: 10px;
}

.announcement-title {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    color: #ffcc00;
    border-bottom: 2px solid #ffcc00;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.announcement-card {
    background-color: #2a2a2a;
    border-left: 5px solid #ffcc00;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 15px;
    box-shadow: 0px 4px 10px rgba(255, 255, 0, 0.3);
    transition: transform 0.3s, box-shadow 0.3s;
}

.announcement-card:hover {
    transform: scale(1.02);
    box-shadow: 0px 6px 15px rgba(255, 255, 0, 0.5);
}

.announcement-card h2 {
    font-size: 22px;
    font-weight: bold;
    color: #ffcc00;
}

.announcement-card .post-content p {
    font-size: 16px;
    font-weight: bold;
    color: white;
}

</style>
</head>
<body>
<script>
 function toggleDropdown() {
            var menu = document.getElementById("dropdownMenu");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }

document.addEventListener("click", function(event) {
    var avatar = document.getElementById("avatar");
    var menu = document.getElementById("dropdownMenu");

    if (!avatar.contains(event.target) && !menu.contains(event.target)) {
        menu.style.display = "none";
    }
});
</script>
<table>
    <tr>
        <td class="t1" colspan="2">
            <header class="header">
                <div class="header-left">
                    <div onclick="location"><h1>問答論壇</h1></div>
                    <button class="nav-button" onclick="location.href='notifications.php'">公告中心</button>
                    <button class="nav-button" onclick="location.href='Post Sorting.php'">最新排序</button>
                    <button class="nav-button" onclick="location.href='Post Sorting.php'">最舊排序</button>
                    <?php
                    if (isset($_SESSION['type']) && $_SESSION['type'] == 'a') {
                        echo "<button class='nav-button' onclick=\"location.href='a.php'\">新增公告</button>";
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['acc']) && !empty($_SESSION['acc'])) {
                        echo "<button class='nav-button' onclick=\"location.href='new_proposal.php'\">新增提案</button>";
                    } else {
                        echo "<button class='nav-button' onclick=\"alert('請先登入')\">新增提案</button>";
                    }
                    ?>
                </div>
                <form class="search-form" method="get">
                    <input type="text" name="keyword" placeholder="搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
                    <button type="submit">搜尋</button>
                </form>
                <?php if (isset($_SESSION['acc'])): ?>
                    <?php
                    $acc = $_SESSION['acc'];
                    $sql = "SELECT * FROM user WHERE acc = '$acc'";
                    $res = mysqli_query($link, $sql);
                    $user = mysqli_fetch_assoc($res);
                    ?>
                    <div class="aaa">
                        <span>您好</span>
                         <img id="avatar" src="<?php echo $user['avatar'] ?: 'pngtree-default-male-avatar-png-image_2811083.jpg'; ?>"
                           class="avatar" onclick="toggleDropdown()">                        <div id="dropdownMenu" class="dropdown-menu">
                            <a href="upload_avatar.php">更換頭像</a>
                            <a href="profile.php">查看個人資料</a>
                            <a href="collect.php">你發布的貼文</a>
                            <a href="javascript:void(0);" id="bgMusicBtn">背景音樂</a>
                            <audio id="bgMusic" loop>
                                <source src="music.php" type="audio/mpeg">
                            </audio>
                            <script>
                                const bgMusic = document.getElementById("bgMusic");
                                const bgMusicBtn = document.getElementById("bgMusicBtn");

                                let isPlaying = false;

                                bgMusicBtn.addEventListener("click", () => {
                                    if (isPlaying) {
                                        bgMusic.pause();
                                        bgMusicBtn.textContent = "播放背景音樂";
                                    } else {
                                        bgMusic.play();
                                        bgMusicBtn.textContent = "暫停背景音樂";
                                    }
                                    isPlaying = !isPlaying;
                                });
                            </script>
                            <a href="logout.php">登出</a>
                        </div>
                    </div>
                <?php else: ?>
                    <button class="login" onclick="location.href='login.php'">登入</button>
                <?php endif; ?>
            </header>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
                    $keyword = mysqli_real_escape_string($link, $_GET['keyword']);
                    $sql = "SELECT * FROM `msg` WHERE `title` LIKE '%$keyword%'";
                    $res = mysqli_query($link, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<div class='post-card' >";
                            echo "<div class='post-header'>";
                            echo "<h2>" . $row['title'] . "</h2>";
                            echo "<span class='post-author'>發布者: " . $row['acc'] . "</span>";
                            echo "</div>";
                            echo "<div class='post-content'>";
                            echo "<p>" . nl2br($row['text']) . "</p>";
                            if (!empty($row['img'])) {
                                echo "<img src='" . $row['img'] . "' alt='貼文圖片' class='post-image'>";
                            }
                            echo "</div>";
                            echo "<div class='post-footer'>";
                            echo "<span>發布時間: " . $row['addtime'] . " | 更新時間: " . $row['uptime'] . "</span>";
                            if (isset($_SESSION["acc"]) && $_SESSION["acc"] == $row['acc']) {
                                echo "<button class='delete-btn' onclick=\"location.href='dele.php?id=" . $row['id'] . "'\">🗑</button>";
                                echo "<button class='delete-btn' onclick=\"location.href='updata.php?id=" . $row['id'] . "'\">✏</button>";
                            }
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p style='text-align: center; color: white;'>🔍 查無資料，請重新輸入關鍵字。</p>";
                    }
                }
                ?>
       
            <?php
$sql = "SELECT * FROM `msg` WHERE 1 ORDER BY `addtime` DESC";
            $res = mysqli_query($link, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<div class='post-card'>";
                    echo "<div class='post-header'>";
                    echo "<h2>" . $row['title'] . "</h2>";
                    echo "<span class='post-author'>發布者: " . $row['acc'] . "</span>";
                    echo "</div>";
                    echo "<div class='post-content'>";
                    echo "<p>" . nl2br($row['text']) . "</p>";
                    if (!empty($row['img'])) {
                        echo "<img src='" . $row['img'] . "' alt='貼文圖片' class='post-image'>";
                    }
                    echo "</div>";
                    echo "<div class='post-footer'>";
                    echo "<span>發布時間: " . $row['addtime'] . " | 更新時間: " . $row['uptime'] . "</span>";
                    if (isset($_SESSION["acc"]) && $_SESSION["acc"] == $row['acc']) {
                        echo "<button class='delete-btn' onclick=\"location.href='dele.php?id=" . $row['id'] . "'\">🗑</button>";
                        echo "<button class='delete-btn' onclick=\"location.href='updata.php?id=" . $row['id'] . "'\">✏</button>";
                    }
                    if (isset($_SESSION["acc"])) {
                        echo "<button class='delete-btn' onclick=\"location.href='msg.php?id=" . $row['id'] . "'\">🗨</button>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </td>
    </tr>
</table>
</body>
</html>