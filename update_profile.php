<?php
include "db.php";
$acc = $_SESSION['acc'];
$new_acc = $_POST['acc']; 
$pwd = $_POST['pwd'];


$sql = "UPDATE user SET ";
$params = [];
$types = "";

if (!empty($new_acc) && $new_acc !== $acc) {
    $sql .= "acc = ?, ";
    $params[] = $new_acc;
    $types .= "s";
}

if (!empty($pwd)) {
    $sql .= "pwd = ?, "; 
    $params[] = $pwd;
    $types .= "s";
}

$sql = rtrim($sql, ", ");
$sql .= " WHERE acc = ?";
$params[] = $acc;
$types .= "s";
$stmt = $link->prepare($sql);
$stmt->bind_param($types, ...$params);
if ($stmt->execute()) {
    echo "<script>alert('更新成功'); location.href='index.php';</script>";
} else {
    echo "<script>alert('更新失敗'); location.href='index.php';</script>";
}
?>
