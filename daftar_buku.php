<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Perpus</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
  <body>
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="daftar_buku.php">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="jam" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>


      <h1 class="alert alert-warning" align="center">Data Buku Perpustakaan UBG</h1>

<table class="table table-striped table-float table-bordered">
  <thead class="table-warning">
    <tr>
      <th>No</th>
      <th>Author</th>
      <th>Judul</th>
      <th>Sinopsis</th>
      <th>Keyword</th>
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

<script>
setInterval(myTimer, 1000);

function myTimer() {
  const d = new Date();
  document.getElementById("jam").innerHTML = d.toLocaleTimeString();
}
</script>