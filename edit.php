<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
// Including the database connection file
include_once("connection.php");

if (isset($_POST['update'])) 
{
    $Id = $_POST['Id'];
    
    $Nim = $_POST['Nim'];
    $Nama = $_POST['Nama'];
    $Sex = $_POST['Sex'];
    $Prodi_Jurusan = $_POST['Prodi_Jurusan'];
    $Tanggal_masuk = $_POST['Tanggal_masuk'];    
    
    // Checking empty fields
    if (empty($Nim) || empty($Nama) || empty($Sex) || empty($Prodi_Jurusan) || empty($Tanggal_masuk)) {
        if (empty($Nim)) {
            echo "<font color='red'>Nim field is empty.</font><br/>";
        }
                
        if (empty($Nama)) {
            echo "<font color='red'>Nama field is empty.</font><br/>";
        }
        
        if (empty($Sex)) {
            echo "<font color='red'>Sex field is empty.</font><br/>";
        }
        
        if (empty($Prodi_Jurusan)) {
            echo "<font color='red'>Prodi/Jurusan field is empty.</font><br/>";
        }
        
        if (empty($Tanggal_masuk)) {
            echo "<font color='red'>Tanggal Masuk field is empty.</font><br/>";
        }
    } else {    
        // Updating the table
        $result = mysqli_query($mysqli, "UPDATE Mahasiswa SET Nim='$Nim', Nama='$Nama', Sex='$Sex', Prodi_Jurusan='$Prodi_Jurusan', Tanggal_masuk='$Tanggal_masuk' WHERE Id=$Id");
        
        // Redirecting to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>

<?php
// Getting id from URL
$Id = $_GET['Id'];

// Selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Mahasiswa WHERE Id=$Id");

if ($res = mysqli_fetch_array($result)) {
    $Nim = $res['Nim'];
    $Nama = $res['Nama'];
    $Sex = $res['Sex'];
    $Prodi_Jurusan = $res['Prodi_Jurusan'];
    $Tanggal_masuk = $res['Tanggal_masuk'];
}
?>

<html>
<head>    
    <title>Edit Data</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="nav">
        <a href="index.php">Beranda</a> | 
        <a href="view.php">Lihat Mahasiswa</a> | 
        <a href="logout.php">Logout</a>
    </div>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php" class="form-container">
        <table class="form-table">
            <tr> 
                <td><label for="Nim">Nim</label></td>
                <td><input type="text" id="Nim" name="Nim" value="<?php echo htmlspecialchars($Nim); ?>" required></td>
            </tr>
            <tr> 
                <td><label for="Nama">Nama</label></td>
                <td><input type="text" id="Nama" name="Nama" value="<?php echo htmlspecialchars($Nama); ?>" required></td>
            </tr>
            <tr> 
                <td><label for="Sex">Sex</label></td>
                <td><input type="text" id="Sex" name="Sex" value="<?php echo htmlspecialchars($Sex); ?>" required></td>
            </tr>
            <tr> 
                <td><label for="Prodi_Jurusan">Prodi / Jurusan</label></td>
                <td><input type="text" id="Prodi_Jurusan" name="Prodi_Jurusan" value="<?php echo htmlspecialchars($Prodi_Jurusan); ?>" required></td>
            </tr>
            <tr> 
                <td><label for="Tanggal_masuk">Tanggal Masuk</label></td>
                <td><input type="date" id="Tanggal_masuk" name="Tanggal_masuk" value="<?php echo htmlspecialchars($Tanggal_masuk); ?>" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="Id" value="<?php echo htmlspecialchars($Id); ?>"></td>
                <td><input type="submit" name="update" value="Update" class="submit-btn"></td>
            </tr>
        </table>
    </form>
</body>
</html>
