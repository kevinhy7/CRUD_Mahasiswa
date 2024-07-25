<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<html>
<head>
    <title>Add Data</title>
    <link rel="stylesheet" type="text/css" href="styleadd.css">
</head>

<body>
<div class="container">
    <h1></h1>
    <?php
    //including the database connection file
    include_once("connection.php");

    if(isset($_POST['Submit'])) {    
        $Nim = $_POST['Nim'];
        $Nama = $_POST['Nama'];
        $Sex = $_POST['Sex'];
        $Prodi_Jurusan = $_POST['Prodi_Jurusan'];
        $Tanggal_masuk = $_POST['Tanggal_masuk'];
        $loginId = $_SESSION['Id'];
        
        // checking empty fields
        if(empty($Nim) || empty($Nama) || empty($Sex) || empty($Prodi_Jurusan) || empty($Tanggal_masuk)) {

            if(empty($Nim)) {
                echo "<div class='error'>Nim field is empty.</div>";
            }
                
            if(empty($Nama)) {
                echo "<div class='error'>Nama field is empty.</div>";
            }
            
            if(empty($Sex)) {
                echo "<div class='error'>Sex field is empty.</div>";
            }
            
            if(empty($Prodi_Jurusan)) {
                echo "<div class='error'>Prodi atau jurusan field is empty.</div>";
            }
            
            if(empty($Tanggal_masuk)) {
                echo "<div class='error'>Tanggal masuk field is empty.</div>";
            }

            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else { 
            // if all the fields are filled (not empty) 
                
            //insert data to database    
            $result = mysqli_query($mysqli, "INSERT INTO Mahasiswa(Nim, Nama, sex, Prodi_Jurusan, Tanggal_masuk , login_id) VALUES('$Nim','$Nama','$Sex','$Prodi_Jurusan','$Tanggal_masuk', '$loginId')");
            
            //display success message
            
            echo "<div class='success'>Data berhasil ditambahkan.</div>";
			echo "<br/> <div class='button1'> <a href='view.php'>Lihat Hasil</a> </div>";
        }
    }
    ?>
</div>
</body>
</html>
