 <?php
    session_start();
    include 'db.php';
    $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '" . $_GET['id'] . "' ");
    if (mysqli_num_rows($kategori) == 0) {
        echo '<script>window.location="index.php"</script>';
    }
    $k = mysqli_fetch_object($kategori);

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


 <!--content-->
 <div class="section">
     <div class="container">
         <h3>Edit Data Kategori</h3>
         <div class="box">
             <form action="" method="POST">
                 <input type="text" name="category_name" placeholder="Nama Kategori" class="input-control"
                     value="<?php echo $k->category_name ?>" required>
                 <input type="submit" name="submit" value="Submit" class="btn">
             </form>
             <?php
                if (isset($_POST['submit'])) {

                    $nama = ucwords($_POST['category_name']);

                    $update = mysqli_query($conn, "UPDATE tb_category SET category_name = '" . $nama . "' WHERE category_id = '" . $k->category_id . "' ");

                    if ($update) {
                        echo '<script>alert("Edit Data berhasil😊")</script>';
                        echo '<script>window.location="data-image.php"</script>';
                    } else {
                        echo 'gagal ' . mysqli_error($conn);
                    }
                }
                ?>
         </div>
     </div>
 </div>

 <footer>
     <div class="container">
         <small>Copyright &copy; 2024 - web galeri foto</small>
     </div>
 </footer>
 </body>

 </html>