<?php
include "db.php";
$acc=$_SESSION["acc"];
$title=$_POST["title"];
$text=$_POST["text"];
$img_path='';
if(!empty($_FILES["img"]["name"])){
    $img_path="img/" . $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],$img_path);
}
$sql="INSERT INTO `msg`(`id`, `acc`, `title`, `text`,`img`, `addtime`, `uptime`)
 VALUES (null,'$acc','$title','$text','$img_path',NOW(),null)";
 $res=mysqli_query($link,$sql);
 echo "<script>location='index.php'</script>"
?>