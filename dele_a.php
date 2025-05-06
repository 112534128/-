<?php
include "db.php";
$id=$_GET["id"];
$sql="DELETE FROM `announcement` WHERE `id`='$id'";
mysqli_query($link,$sql);
if(mysqli_query($link,$sql)){
    echo "<script>location.href='index.php'</script>";
}else{
    echo "<script>location.href='index.php'</script>";
}
?>
