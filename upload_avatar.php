<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "db.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更改頭像</title>
    <style>
        body {
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="file"] {
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color:rgb(22, 58, 185);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color:rgb(21, 10, 140);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>更改頭像</h2>
        <form action="upload_avatar2.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="avatar" ><br>
            <input type="submit" value="更改">
        </form>
    </div>
</body>
</html>
