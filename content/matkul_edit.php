<?php
require_once 'config/koneksi.php';

$kodemk = $_GET['kodemk'];
$cari = $con->prepare("SELECT * FROM matakuliah WHERE kodemk = :kodemk");
$cari->bindParam("kodemk", $kodemk);
$cari->execute();
$jml = $cari->rowCount();

if (!$jml) {
    echo "<script>
        alert('Matakuliah tidak ada!');
        window.location.href = '?page=matkul';
    </script>";
}else {
    $data = $cari->fetch();
    //var_dump($data);
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h4 class="text-center mb-3">Data Master Matakuliah</h4>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="index.php?page=matkul_update" method="POST">
                    <div class="row">
                        <div class="mb-2 col-md-3">
                            <label class="form-label text-sm" for="">Kode Matkul</label>
                            <input class="form-control form-control-sm" type="text" name="kodemk"
                                value="<?= $data['kodemk'] ?>" placeholder="300xx" required>
                        </div>
                        <div class="mb-2 col-md-3">
                            <label class="form-label text-sm" for="">Nama</label>
                            <input class="form-control form-control-sm" type="text" name="nama"
                                value="<?= $data['nama'] ?>" placeholder="matkulxx" required>
                        </div>
                        <div class="mb-2 col-md-3">
                            <label class="form-label text-sm" for="">SKS</label>
                            <input class="form-control form-control-sm" type="number" name="sks"
                                value="<?= $data['sks'] ?>" placeholder="2" required>
                        </div>
                        <div class="mb-2 col-md-3 d-flex align-items-end">
                            <button class="btn btn-secondary btn-sm" name="cetak" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<!-- URL 
index.php?nim=123&nama=budi 
$_GET['nim']
$_GET['token'] -->

<!-- delete 
nim -> delete 
nim -> cari di db -> form -> update -->