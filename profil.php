<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id='" . $_SESSION['id'] . "'");
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="index.php">WEB GALERI FOTO</a></h1>
            <ul>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="registrasi.php">Registrasi</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>
    <!--conten -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama User" class="input-control"
                        value="<?php echo $d->admin_name ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control"
                        value="<?php echo $d->username ?>" required>
                    <input type="text" name="hp" placeholder="No hp" class="input-control"
                        value="<?php echo $d->email ?>" required>
                    <input type="email" name="email" placeholder="E-mail" class="input-control"
                        value="<?php echo $d->admin_email ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control"
                        value="<?php echo $d->admin_address ?>" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>

                <?php
                if (isset($_POST['submit'])) {

                    $nama = $_POST['nama'];
                    $user = $_POST['user'];
                    $hp = $_POST['hp'];
                    $email = $_POST['email'];
                    $alamat = $_POST['alamat'];

                    $update = mysqli_query($conn, "UPDATE tb_admin SET
                admin_name = '" . $nama . "',
                username = '" . $user . "',
                admin_telp = '" . $hp . "',
                admin_email = '" . $email . "',
                admin_address = '" . $alamat . "'
                 WHERE admin_id = '" . $d->$admin_id . "'");

                    if ($update) {
                        echo '<script>alert("Ubah data")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    } else {
                        echo 'Gagal ' . mysqli_error($conn);
                    }
                }
                ?>
            </div>

            <h3>Ubah PW</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="pass1" placeholder="Password BAru" class="input-control" required>
                    <input type="text" name="pass2" placeholder="Konfirmasi PW" class="input-control" required>
                    <input type="submit" name="ubah_pass" value="Ubah" class="btn">

                </form>
                <?php
                if (isset($_POST['ubah_password'])) {
                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];

                    if ($pass2 != $pass1) {
                        echo '<script>alert("Konnfirmasi")</script>';
                    } else {
                        $u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
                        password = '" . $pass1 . "'
                        WHERE amdin_id = '" . $d->admin_id . "'
                        ");
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto</small>
        </div>
    </footer>
</body>

</html>

</body>