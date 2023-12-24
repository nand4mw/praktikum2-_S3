<?php
include "./config/connection.php";
include "./layouts/header.php";

$id = $_GET['id'];
$jurusan = mysqli_query($connection, "SELECT * FROM data_jurusan WHERE id_jurusan = '$id'");

$get = mysqli_fetch_assoc($jurusan);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form class="container mt-4 border p-5" method="post" action="">
        <div class="row mb-3">
            <label for="nama_jurusan" class="col-sm-2 col-form-label">Nama Jurusan </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_jurusan" value="<?= $get['nama_jurusan'] ?>" id="nama_jurusan">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update Data</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST["submit"])) {

    $id = $get['id_jurusan'];
    $nama_jurusan = htmlspecialchars($_POST["nama_jurusan"]);

    $update = mysqli_query($connection, "UPDATE data_jurusan SET
            nama_jurusan = '$nama_jurusan'
            WHERE id_jurusan = '$id'");

    if ($update) {
        echo "
        <script>
            alert('Data berhasil diupdate');
            window.location.href = 'data_jurusan.php';
        </script>
            ";
    } else {
        echo "
        <script>
            alert('Gagal mengupdate data');
        </script>
        ";
    }
}
?>