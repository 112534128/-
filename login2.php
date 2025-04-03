<?php
include "db.php";
$acc=$_POST["acc"];
$pwd=$_POST["pwd"];
$sql="SELECT * FROM `user` WHERE `acc`='$acc'";
$res=mysqli_query($link,$sql);
if(mysqli_num_rows($res)>0){
    $sql="SELECT * FROM `user` WHERE `acc`='$acc' and `pwd`='$pwd'";
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $_SESSION['acc']=$row['acc'];
            if($row['type']=="u"){
                header("location:index.php");
            }elseif($row['type']=="a"){
                header("location:a.php");
            }
        }
    }else{
        echo "alert('帳號或密碼錯誤');";
    }
}else{
    echo "alert('帳號或密碼錯誤');";
}
?>