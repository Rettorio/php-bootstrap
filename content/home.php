<div class="row justify-content-center">
    <div class="col-md-6">
        <h5 class="text-center mb-3">Form Tambah Mahasiswa</h5>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="index.php?page=mahasiswa_save" method="POST">
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <label class="form-label text-sm" for="">NIM</label>
                            <input class="form-control form-control-sm" type="text" name="nim" placeholder="22010xxx"
                                required>
                        </div>
                        <div class="mb-2 col-md-6">
                            <label class="form-label text-sm" for="">Nama</label>
                            <input class="form-control form-control-sm" type="text" name="nama" placeholder="Fulana"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="form-label text-sm" for="">Jurusan</label>
                            <input class="form-control form-control-sm" type="text" name="jurusan"
                                placeholder="Teknikxxxx" required>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="form-label text-sm" for="">Alamat</label>
                            <input class="form-control form-control-sm" type="text" name="alamat"
                                placeholder="JL.xxx no xx" required>
                        </div>
                        <div class="mb-2 col-md-4 d-flex align-items-end">
                            <button class="btn btn-secondary btn-sm" name="cetak" type="submit">Tambah
                                data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-xl-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    Data Mahasiswa
                </div>
                <div class="card-body">
                    <table class="table table-hover text-sm">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th>JURUSAN</th>
                                <th>ALAMAT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = $con->query("SELECT * FROM mahasiswa");
                                while ($row = $sql->fetch()) {
                                    echo "<tr>
                                            <td>$row[nim]</td>
                                            <td>$row[nama]</td>
                                            <td>$row[jurusan]</td>
                                            <td>$row[alamat]</td>
                                            <td>
                                                <a class='btn btn-sm btn-warning' href='index.php?page=mahasiswa_edit&nim=$row[nim]'>Edit</a>
                                                <a class='btn btn-sm btn-danger' href='index.php?page=mahasiswa_delete&nim=$row[nim]' onclick=\"return confirm('Hapus Data?')\">Delete</a>
                                            </td>
                                    </tr>";
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>