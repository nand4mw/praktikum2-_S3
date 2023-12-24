<?php
include "./config/connection.php";

$id = $_GET['id'];

$delete = mysqli_query($connection, "DELETE FROM data_jurusan WHERE id_jurusan = '$id'");

if ($delete) {
    echo "
            <script>
                alert('data berhasil dihapus');
                window.location.href = 'data_jurusan.php';
            </script>
        ";
}
