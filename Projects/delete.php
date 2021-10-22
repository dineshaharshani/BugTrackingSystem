<?php
include '../connection.php';
extract($_POST);
$sql="DELETE  FROM projects WHERE ProjectId='$ProjectId'";
$conn->query($sql);
header("Location:projects.php");
?>
