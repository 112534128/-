<!DOCTYPE html>
<html lang="en">
    <?php 
    include ("db.php");
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forum</title>
</head>
<style>
    .w{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login {
        display: flex;
        padding: 5px;
        font-size: 50px;
        background-color: #000079;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        text-decoration: none;
        border: none;
    }
    .login:hover {
    background-color:	#28004D;
}
</style>
<body>
    <div class="w">
        <button align="center" class="login" onclick="location.href='login.php'">登入</button>
    </div>
</body>
</html>