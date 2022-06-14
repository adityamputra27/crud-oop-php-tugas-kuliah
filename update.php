<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP OOP MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>

    <?php

        require 'DatabaseConnection.php';

        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            header('Location: index.php');
        }

        $nama = "";
        $nim = "";
        $prodi = "";
        $form_error_message = "<div class='alert alert-danger'>All Fields are required!</div>";
    
        // echo print_r($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

            if ($ok) {

                $newDatabaseUpdate = new DatabaseConnection();
                $newDatabaseUpdate->updateData($nama, $nim, $prodi, $id);

                header('Location: index.php');
            } 
        } else {
            $newDatabaseSelect = new DatabaseConnection();
            $results = $newDatabaseSelect->selectSingleRecord('mahasiswa', $id);

            foreach ($results as $key => $value) {
                $nama = $value['nama'];
                $nim = $value['nim'];
                $prodi = $value['prodi'];
            }
        }
    ?>
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
        <h3 class="text-center">Ubah Data Mahasiswa</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label for="" class="py-2">Nama</label>
                <input type="text" name="nama" class="form-control my-1" placeholder="Masukkan Nama Mahasiswa" value="<?= htmlspecialchars($nama, ENT_QUOTES) ?>">
            </div>
            <div class="form-group">
                <label for="" class="py-2">NIM</label>
                <input type="text" name="nim" class="form-control my-1" placeholder="Masukkan NIM Mahasiswa" value="<?= htmlspecialchars($nim, ENT_QUOTES) ?>">
            </div>
            <div class="form-group">
                <label for="" class="py-2">Prodi</label>
                <input type="text" name="prodi" class="form-control my-1" placeholder="Masukkan Prodi Mahasiswa" value="<?= htmlspecialchars($prodi, ENT_QUOTES) ?>">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary my-3">Update</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>