<?php
if($level !== "Admin") {
    echo "<script>
    alert('Akses dilarang!');
    window.location.href = 'index.php';
    </script>";
    exit(0);
}
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <h5 class="text-center mb-3">Form tambah User</h5>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="index.php?page=user_save" method="POST">
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <label class="form-label text-sm" for="">Username</label>
                            <input class="form-control form-control-sm" type="text" name="username"
                                placeholder="john doe" required>
                        </div>
                        <div class="mb-2 col-md-6">
                            <label class="form-label text-sm" for="">password</label>
                            <div class="input-group">
                                <input type="password" id="inputPass" class="form-control form-control-sm"
                                    name="password" placeholder="xxxxx" required>
                                <span onclick="switchPass()" class="input-group-text"><i id="eyecon"
                                        class="bi bi-eye-fill"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-6">
                            <select name="level" class="form-select form-select-sm" aria-label="select level">
                                <option selected>Pilih user lvl</option>
                                <option value="User">level : user</option>
                                <option value="Admin">level : admin</option>
                            </select>
                        </div>
                        <div class="mb-2 col-md-6 d-flex align-items-end">
                            <button class="btn btn-secondary btn-sm w-100" name="cetak" type="submit">tambah
                                user</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    Data User
                </div>
                <div class="card-body">
                    <table class="table table-hover text-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $sql = $con->query("SELECT * FROM user");
                                while ($row = $sql->fetch()) {
                                    echo "<tr>
                                                <td>$no</td>
                                                <td>$row[username]</td>
                                                <td>$row[level]</td>
                                                <td>
                                                    <a href=''>Edit</a>
                                                    <a href='' onclick=\"return confirm('Hapus Data?')\">Delete</a>
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