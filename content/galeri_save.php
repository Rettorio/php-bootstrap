<?php
require_once "config/koneksi.php";
$gambar = $_FILES['gambar'];
$keterangan = $_POST['keterangan'];

if(empty($keterangan) || empty($gambar)) {
    echo "<script>
    alert('data kosong');
    window.location.href = '?page=galeri';
</script>";
exit;
}

//part of gambar
$tmp_name = $gambar['tmp_name'];
$namaGambar = $gambar['name'];
$tipeGambar = $gambar['type'];
$ukuranGambar = $gambar['size']/1000000;
$sql = "INSERT INTO galeri (gambar,keterangan) VALUES(?,?)";

//validasi
function validateType($type) {
    return $type === "image/png" || $type === "image/jpg" || $type === "image/jpeg";
}


if(!validateType($tipeGambar)) {
    echo "<script>alert('Hanya boleh mengupload gambar');window.location.href = '?page=galeri';</script>";
} elseif($ukuranGambar >= 1.0) {
    echo "<script>alert('Ukuran gambar harus dibawah 1mb');window.location.href = '?page=galeri';</script>";
} else {
    $uploadDest = "img/".$namaGambar;
    move_uploaded_file($tmp_name, $uploadDest);
    $uploadUrl = "img/" . urlencode($namaGambar);

    $upload = $con->prepare($sql);
    $upload->bindParam(1, $uploadUrl);
    $upload->bindParam(2, $keterangan);
    $upload->execute();

    echo "<script>alert('Berhasil upload gambar');window.location.href='?page=galeri'</script>";
}