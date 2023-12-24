<?php
include "./config/connection.php";
include "./layouts/header.php";


$mahasiswa = mysqli_query($connection, "SELECT * FROM data_mahasiswa JOIN data_jurusan ON data_mahasiswa.id_jurusan = data_jurusan.id_jurusan");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4 ">
        <a href="tambah_mahasiswa.php" class="btn btn-success mb-2 ms-auto ">Tambah Data +</a>
        <table class="table border text-center  ">
            <thead>
                <tr class="">
                    <th scope="col">No</th>
                    <th scope="col">Nama Jurusan</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <?php $i = 1;
            foreach ($mahasiswa as $mhs) : ?>
                <tbody class="table-group-divider ">
                    <tr>
                        <th scope="row"> <?= $i++ ?> </th>
                        <td> <?= $mhs["nama_jurusan"] ?> </td>
                        <td> <?= $mhs["nama_mahasiswa"] ?> </td>
                        <td> <?= $mhs["nim_mahasiswa"] ?> </td>
                        <td> <?= $mhs["tgl_lahir"] ?> </td>
                        <td> <?= $mhs["jenis_kelamin"] ?> </td>
                        <td>
                            <a href="update.php?id=<?= $mhs["id_mahasiswa"] ?> " class="btn btn-warning">Update</a> |
                            <a href="delete.php?id= <?= $mhs['id_mahasiswa'] ?> " onclick="return confirm('apakah data tetap akan dihapus ?');" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>