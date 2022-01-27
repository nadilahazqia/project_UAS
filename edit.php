 <?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
      // ambil nilai id dari url dan disimpan dalam variabel $id
      $id = ($_GET["id"]);

      // menampilkan data dari database yang mempunyai id=$id
      $query = "SELECT * FROM buku WHERE id='$id'";
      $result = mysqli_query($koneksi, $query);
      // jika data gagal diambil maka akan tampil error berikut
      if (!$result) {
          die("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
      }
      // mengambil data dari database
      $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
      if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
      }
  } else {
      // apabila tidak ada data GET id pada akan di redirect ke index.php
      echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
  <body>
      <div class="container-fluid">
        <div class="card-group">
          <div class="card">
            <div class="card-body">

            </div>
          </div>

          <div class="card">
            <div class="card-body">
            <h1 class="alert alert-warning" align="center">Edit Data <?php echo $data['title']; ?></h1>
      
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />

        <div>
          <label>Author</label>
          <input type="text" name="author" class="form-control" value="<?php echo $data['author']; ?>" autofocus="" required="" />
        </div>

        <div>
          <label>Judul</label>
         <input type="text" name="title" class="form-control" value="<?php echo $data['title']; ?>" />
        </div>
        
        <div>
          <label>Sinopsis</label>
         <input type="text" name="sinopsis" class="form-control" value="<?php echo $data['sinopsis']; ?>" />
        </div>

        <div>
          <label>Keyword</label>
         <input type="text" name="keyword" class="form-control" value="<?php echo $data['keyword']; ?>" />
        </div>

        <div>
          <label>Gambar</label>
          <img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar" class="form-control" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>

        <div>
         <button type="submit" class="btn btn-primary">Simpan</button>
         <a href="index.php" class="btn btn-danger">Batal</a>
        </div>
        </section>
      </form>
            </div>
          </div>

          <div class="card">
            <div class="card-body">

            </div>
          </div>

        </div>
      </div>
  </body>
</html>
