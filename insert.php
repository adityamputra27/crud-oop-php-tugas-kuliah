<?php

    $nama = "";
    $nim = "";
    $prodi = "";
    $form_error_message = "<div class='alert alert-danger'>All Fields are required!</div>";

    // echo print_r($_POST);
    if (isset($_POST['submit'])) {
        $ok = true;
        if (empty($_POST['nama'])) {
            $ok = false;
            echo $form_error_message;
        } else {
            $nama = $_POST['nama'];
        }

        if (empty($_POST['nim'])) {
            $ok = false;
            echo $form_error_message;
        } else {
            $nim = $_POST['nim'];
        }

        if (empty($_POST['prodi'])) {
            $ok = false;
            echo $form_error_message;
        } else {
            $prodi = $_POST['prodi'];
        }

        if (isset($ok)) {
            $newDatabaseInsert = new DatabaseConnection();
            $newDatabaseInsert->insertData($nama, $nim, $prodi);

            $_POST['nama'] = "";
            $_POST['nim'] = "";
            $_POST['prodi'] = "";
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP OOP MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Data Mahasiswa</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <h3 class="text-center">Tambah Data Mahasiswa</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label for="" class="py-2">Nama</label>
                <input type="text" name="nama" class="form-control my-1" placeholder="Masukkan Nama Mahasiswa">
            </div>
            <div class="form-group">
                <label for="" class="py-2">NIM</label>
                <input type="text" name="nim" class="form-control my-1" placeholder="Masukkan NIM Mahasiswa">
            </div>
            <div class="form-group">
                <label for="" class="py-2">Prodi</label>
                <input type="text" name="prodi" class="form-control my-1" placeholder="Masukkan Prodi Mahasiswa">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary my-3">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>