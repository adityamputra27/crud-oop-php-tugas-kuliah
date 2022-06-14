<?php

    require 'DatabaseConnection.php';

    if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
        $id = $_GET['id'];
    }

    $newDatabaseDelete = new DatabaseConnection();
    $newDatabaseDelete->deleteData('mahasiswa', $id);

    header('Location: index.php');

?>