<?php 
    require_once 'config/koneksi.php';

    $nim = $_GET['nim'];

    $delete = $con->prepare("DELETE FROM mahasiswa WHERE nim = ? ");
    $delete->bindParam(1, $nim);
    $delete->execute();
    echo "<script>
        alert('Data Berhasil dihapus');
        window.location.href = '?page=mahasiswa';
    </script>";
?>