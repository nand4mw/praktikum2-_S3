<?php
include "./config/connection.php";
include "./layouts/header.php";

// Mengambil total data jurusan
$totalJurusan = mysqli_query($connection, "SELECT COUNT(*) as total FROM data_jurusan");
$row = mysqli_fetch_assoc($totalJurusan);
$totalDataJurusan = $row['total'];

// Total mahasiswa Laki-laki
$totalPerJurusan = mysqli_query($connection, "SELECT nama_jurusan, COUNT(*) as total FROM data_mahasiswa JOIN data_jurusan ON data_mahasiswa.id_jurusan = data_jurusan.id_jurusan GROUP BY data_jurusan.id_jurusan");
$totalMahasiswaLaki2 = mysqli_query($connection, "SELECT COUNT(*) as totalLaki FROM data_mahasiswa WHERE jenis_kelamin = 'L'");
$rowLaki = mysqli_fetch_assoc($totalMahasiswaLaki2);
$totalLaki = $rowLaki['totalLaki'];

// Total Mahasiswa Perempuan
$totalMahasiswaPerempuan = mysqli_query($connection, "SELECT COUNT(*) as totalPerempuan FROM data_mahasiswa WHERE jenis_kelamin = 'P'");
$rowPerempuan = mysqli_fetch_assoc($totalMahasiswaPerempuan);
$totalPerempuan = $rowPerempuan['totalPerempuan'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="">

  <div class="container mt-4 ">
    <!-- <div class="row d-flex"> -->
    <div class="col-md-7 container">
      <div class="row ">
        <div class="col-md-12">
          <div class="alert text-center bg-dark text-white " role="alert">
            <strong>Detail berdasarkan gender:</strong>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="alert bg-warning text-white text-center " role="alert">
            <strong>Total Laki-laki (L) :</strong> <?= $totalLaki ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="alert bg-danger text-white text-center" role="alert">
            <strong>Total Perempuan (P) :</strong> <?= $totalPerempuan ?>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
  <div class="container mt-2  alert alert-secondary bg-success text-white" role="alert">
    Total Data Jurusan : <?= $totalDataJurusan ?></div>

  <table class="table border container table-bordered table-responsive text-center">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Jurusan</th>
        <th scope="col">Total / Jurusan</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <?php $i = 1;

      while ($row = mysqli_fetch_assoc($totalPerJurusan)) : ?>
        <tr>
          <th scope="row"><?= $i++ ?></th>
          <td><?= $row['nama_jurusan'] ?></td>
          <td><?= $row['total'] ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>