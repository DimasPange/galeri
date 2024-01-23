  <?php
    session_start();
    include 'db.php';
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
      <header>
          <div class="container">
              <h1><a href="dashboard.php">WEB Galleri Foto</a></h1>
              <ul>
                  <li><a href="edit.php">Dashboard</a></li>
                  <li><a href="profil.php">Profil</a></li>
                  <li><a href="data-image.php">Data foto</a></li>
                  <li><a href="keluar.php">Keluar</a></li>
              </ul>
          </div>
      </header>

      <!--pp-->

      <div class="section">
          <div class="container">
              <h3>Tambah Data Kategori</h3>
              <div class="box">
                  <form action="" method="POST">
                      <input type="text" name="category_name" placeholder="Nama Kategori" class="input-control"
                          required>
                      <input type="submit" name="submit" value="Submit" class="btn">
                  </form>
                  <?php
                    if (isset($_POST['submit'])) {

                        $nama = ucwords($_POST['category_name']);

                        $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (null,  '" . $nama . "' ) ");
                        if ($insert) {
                            echo '<script>alert("Tambah Data berhasil😊")</script>';
                            echo '<script>window.location="data-image.php"</script>';
                        } else {
                            echo 'gagal ' . mysqli_error($conn);
                        }
                    }
                    ?>


                  <div>
                      <h2>Tampilan</h2>
                      <div class="box">
                          <table>
                              <th>

                                  <?php
                                    $no = 1;
                                    $produk = mysqli_query($conn, "SELECT * FROM tb_category");
                                    if (mysqli_num_rows($produk) > 0) {


                                        while ($row = mysqli_fetch_array($produk)) {
                                    ?>
                                  <tr>
                                      <td><?php $no++ ?></td>
                                      <td><?php echo $row['category_name'] ?></td>

                                      <td>
                                          <a href="edit.php?id=<?php echo $row['category_id'] ?>">Edit</a>
                                      </td>
                                  </tr>
                                  <?php }
                                    } else { ?>
                                  <tr>
                                      <td colspan="7">Tidak ada data </td>
                                  </tr>

                                  <?php  } ?>
                              </th>
                          </table>
                      </div>

                  </div>
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