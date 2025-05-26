<?php 
include 'db.php'; 
include 'sidebar.php';
?>
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
<?php
$sql_announcement = "SELECT * FROM `announcement` ORDER BY `addtime` DESC";
$res_announcement = mysqli_query($link, $sql_announcement);

if (mysqli_num_rows($res_announcement) > 0) {
    echo "<div class='announcement-section'>";
    echo "<h2 class='announcement-title'>📢 公告區</h2>";

    while ($row_announcement = mysqli_fetch_assoc($res_announcement)) {
        echo "<div class='announcement-card'>";
        echo "<div class='post-header'>";
        echo "<h2>" . $row_announcement['title'] . "</h2>";
        echo "<span class='post-author'>發布者: " . $row_announcement['acc'] . " | " . $row_announcement['addtime'] . "</span>";
        echo "</div>";
        
        echo "<div class='post-content'>";
        echo "<p>" . nl2br($row_announcement['text']) . "</p>";
        echo "</div>";

        echo "<div class='post-footer'>";
        echo "<span>發布時間: " . $row_announcement['addtime'] . " | 更新時間: " . $row_announcement['uptime'] . "</span>";

        if (isset($_SESSION["acc"]) && $_SESSION["acc"] == 'admin') {
            echo "<button class='delete-btn' onclick=\"location.href='dele_a.php?id=" . $row_announcement['id'] . "'\">🗑</button>";
            echo "<button class='delete-btn' onclick=\"location.href='updata_a.php?id=" . $row_announcement['id'] . "'\">✏</button>";
        }        
        echo "</div>"; 

        echo "</div>"; 
    }

    echo "</div>";
}
?>
