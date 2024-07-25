<?php session_start(); ?>
<html>
<head>
	<title>Beranda</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Selamat Datang Di CRUD LSP!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		<div class="welcome">
			Selamat Datang <?php echo $_SESSION['Nama'] ?> ! <a href='logout.php' class="button">Logout</a>
		</div>
		<br/>
		<div class="button-container">
			<a href='view.php' class='button'>Lihat Dan Tambah Data Mahasiswa</a>
		</div>
		<br/><br/>
	<?php	
    } else {
        echo '<div class="welcome">';
        echo 'Sebelum Melanjutkan silakan login atau registrasi.<br/><br/>';
        echo '</div>';
        echo '<div class="button-container">';
        echo '<a href="login.php" class="button">Login</a> | <a href="register.php" class="button">Register</a>';
        echo '</div>';
    }
    ?>	

	<div id="footer">
		Dibuat Oleh <a href="https://www.linkedin.com/in/kevin-heryadi-yunior-75a7b0138/" title="CRUD LSP">Kevin Heryadi Yunior</a>
	</div>
</body>
</html>
