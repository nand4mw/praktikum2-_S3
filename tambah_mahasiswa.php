<?php
include "./config/connection.php";

include "./layouts/header.php";
$jurusan = mysqli_query($connection, "SELECT * FROM data_jurusan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4 border p-5">
        <h2 class="mb-4">Tambah Data Mahasiswa</h2>
        <form method="post" action="">
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_jurusan" id="nama_jurusan">
                        <?php foreach ($jurusan as $jrs) : ?>
                            <option value="<?= $jrs['id_jurusan'] ?>"><?= $jrs['nama_jurusan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nim_mahasiswa" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nim_mahasiswa" id="nim_mahasiswa">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="L">
                        <label class="form-check-label" for="laki">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah Data +</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST["submit"])) {
    // var_dump($_POST);
    // die;
    $id_jurusan = htmlspecialchars($_POST['id_jurusan']);
    $namaMahasiswa = htmlspecialchars($_POST["nama_mahasiswa"]);
    $nimMahasiswa = htmlspecialchars($_POST["nim_mahasiswa"]);
    $date = htmlspecialchars($_POST["tgl_lahir"]);
    $jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);

    if ($jenis_kelamin == '1') {
        echo "Jenis kelamin: Laki-laki";
    } elseif ($jenis_kelamin == '0') {
        echo "Jenis kelamin: Perempuan";
    } else {
        echo "Silakan pilih jenis kelamin.";
    }

    $tambah = mysqli_query($connection, "INSERT INTO data_mahasiswa (id_jurusan, nama_mahasiswa, nim_mahasiswa, tgl_lahir, jenis_kelamin) VALUES ('$id_jurusan', '$namaMahasiswa', '$nimMahasiswa', '$date', '$jenis_kelamin')");

    if ($tambah) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                window.location.href = 'data_mahasiswa.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menambahkan data');
            </script>
        ";
    }
}
?>