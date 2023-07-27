<?php
include 'dbcon.php';
echo("Matchings based on your search are:");
			$sitem=$_POST["s2"];
?>
<head>
<style>
body  {
  background-image: url("img/music1.png");
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
<table bgcolor="pink" border="2">
<tr>
<th>Song Name</th>
<th>Movie</th>
<th>Singer</th>
<th>Released</th>
<th>Play</th>
</tr>
<?php
$result=mysqli_query($con,"SELECT * FROM audiotb WHERE songname LIKE '$sitem%'");
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
<a href="admin.php">Go Back</a>