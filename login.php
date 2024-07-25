<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
    <link href="stylelogin.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="form-container1">
    <a href="index.php" class="button1">Beranda</a>
    <br />
    <?php
    include("connection.php");

    if (isset($_POST['submit'])) {
        $user = mysqli_real_escape_string($mysqli, $_POST['Username']);
        $pass = mysqli_real_escape_string($mysqli, $_POST['Password']);

        if ($user == "" || $pass == "") {
            echo "<div class='error-message'>Kolom nama pengguna atau kata sandi kosong.</div>";
            echo "<a href='login.php' class='button'>Kembali</a>";
        } else {
            $result = mysqli_query($mysqli, "SELECT * FROM login WHERE Username='$user' AND Password=md5('$pass')")
                        or die("Could not execute the select query.");
            
            $row = mysqli_fetch_assoc($result);
            
            if (is_array($row) && !empty($row)) {
                $validuser = $row['Username'];
                $_SESSION['valid'] = $validuser;
                $_SESSION['Nama'] = $row['Nama'];
                $_SESSION['Id'] = $row['Id'];
            } else {
                echo "<div class='error-message'>Nama pengguna atau sandi tidak valid.</div>";
                echo "<a href='login.php' class='button'>Kembali</a>";
            }

            if (isset($_SESSION['valid'])) {
                header('Location: index.php');            
            }
        }
    } else {
    ?>
        <p><font size="+3">Login</font></p>
        <form name="form1" method="post" action="">
            <table class="form-table1">
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
