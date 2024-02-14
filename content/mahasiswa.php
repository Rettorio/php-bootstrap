<?php
require_once 'config/koneksi.php';
?>
        <h2 align="center">Form Data Mahasiswa</h2>
        <form action="/tt/?page=mahasiswa_save" method="POST">
            <label for="">NIM</label>
            <input type="text" name="nim" required>
            <label for="">Nama</label>
            <input type="text" name="nama" required>
            <label for="">Jurusan</label>
            <input type="text" name="jurusan" required>
            <label for="">Alamat</label>
            <input type="text" name="alamat" required>
            <button class="hijau" name="cetak" type="submit">Simpan</button>
        </form>
        <h2 align="center">Data Mahasiswa</h2>
        <table>
            <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <th>JURUSAN</th>
                <th>ALAMAT</th>
                <th>AKSI</th>
            </tr>
            <?php
            $sql = $con->query("SELECT * FROM mahasiswa");
            while ($row = $sql->fetch()) {
                echo "<tr>
                        <td>$row[nim]</td>
                        <td>$row[nama]</td>
                        <td>$row[jurusan]</td>
                        <td>$row[alamat]</td>
                        <td>
                            <a href='/tt/?page=mahasiswa_edit&nim=$row[nim]'>Edit</a>
                            <a href='/tt/?page=mahasiswa_delete&nim=$row[nim]' onclick=\"return confirm('Hapus Data?')\">Delete</a>
                        </td>
                </tr>";
            }
            ?>
        </table>

</html>

<!-- URL 
index.php?nim=123&nama=budi 
$_GET['nim']
$_GET['token'] -->

<!-- delete 
nim -> delete 
nim -> cari di db -> form -> update -->