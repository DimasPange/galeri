<?php
error_reporting(0);
include 'db.php';

// Fetch contact information
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);

// Fetch product information
$produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '" . $_GET['id'] . "'");
$p = mysqli_fetch_object($produk);
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
        <h1><a href="dashboard.php">WEB GALERI FOTO</a></h1> 
            <ul>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="register.php">Registrasi</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>

    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="cari foto" value="<?= $_GET['search'] ?>" />
                <input type="hidden" name="kat" value="<?= $_GET['kat'] ?>" />
                <input type="submit" name="cari" value="cari foto" />
            </form>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>detail foto</h3>
            <div class="box">
                <div class="col-2">
                    <img src="foto/<?php echo $p->image?>" width="300px" />
                </div>
                <div class="col-2">
                    <h3><?= $p->image_name ?><br /> Kategori : <?= $p->category_name ?></h3>
                    <h4>Nama User : <?= $p->admin_name ?><br /> Upload Pada Tanggal : <?= $p->date_created ?></h4>
                    <p >Deskripsi : <br/>
                        <?= $p->image_description ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <small>copyright &copy; 2024 - web galeri foto.</small>
        </div>
    </footer>
</body>
</html>