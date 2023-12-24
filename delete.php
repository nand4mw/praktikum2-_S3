 <?php
include "./config/connection.php";

    $id = $_GET['id'];

    $delete = mysqli_query($connection, "DELETE FROM data_mahasiswa WHERE id_mahasiswa = '$id'");

    if ($delete) {
        echo "
            <script>
                alert('data berhasil dihapus');
                window.location.href = 'data_mahasiswa.php';
            </script>
        ";
    }



    ?> 