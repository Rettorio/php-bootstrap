<?php
require_once 'config/koneksi.php';

$nim = htmlspecialchars($_POST['nim']);
$nama = htmlspecialchars($_POST['nama']);
$jurusan = htmlspecialchars($_POST['jurusan']);
$alamat = htmlspecialchars($_POST['alamat']);

// isset -> var sudah di set / belum
    // empty -> var kosong / tidak
if (empty($nim) || empty($nama) || empty($jurusan) || empty($alamat)) {
    echo "<script>
        alert('Data tidak boleh kosong!');
        window.location.href = 'mahasiswa.php';
    </script>";
}else {
    
    $cek = $con->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
    $cek->bindParam(1, $nim);
    $cek->execute();
    $jml = $cek->rowCount();

    if ($jml > 0) {
        # nim ada
        echo "<script>
            alert('NIM sudah ada!');
            window.location.href = '?page=mahasiswa';
        </script>";
    }else {
        # nim tidak ada
        $sql = "INSERT INTO mahasiswa VALUES (?,?,?,?)";
        $simpan = $con->prepare($sql);
        //bind
        $simpan->bindParam(1, $nim);
        $simpan->bindParam(2, $nama);
        $simpan->bindParam(3, $jurusan);
        $simpan->bindParam(4, $alamat);
        //exec
        $simpan->execute();

        echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href = '/tt/?page=mahasiswa';
            </script>";
    }
}



//simpan ke db
//localhost/phpmyadmin
// INSERT
// INSERT INTO namatable VALUES ('val 1', 'val 2', 'val n');
// INSERT INTO mahasiswa VALUES ('Budi','2202','Teknik Informatika','Ambon')
// INSERT INTO mahasiswa (nim, nama) VALUES ('Budi','2202')

//SQL 
    // DDL
    // DML  -> insert, update, delete, select
    // DCL