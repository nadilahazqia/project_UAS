<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>HOME</title>

  </head>
  <body>

   
<div class="container">

    <div class="card">
        <div class="card-body">
        <?php
    include 'navbar.php';
?>
    <h1 class="alert alert-warning" >Selamat datang di web perpus UBG!!</h1>
    <div class="row mb-5">
    <?php
        require 'koneksi.php';
        $sql ="SELECT * FROM buku";
        $query =mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_object($query)) {
            ?>
        <div class="col-md-3 mb-3"> 
            <div class="card" style="width: 20rem; border-radius: 10px;">
                <img src="gambar/<?=$data->gambar; ?>" class="card-img-top" style="height: 13rem; border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title">
                    <?=$data->title; ?>
                    
                    </h5>
                    <p class="card-text"><?=$data->sinopsis; ?></p>
                <a href="baca.php" class="btn btn-info">Baca</a>
                </div>
            </div>
        </div>
        <?php
        } ?>
    </div>
    
        </div>
    </div>

</div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    
    
  </body>
</html>