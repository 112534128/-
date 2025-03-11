<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "db.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊</title>
</head>
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
        .aa{
        font-weight: bold;
    }
</style>
<body align="center">
    <div>
    <h2>註冊</h2>
    <form action="register2.php" method="post">
    <table align="center" border="1">
        <tr>
            <td class="aa">帳號</td><td><input type="text" name="acc"></td>
        </tr>
        <tr>
            <td class="aa">密碼</td><td><input type="text" name="pwd"></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><input type="submit" value="註冊"></td>
        </tr>
    </table>
    </form>
    </div>
</body>
</html>