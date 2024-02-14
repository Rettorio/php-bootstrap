<?php
require_once 'config/koneksi.php';

$nim = $_GET['nim'];
$cari = $con->prepare("SELECT * FROM mahasiswa WHERE nim = ? ");
$cari->bindParam(1, $nim);
$cari->execute();
$jml = $cari->rowCount();

if ($jml == 0) {
    echo "<script>
        alert('NIM tidak ada!');
        window.location.href = 'mahasiswa.php';
    </script>";
}else {
    $data = $cari->fetch();
    //var_dump($data);
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <h4 class="text-center mb-3">Data Master Mahasiswa</h4>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="index.php?page=mahasiswa_save" method="POST">
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <label class="form-label text-sm" for="">NIM</label>
                            <input class="form-control form-control-sm" type="text" value="<?= $data['nim'] ?>"
                                name="nim" placeholder="22010xxx" required>
                        </div>
                        <div class="mb-2 col-md-6">
                            <label class="form-label text-sm" for="">Nama</label>
                            <input class="form-control form-control-sm" type="text" name="nama"
                                value="<?= $data['nama'] ?>" placeholder="Fulana" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="form-label text-sm" for="">Jurusan</label>
                            <input class="form-control form-control-sm" type="text" name="jurusan"
                                value="<?= $data['jurusan'] ?>" placeholder="Teknikxxxx" required>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="form-label text-sm" for="">Alamat</label>
                            <input class="form-control form-control-sm" type="text" name="alamat"
                                value="<?= $data['alamat'] ?>" placeholder="JL.xxx no xx" required>
                        </div>
                        <div class="mb-2 col-md-4 d-flex align-items-end">
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