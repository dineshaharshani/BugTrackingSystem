<?php
include '../connection.php';
extract($_POST);
$sql="DELETE  FROM users  WHERE UserId='$UserId'";
$conn->query($sql);
header("Location:users.php");
?>