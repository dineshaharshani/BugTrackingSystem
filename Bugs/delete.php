<?php
include '../connection.php';
extract($_POST);
$sql="DELETE  FROM bugs  WHERE BugId='$BugId'";
$conn->query($sql);
header("Location:bugs.php");
?>
