<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
        <?php
        require 'koneksi.php';
        $sql ="SELECT * FROM buku";
        $query =mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_object($query)) {
            ?>
        <div class="col-md-3 mb-3"> 
            <div class="card" style="border-radius: 10px;">
                <img src="gambar/<?=$data->gambar; ?>" alt="">
                <div class="card-body">
                    <h5 class="card-title">
                    <?=$data->title; ?>
                    
                    </h5>
                    <p class="card-text"><?=$data->sinopsis; ?>
                </p>
                <a href="home.php" class="btn btn-info">Kembali</a>
                </div>
            </div>
        </div>
        <?php
        } ?>
        </div>
    </body>
</html>

