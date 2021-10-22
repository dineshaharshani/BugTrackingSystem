<?php
include '../connection.php';
extract($_POST);
$sql="DELETE  FROM institutions  WHERE Ins_Id='$Ins_Id'";
$conn->query($sql);
header("Location:institutes.php");
?>