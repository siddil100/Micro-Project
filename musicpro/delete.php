<?php
echo("delete page");
include 'dbcon.php';
$var=$_GET["xyz"];
echo($var);
$nresult=mysqli_query($con,"SELECT * FROM `audiotb`");
$row=mysqli_fetch_array($nresult);
$result=mysqli_query($con,"DELETE FROM `audiotb` WHERE `aid`='$var'");
unlink("mpup/".$row["audio"]);
header("location:admin.php");
?>