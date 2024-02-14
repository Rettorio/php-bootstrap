<?php
require_once 'config/koneksi.php';

$kodemk = htmlspecialchars($_POST["kodemk"]);
$sks = htmlspecialchars($_POST["sks"]);
$nama = htmlspecialchars($_POST["nama"]);

if(empty($kodemk) || empty($sks) || empty($nama))
{
    echo "<script>
    alert('Data tidak boleh kosong!');
    window.location.href = '?page=matkul';
</script>";
exit(0);
}

try {
    $cek = $con->query("SELECT * FROM matakuliah WHERE kodemk = '$kodemk'")->rowCount();
    if($cek) { echo "<script>alert('kode matkul sudah ada');window.location.href = '?page=matkul'</script>"; }
    else {
        $save = $con->prepare("INSERT INTO matakuliah VALUES(?,?,?)");
        $save->bindParam(1, $kodemk);
        $save->bindParam(2, $nama);
        $save->bindParam(3, $sks);
        $save->execute();
        echo "<script>
        alert('Data berhasil disimpan!');
        window.location.href = '?page=matkul';
        </script>";
    }
} catch (PDOException $e) {
    echo sprintf("<script>alert(\"%s\");window.location.href = '?page=matkul';</script>", $e->getMessage());
};