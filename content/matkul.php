<?php
require_once 'config/koneksi.php';

$query = "SELECT * FROM matakuliah";
$data = $con->query($query);

?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h5 class="text-center mb-3">Form Tambah Matakuliah</h5>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="index.php?page=matkul_save" method="POST">
                    <div class="row">
                        <div class="mb-2 col-md-3">
                            <label class="form-label text-sm" for="">Kode Matkul</label>
                            <input class="form-control form-control-sm" type="text" name="kodemk" placeholder="300xx"
                                required>
                        </div>
                        <div class="mb-2 col-md-3">
                            <label class="form-label text-sm" for="">Nama</label>
                            <input class="form-control form-control-sm" type="text" name="nama" placeholder="matkulxx"
                                required>
                        </div>
                        <div class="mb-2 col-md-3">
                            <label class="form-label text-sm" for="">SKS</label>
                            <input class="form-control form-control-sm" type="number" name="sks" placeholder="2"
                                required>
                        </div>
                        <div class="mb-2 col-md-3 d-flex align-items-end">
                            <button class="btn btn-secondary btn-sm" name="cetak" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-8 col-xl-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    Data Matakuliah
                </div>
                <div class="card-body">
                    <table class="table table-hover text-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kodemk</th>
                                <th>Nama</th>
                                <th>SKS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                while ($row = $data->fetch()) {
                                    echo "<tr>
                                            <td>$no</>
                                            <td>$row[kodemk]</td>
                                            <td>$row[nama]</td>
                                            <td>$row[sks]</td>
                                            <td>
                                                <a class='btn btn-sm btn-warning' href='index.php?page=matkul_edit&kodemk=$row[kodemk]'>Edit</a>
                                                <a class='btn btn-sm btn-danger' href='index.php?page=matkul_delete&kodemk=$row[kodemk]' onclick=\"return confirm('Hapus Data?')\">Delete</a>
                                            </td>
                                    </tr>";
                                    $no++;
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- URL 
index.php?nim=123&nama=budi 
$_GET['nim']
$_GET['token'] -->

<!-- delete 
nim -> delete 
nim -> cari di db -> form -> update -->