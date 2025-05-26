<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "db.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <style>
        body {
            background: white;
            color: black;
            text-align: center;
            background-image: url('picture/1.jpg');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
        }
        .t1 {
            text-decoration: none;
            color:blue;
        }
        table {
            margin: auto;
        }
        .login{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .aa{
        font-weight: bold;
    }
    </style>
</head>
<body>
    <div class="login">
        
    <form action="login2.php" method="post">
        <table border="1">
            <tr>
                <h2>登入</h2>
            </tr>
        <tr>
                <td class="aa" >帳號</td>
                <td><input type="text" name="acc" required></td>
            </tr>
            <tr>
                <td class="aa">密碼</td>
                <td><input type="password" name="pwd" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="登入"></td>
            </tr>
        </table>
        <tr>
            <td><a href="register.php" class="t1">註冊</a></td>
        </tr>
    </form>
    </div>
</body>
</html>
