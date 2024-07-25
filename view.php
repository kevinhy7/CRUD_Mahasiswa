<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM Mahasiswa WHERE Login_id=".$_SESSION['Id']." ORDER BY Id DESC");
?>

<html>
<head>
	<title>Beranda</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="nav">
		<a href="index.php">Beranda</a> | 
		<a href="add.html">Tambah Data Baru</a> | 
		<a href="logout.php">Logout</a>
	</div>
	<br/><br/>
	
	<table class="data-table" width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Nim</td>
			<td>Nama</td>
			<td>Sex</td>
			<td>Prodi / Jurusan</td>
			<td>Tanggal masuk</td>
			<td>Update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {			
			echo "<tr>";
			echo "<td>".$res['Nim']."</td>";
			echo "<td>".$res['Nama']."</td>";
			echo "<td>".$res['Sex']."</td>";
			echo "<td>".$res['Prodi_Jurusan']."</td>";
			echo "<td>".$res['Tanggal_masuk']."</td>";	
			echo "<td>
					<a href=\"edit.php?Id=$res[Id]\" class='edit-btn'>Edit</a>     | 
					<a href=\"delete.php?Id=$res[Id]\" class='delete-btn' onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
				  </td>";		
		}
		?>
	</table>	
</body>
</html>
