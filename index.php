<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  session_start();

if (!isset($_SESSION['login'])) {
    header('location: home.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Perpus</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
  <body>
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
      <h1 class="alert alert-warning" align="center">Data Buku Perpustakaan UBG</h1>

<a href="tambah.php" class="btn btn-primary" style="float: left;">+ &nbsp; Tambah Buku</a>
<a href="logout.php" class="btn btn-outline-danger" style="float: right;">Logout</a>
<br><br>

<table class="table table-striped table-float table-bordered">
  <thead class="table-warning">
    <tr>
      <th>No</th>
      <th>Author</th>
      <th>Judul</th>
      <th>Sinopsis</th>
      <th>Keyword</th>
      <th>Gambar</th>
      <th>Action</th>
    </tr>
</thead>
<tbody>
  <?php
  // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
  $query = "SELECT * FROM buku ORDER BY id ASC";
  $result = mysqli_query($koneksi, $query);
  //mengecek apakah ada error ketika menjalankan query
  if (!$result) {
      die("Query Error: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
  }

  //buat perulangan untuk element tabel dari data mahasiswa
  $no = 1; //variabel untuk membuat nomor urut
  // hasil query akan disimpan dalam variabel $data dalam bentuk array
  // kemudian dicetak dengan perulangan while
  while ($row = mysqli_fetch_assoc($result)) {
      ?>
   <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $row['author']; ?></td>
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['sinopsis']; ?></td>
      <td><?php echo $row['keyword']; ?></td>
      <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
      <td>
          <a href="edit.php?id=<?php echo $row['id']; ?>">
          <input type="submit" value="edit" class="btn btn-warning">
        </a> 

          <?php
                            if ($_SESSION['role'] == 'admin') {
                                ?>
                                <a href="proses_hapus.php?id=<?= $row->id ?>">
                                    <input type="submit" value="hapus" onclick="confirm('yakin hapus data?')" class="btn btn-danger">
                                </a>
                            <?php
                            } ?>
          <!-- <a class="btn btn-danger" href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a> -->
      </td>
  </tr>

  <?php
    $no++; //untuk nomor urut terus bertambah 1
  }
  ?>

      </div>
    </div>
  </div>
    
    </tbody>
    </table>
  </body>
</html>
