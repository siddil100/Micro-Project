<?php
include 'dbcon.php';
$var=$_GET["abc"];
$result=mysqli_query($con,"SELECT * FROM `audiotb` WHERE `aid`= '$var'");
#print_r($result);
$row=mysqli_fetch_array($result);
?>
<form action="#" method="post" enctype="multipart/form-data">
<table border="2">
<tr>
<td>Edit Song Name:<input type="text" name="t1" size="30" value="<?php echo $row["songname"];?>"/></td>
</tr>
<tr>
<td>Edit Movie Name:<input type="text" name="t2" size="30" value="<?php echo($row["movie"]);?>"></td>
</tr>
<tr>
<td>Edit Singer Name:<input type="text" name="t3" size="30" value="<?php echo($row["singer"]);?>"></td>
</tr>
<tr>
<td>Edit Release date:<input type="text" name="t4" value="<?php echo($row["releaseyear"]);?>"></td>
</tr>
<tr>
<td>Edit audio:<input type="file" name="t6"></td>
</tr>
<tr>
<td>
<input type="submit" name="save"></td>
</form>
<?php
if(isset($_POST["save"]))
{
$sn=$_POST["t1"];
$mn=$_POST["t2"];
$singer=$_POST["t3"];
$rl=$_POST["t4"];
$target_dir = "mpup/";
$target_file = $target_dir . basename($_FILES["t6"]["name"]);
$uploadOk = 1;
$audioFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
	
}
// Check file size in bytes
if ($_FILES["t6"]["size"] > 5000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats only .wav, .mp3, .wma, and .mp4 files can be uploaded
if($audioFileType != "wav" && $audioFileType != "mp3" && $audioFileType != "wma"
&& $audioFileType != "mp4" ) {
    echo "Sorry, only wav, mp3, wma & mp4 files are allowed.";
    $uploadOk = 0;
	
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["t6"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["t6"]["name"]). " has been uploaded.";
		$iname=$_FILES["t6"]["name"];
	$sql="UPDATE `audiotb` SET `audio`='$iname',`singer`='$singer',`releaseyear`='$rl',`movie`='$mn',`songname`='$sn' WHERE `aid`='$var'";
$result=mysqli_query($con,$sql);
header("location:admin.php");
exit;
echo("file to db suc");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$sql="UPDATE `audiotb` SET `singer`='$singer',`releaseyear`='$rl',`movie`='$mn',`songname`='$sn' WHERE `aid`='$var'";
$result=mysqli_query($con,$sql);
header("location:admin.php");
}
?>