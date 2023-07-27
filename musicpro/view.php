<?php
include 'dbcon.php';
session_start();
#print_r($_SESSION);
echo("Welcome back ".$_SESSION["user"]);

?>


<head>
<style>
body  {
  background-image: url("img/music3.jpg");
}
table {
  border-collapse: collapse;
  border: 2px solid green;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 2px solid #ddd;
  
}

tr:hover {background-color: coral;}
</style>
</head>

<h1 align="center" style="background-color:powderblue;">Welcome to Music Online</h1>
<a href="fileupd.php">Add more songs</a><br>
<a href="logout.php">Log Out</a>
<form action="search.php" method="post">
<br>
<input type="text" name="s2" placeholder="Based on 1st letter">
<input type="submit" name="sbutto2" value="Search"/>
</form>
		
<table bgcolor="pink">
<tr>
<th>Song Name</th>
<th>Movie</th>
<th>Singer</th>
<th>Released</th>
<th>Play</th>
</tr>
<?php
$result=mysqli_query($con,"SELECT * FROM `audiotb`");
//print_r($result);
while($row=mysqli_fetch_array($result))
{?>
  
  <tr>
  <td><?php echo $row["songname"];?></td>
  <td><?php echo $row["movie"];?></td>
  <td><?php echo $row["singer"];?></td>
  <td><?php echo $row["releaseyear"];?></td>
  <td><audio src="mpup/<?php echo($row["audio"]); ?>" controls></audio></td>
  </tr>
  
<?php
}
?>
</table>
