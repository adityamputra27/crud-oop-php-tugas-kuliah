<?php

    $newDatabaseSelect = new DatabaseConnection();
    $results = $newDatabaseSelect->selectData('mahasiswa', 'nama ASC');

?>

<table class="table container mt-4">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Prodi</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <?php
        foreach ($results as $key => $value) {
            printf(
                "<tbody>
                    <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>
                            <button class='btn btn-warning'>
                                <a href='update.php?id=%d' class='text-white text-decoration-none'>Edit</a>
                            </button>
                            <button class='btn btn-danger'>
                                <a href='delete.php?id=%d' class='text-white text-decoration-none'>Hapus</a>
                            </button>
                        </td>
                    </tr>
                </tbody>",
                htmlspecialchars($key+1, ENT_QUOTES),
                htmlspecialchars($value['nama'], ENT_QUOTES),
                htmlspecialchars($value['nim'], ENT_QUOTES),
                htmlspecialchars($value['prodi'], ENT_QUOTES),
                htmlspecialchars($value['id'], ENT_QUOTES),
                htmlspecialchars($value['id'], ENT_QUOTES),
            );
        }
    ?>
</table>