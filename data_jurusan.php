 <?php
    include "./config/connection.php";

    include "./layouts/header.php";

    $jurusan = mysqli_query($connection, "SELECT * FROM data_jurusan");

    ?>



 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Data Jurusan</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 </head>

 <body>
     <div class="container mt-4 ">
         <a href="tambah_jurusan.php" class="btn btn-success mb-2 ms-auto ">Tambah Data +</a>
         <table class="table border text-center">
             <thead>
                 <tr class="">
                     <th scope="col">No</th>
                     <th scope="col">Nama Jurusan</th>
                     <th scope="col">Aksi</th>
                 </tr>
             </thead>

             <?php $i = 1;
                foreach ($jurusan as $jrsn) : ?>
                 <tbody class="table-group-divider ">
                     <tr>
                         <th scope="row"> <?= $i++ ?> </th>
                         <td> <?= $jrsn["nama_jurusan"] ?> </td>
                         <td>
                             <a href="update_jurusan.php?id=<?= $jrsn["id_jurusan"] ?> " class="btn btn-warning">Update</a> |
                             <a href="delete_jurusan.php?id= <?= $jrsn['id_jurusan'] ?> " onclick="return confirm('apakah data tetap akan dihapus ?');" class="btn btn-danger">Delete</a>
                         </td>
                     </tr>
                 </tbody>
             <?php endforeach; ?>
         </table>
     </div>



     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 </body>

 </html>