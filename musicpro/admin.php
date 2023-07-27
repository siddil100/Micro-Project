<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">Admin <b>Dashboard</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<i class="fa fa-user" aria-hidden="true"></i>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/user.jpg">
				<h4>Admin</h4>
			</div>
			<ul>
				<li>
					<a href="adminupd.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Add more songs</span>
					</a>
				</li>
				
				
				<li>
					<a href="logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
<style>
body  {
  background-image: url("music3.jpg");
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
<?php
include 'dbcon.php';
?>
<section class="section-1">
<h1>WELCOME ADMIN</h1>
<form action="admin_search.php" method="post">
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
<th>Edit</th>
<th>Delete
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
  <td><a href="edit.php?abc=<?php echo $row["aid"];?>">Edit</a></td>
  <td><a href="delete.php?xyz=<?php echo $row["aid"];?>">Remove</a></td>
  </tr>
  
<?php
}
?>
</table>

		</section>
	</div>

</body>
</html>