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
        gap: 10px; /* 設定間距 */
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
</style>
</head>
<body>
<script>
function toggleDropdown() {
    var menu = document.getElementById("dropdownMenu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

// 點擊其他地方關閉選單
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
                    <button class="nav-button" onclick="location.href='category.php'">分類</button>
                    <button class="nav-button" onclick="location.href='ranking.php'">排行榜</button>
                    <button class="nav-button" onclick="location.href='vote.php'">投票</button>
                    <?php
                    if (isset($_SESSION['acc']) && !empty($_SESSION['acc'])) {
                        echo "<button class='nav-button' onclick=\"location.href='new_proposal.php'\">新增提案</button>";
                    } else {
                        echo "<button class='nav-button' onclick=\"alert('請先登入')\">新增提案</button>";
                    }
                    ?>
                </div>

                <form class="search-form">
                <input type="text" name="keyword" placeholder="搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
                    <button type="submit">搜尋</button>
                </form>

                <?php if (isset($_SESSION['acc'])): ?>
                    <?php
                        $avatarDir = "uploads/";
                        $defaultAvatar = "pngtree-default-male-avatar-png-image_2811083.jpg";

                        $userAvatar = $avatarDir . $_SESSION['acc'] . ".jpg";
                        $avatarPath = file_exists($userAvatar) ? $userAvatar : $defaultAvatar;
                    ?>
                    <div class="aaa">
                        <span>您好</span>
                        <img id="avatar" src="<?php echo $avatarPath; ?>" alt="使用者頭像" class="avatar" onclick="toggleDropdown()">
                        
                        <div id="dropdownMenu" class="dropdown-menu">
                            <a href="upload_avatar.php">更換頭像</a>
                            <a href="profile.php">查看個人資料</a>
                            <a href="collect.php">收藏的貼文</a>
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
        <td style="width:100%" style="height:100%">
        <?php
    $sql="SELECT * FROM `msg` WHERE 1";
    $res=mysqli_query($link,$sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
        echo "<table  border='1' style='width:700px;' align='center'>";
        echo "<tr style='50px'>";
        echo "<td style='width: 500px;'>title: " . $row['title'] . "</td>";
        echo "<td style='200px;'>發布者:".$row['acc']."</td>";
        echo "</tr>";
        echo "<tr style='height:300px;'>";
        echo "<td colspan='2'>text: ".$row['text']."<br><img src='".$row['img']."' width='200' height='200'></td>";  
        echo "</tr>";
        echo "<tr style='height:50px'>";
        echo "<td style='width:500px'>發布時間:".$row['addtime']."更新時間:".$row['uptime']."</td>";
        if (isset($_SESSION["acc"]) && $_SESSION["acc"] == $row['acc']) {
            echo "<td style='width:200px'><input type='button' value='刪除' onclick=\"location.href='dele.php?id=".$row['id']."'\" ></td>";
        } else {
            echo "<td></td>";
        } 
        echo "</tr>";
        echo "</table>";
        }
    }
    ?>
    </form>
        </td>
    </tr>
</table>
</body>
</html>
