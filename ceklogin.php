<?php
session_start();
require_once 'config/koneksi.php';

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

if (empty($username) || empty($password)) {
    echo "<script>
            alert('data kosong');
            window.location.href = 'login.php';
        </script>";
} else {
    # cek
    $cek = $con->prepare("SELECT * FROM user WHERE username = :username");
    $cek->bindParam('username', $username);
    $cek->execute();
    $jml = $cek->rowCount();
    if ($jml != 0) {
        # username ada
        $data = $cek->fetch();
        # cek password
        if (password_verify($password, $data['password'])) {
            # password benar, buat session
            $_SESSION['web2ti3d_user'] = $data['username'];
            $_SESSION['web2ti3d_level'] = $data['level'];
            echo "<script>
                alert('berhasil.');
                window.location.href = 'index.php';
            </script>";
        } else {
            # password salah
            echo "<script>
                alert('username/password salah.');
                window.location.href = 'login.php';
            </script>";
        }
    } else {
        # username tidak ada
        echo "<script>
            alert('username tidak ada.');
            window.location.href = 'login.php';
        </script>";
    }
}
