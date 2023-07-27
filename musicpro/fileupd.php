<h1 align="center"> <font color="white">Contribute to Music Library </font> </h1>
<body background="img/music1.png" width="1366" height="768">
<form action="#" method="post" enctype="multipart/form-data">
<table border="2" width="40%" height="600px" align="center" bgcolor="black">
<tr>
<td><font color="yellow">Enter Song Name:</td>
<td><input type="text" name="t0" required>
</td></tr>
<tr>
<td><font color="yellow">Enter Movie Name:</td>
<td><input type="text" name="t1" required>
</td></tr>
<tr>
<td><font color="yellow">Enter Singer Name</td>
<td><input type="text" name="t2" required>
</td></tr>
<tr>
<td><font color="yellow">Enter Release Date</td>
<td><input type="date" name="t3" required>
</td></tr>
<tr>
<td><font color="yellow">Select Audio File</td>
<td><input type="file" name="t6">
</td></tr>
<tr>
<tr>
<td><input type="submit" name="save">
</td>
</tr>
</table>
</form>
<?php
include 'dbcon.php'; 
if(isset($_POST["save"]))
{
$sn=$_POST["t0"];
$m=$_POST["t1"];
$s=$_POST["t2"];
$r=$_POST["t3"];
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
    echo "Sorry, your file was not uploaded please select a valid file.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["t6"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["t6"]["name"]). " has been uploaded.";
		$iname=$_FILES["t6"]["name"];
$sql="INSERT INTO `audiotb`(`audio`,`movie`,`singer`,`releaseyear`,`songname`) VALUES ('$iname','$m','$s','$r','$sn')";
$result=mysqli_query($con,$sql);
echo("Upload Successfull :)");
header("location:view.php");
exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>