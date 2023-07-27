<?php
include'dbcon.php';
session_start();
?>
<style>
body  {
  background-image: url("img/musichome.jpg");
}

tr:hover {background-color: red;}
</style>
<h1 align="center" style="color:white;">Welcome to the World of Music</h1>
<center>
<form method="post" action="#">
<table border="2" style="background-color:#ffff33;">
<tr>
<td>Enter Username:</td>
<td><input type="text" name="username" required>
</td></tr>
<tr>
<td>Enter Password:</td>
<td><input type="text" name="password" required>
</td></tr>
<tr>
<tr>
<td>
</td>
<td><input type="submit" name="save">
</td>
</tr>
<tr>
<td>Not a user</td>
<td><a href="reg.php">Register</a></td></tr>
</table>
</form>
<?php 

if(isset($_POST['save'])){
    include'dbcon.php';
    $uname=$_POST['username'];
    $password=$_POST['password'];
	$aduser="admin";
	$adpass="admin";
	#$_SESSION["user"] = $uname; 
    $sql="select * from logintb where username='".$uname."'AND Password='".$password."' limit 1";
    
    $result=mysqli_query($con,$sql);
if($uname and $password==$aduser)
	{
		header("Location: admin.php");
		exit;
	}
else
{
    if(mysqli_num_rows($result)==1){
		
        echo " You Have Successfully Logged in"; 
		
		$_SESSION["user"] = $uname; 
        header("Location: view.php");
		exit;
    }
    else{
		
        echo " You Have Entered Incorrect Credentials";
        exit();
    }
        
}
}

?>