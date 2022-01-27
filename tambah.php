<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>
  <head>
    <title> Tambah Data </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container-fluid">
    
<br>

<div class="card-group">
  <div class="card">
    <div class="card-body">

    </div>
  </div>
  <div class="card">
    <div class="card-body">
    <h3 class="alert alert-warning" align="center">Tambah Data</h3>
            <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      
      <div>
        <label>Author</label>
        <input type="text" name="author" class="form-control md-3" autofocus="" required="" />
      </div>

      <div>
        <label>Judul</label>
       <input type="text" name="title" class="form-control md-3"/>
      </div>

      <div>
        <label>Sinopsis</label>
       <input type="text" name="sinopsis" class="form-control md-3"/>
      </div>

      <div>
        <label>Keyword</label>
       <input type="text" name="keyword" class="form-control md-3"/>
      </div>
      
      <div>
        <label>Gambar</label>
       <input type="file" name="gambar" class="form-control md-3" required="" />
      </div>

      <br>
      <div style="float: right;">
       <button type="submit" class="btn btn-primary" >Simpan</button>
       <a href="index.php" class="btn btn-danger">Batal</a>  
      </div>
      <br>
    
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
