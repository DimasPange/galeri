<?php 
session_start();
include 'db.php';

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 

<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>WEB Galeri Foto</title> 
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>
<body>
<header>
        <div class="container">
            <h1><a href="dashboard.php">WEB Galleri Foto</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-image.php">Data Foto</a></li>
                <li><a href="keluar.php">keluar</a></li>
            </ul>
        </div>
    </header>
</body>

</html>