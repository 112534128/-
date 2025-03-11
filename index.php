<?php
session_start();
?>

<!DOCTYPE html>
<html lang="zh-TW">
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
                    <h1>問答論壇</h1>
                    <button class="nav-button" onclick="location.href='category.php'">分類</button>
                    <button class="nav-button" onclick="location.href='ranking.php'">排行榜</button>
                    <button class="nav-button" onclick="location.href='vote.php'">投票</button>
                    <button class="nav-button" onclick="location.href='new_proposal.php'">新增提案</button>
                </div>

                <form class="search-form">
                    <input type="text" placeholder="搜尋">
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
                            <a href="logout.php">登出</a>
                        </div>
                    </div>
                <?php else: ?>
                    <button class="login" onclick="location.href='login.php'">登入</button>
                <?php endif; ?>
            </header>
        </td>
    </tr>
</table>
</body>
</html>
