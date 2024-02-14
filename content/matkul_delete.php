<?php

require_once 'config/koneksi.php';

$mk = $_GET["kodemk"];

$simpan = $con->prepare("DELETE FROM matakuliah where kodemk = ?");
$simpan->bindParam(1, $mk);
$simpan->execute();

echo "<script>alert('Matakuliah berhasil dihapus!');window.location.href = '?page=matkul';</script>";

?>