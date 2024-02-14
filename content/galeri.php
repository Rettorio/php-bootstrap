<?php
require_once 'config/koneksi.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h4 class="text-center mb-3">Galeri</h4>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="index.php?page=galeri_save" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="form-label text-sm" for="">keterangan</label>
                            <input class="form-control form-control-sm" type="text" name="keterangan"
                                placeholder="Masukan keterangan" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label for="formFile" class="form-label">Gambar</label>
                            <input class="form-control form-control-sm mb-2" accept="image/*" name="gambar" type="file"
                                id="formFile" oninput="previewImg(this)">
                            <img class="d-none" id="imgP" src="" width="250px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4 d-flex align-items-end">
                            <button class="btn btn-secondary btn-sm" name="cetak" type="submit">Tambah
                                foto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row row-cols-md-3 g-3 mb-5">
        <?php
$galeri = $con->query("SELECT * FROM galeri");
foreach($galeri->fetchAll() as $row) {
    echo "<div class='col'><div class='card shadow-sm ph' style='background-image: url($row[gambar]);'></div></div>";
    // echo "<img src='$row[gambar]' alt='$row[keterangan]'>";
}
?>
    </div>