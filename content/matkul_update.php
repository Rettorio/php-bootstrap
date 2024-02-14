<?php
require_once 'config/koneksi.php';

$mk = htmlspecialchars($_POST["kodemk"]);
$nama = htmlspecialchars($_POST["nama"]);
$sks = htmlspecialchars($_POST["sks"]);

$simpan = $con->prepare("UPDATE matakuliah SET nama = :nama, sks = :sks WHERE kodemk = :kodemk");
$simpan->bindParam("nama", $nama);
$simpan->bindParam("sks", $sks);
$simpan->bindParam("kodemk", $mk);
$simpan->execute();

echo "<script>alert('Data berhasil diupdate!');window.location.href = '?page=matkul';</script>";