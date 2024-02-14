<?php
require_once 'config/koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

$sql = "UPDATE mahasiswa SET nama = :nama, jurusan = :jurusan, alamat = :alamat WHERE nim = :nim";

$simpan = $con->prepare($sql);
//bind
$simpan->bindParam('nama', $nama);
$simpan->bindParam('jurusan', $jurusan);
$simpan->bindParam('alamat', $alamat);
$simpan->bindParam('nim', $nim);
//exec
$simpan->execute();

echo "<script>
        alert('Data Berhasil Diubah');
        window.location.href = '/tt/?page=mahasiswa';
    </script>";

// UPDATE
// UPDATE namatable SET kolom = 'nilai'.... WHERE ....

//SQL 
    // DDL
    // DML  -> insert, update, delete, select
    // DCL