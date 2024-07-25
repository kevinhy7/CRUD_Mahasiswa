<?php session_start(); ?>
<html>
<head>
    <title>Registrasi</title>
    <link href="styleregister.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="form-container">
    <a href="index.php" class="button1">Beranda</a> <br />
    <?php
    include("connection.php");

    if (isset($_POST['submit'])) {
        $Nama = $_POST['Nama'];
        $Email = $_POST['Email'];
        $user = $_POST['Username'];
        $pass = $_POST['Password'];

        if ($user == "" || $pass == "" || $Nama == "" || $Email == "") {
            echo "<div class='error-message'>Semua bidang harus diisi. Salah satu atau beberapa bidang kosong.</div>";
            echo "<a href='register.php' class='button'>Kembali</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO login(Nama, Email, Username, Password) VALUES('$Nama', '$Email', '$user', md5('$pass'))")
                or die("Could not execute the insert query.");
                
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.php' class='button'>Login</a>";
        }
    } else {
    ?>
        <p><font size="+2">Registrasi</font></p>
        <form name="form1" method="post" action="">
            <table class="form-table">
                <tr> 
                    <td><label for="Nama">Nama Lengkap</label></td>
                    <td><input type="text" name="Nama" id="Nama"></td>
                </tr>
                <tr> 
                    <td><label for="Email">Email</label></td>
                    <td><input type="text" name="Email" id="Email"></td>
                </tr>            
                <tr> 
                    <td><label for="Username">Username</label></td>
                    <td><input type="text" name="Username" id="Username"></td>
                </tr>
                <tr> 
                    <td><label for="Password">Password</label></td>
                    <td><input type="password" name="Password" id="Password"></td>
                </tr>
                <tr> 
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit" class="button"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</div>
</body>
</html>
