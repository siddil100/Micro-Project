<h1 align="center" style="color:gold;">Registration Form</h1>
<body background="img/music1.png" width="1366" height="768">
<form action="#" method="post">
<table border="2" width="40%" height="600px" align="center" bgcolor="black">
<tr>
<td><font color="yellow">Enter your Name:</td>
<td><input type="text" name="t0" required>
</td></tr>
<tr>
<td><font color="yellow">Enter Address:</td>
<td><input type="textarea" name="t1" required>
</td></tr>
<tr>
<td><font color="yellow">Enter Phone No:</td>
<td><input type="text" name="t2">
</td></tr>
<tr>
<td><font color="yellow">Select Gender:</td>
<td><font color="yellow"><input type="radio" name="t3" value="male">Male
<input type="radio" name="t3" value="female">Female
</td></tr>
<tr>
<td><font color="yellow">Enter Username:</td>
<td><input type="text" name="t4" required id="usr">
</td></tr>
<tr>
<td><font color="yellow">Enter password:</td>
<td><input type="password" name="t5" required id="pass">
</td></tr>
<tr>
<td><font color="yellow">Confirm password:</td>
<td><input type="password" name="t5t" required id="pass2">
</td></tr>
<tr>
<tr>
<td>
</td>
<td><input type="submit" name="save" onclick="return val();"/>
</td>
</tr>
</table>
</form>
<script>
function val(){
	var pass=document.getElementById("pass").value
	var pass2=document.getElementById("pass2").value
	var usr=document.getElementById("usr").value
	var ele=document.getElementById("usr")


	if(pass!=pass2){
		alert("passwords doesnt match");
		return false;
	}
	  var re = /^[A-Za-z]+$/;
	  if(re.test(usr)){
		  return true;
	  }
		  else{
		ele.style.border="red solid 3px"
return false;
			  
		  }
}
</script>

<?php
include 'dbcon.php'; 
if(isset($_POST["save"]))
{
$name=$_POST["t0"];
$address=$_POST["t1"];
$ph=$_POST["t2"];
$ge=$_POST["t3"];
$usr=$_POST["t4"];
$pass=$_POST["t5"];
$sql="INSERT INTO `reg`(`name`, `address`, `phone`, `gender`) VALUES ('$name','$address','$ph','$ge')";
$result=mysqli_query($con,$sql);
$sql1="INSERT INTO `logintb`(`username`, `password`) VALUES ('$usr','$pass')";
$result1=mysqli_query($con,$sql1);
header("location:index.php");
exit();
}
?>