<?php
session_start();
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$level = htmlspecialchars($_POST['level']);
$pass_hash = password_hash($password, PASSWORD_DEFAULT);

// isset -> var sudah di set / belum
// empty -> var kosong / tidak
if (empty($username) || empty($password) || empty($level || $level !== "Admin")) {
    echo "<script>
        alert('Data tidak boleh kosong!');
        window.location.href = 'index.php?page=user';
    </script>";
} else {

    $cek = $con->prepare("SELECT * FROM user WHERE username = ?");
    $cek->bindParam(1, $username);
    $cek->execute();
    $jml = $cek->rowCount();

    if ($jml > 0) {
        # nim ada
        echo "<script>
            alert('Username sudah ada!');
            window.location.href = 'index.php?page=user';
        </script>";
    } else {
        # nim tidak ada
        $sql = "INSERT INTO user (username, password, level) VALUES (?,?,?)";
        $simpan = $con->prepare($sql);
        //bind
        $simpan->bindParam(1, $username);
        $simpan->bindParam(2, $pass_hash);
        $simpan->bindParam(3, $level);
        //exec
        $simpan->execute();

        echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href = 'index.php?page=user';
            </script>";
    }
}



//simpan ke db
//localhost/phpmyadmin
// INSERT
// INSERT INTO namatable VALUES ('val 1', 'val 2', 'val n');
// INSERT INTO mahasiswa VALUES ('Budi','2202','Teknik Informatika','Ambon')
// INSERT INTO mahasiswa (nim, nama) VALUES ('Budi','2202')

//SQL 
    // DDL
    // DML  -> insert, update, delete, select
    // DCL