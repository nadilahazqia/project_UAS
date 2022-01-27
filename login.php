<?php
    session_start();
    require 'koneksi.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");

        if (mysqli_num_rows($query) === 1) {
            $data = mysqli_fetch_object($query);

            $_SESSION['login'] = true;
            $_SESSION['fullname'] = $data->fullname;
            $_SESSION['role'] = $data->role;

            header('location: index.php');
        }

        echo $error = 'username atau password salah';
    }
?>
<!DOCTYPE html>
<html>
<head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <style>
            body {
  font-family: "Open Sans", sans-serif;
  background-color: #040404;
  color: #fff;
  position: relative;
  background: transparent;
}
body::before {
  content: "";
  position: fixed;
  /* background: #040404 url("../gambar/187-Screenshot 2021-10-23 195827.png") top right no-repeat; */
  background-size: cover;
  left: 0;
  right: 0;
  top: 0;
  height: 100vh;
  z-index: -1;
}

        </style>

</head>
<body>  
<div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card" style="position: fixed; left: 50%; transform: translateX(-50%); top: 100px;">
                        <div class="card card-body bg-dark">
                            <h3 class="alert bg-dark" align="center">Login</h3>
                            <form action="" method="POST">
                                <input type="text" name="username" placeholder="masukkan username" class="form-control mb-3">
                                <input type="password" name="password" placeholder="masukkan password" class="form-control mb-3">
                                <input type="submit" value="Login" name="login" class="btn btn-outline-warning">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>