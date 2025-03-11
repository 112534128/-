<?php
include("db.php");
$acc=$_POST['acc'];
$pwd=$_POST['pwd'];
$type="u";
$sql="INSERT INTO `user`(`id`, `acc`, `pwd`, `type`) VALUES (null,'$acc','$pwd','$type')";
$res=mysqli_query($link,$sql);
if($res>0){
    echo "<script>location.href='index.php'</script>";
}
?>