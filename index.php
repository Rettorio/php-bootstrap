<?php
require_once 'config/koneksi.php';
session_start();

if(!isset($_SESSION['web2ti3d_user'])) {
    header("location: login.php");
    exit(0);
}

$name = $_SESSION['web2ti3d_user'];
$level = $_SESSION['web2ti3d_level'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBTI3D</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
    body {
        font-family: "Poppins", sans-serif;
    }

    .text-sm {
        font-size: 14px;
    }

    .bg-body-gray {
        background-color: var(--bs-gray-100);
    }

    .ph {
        height: 250px;
        background-position: center;
    }
    </style>
</head>

<body class="bg-body-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3 p-0 shadow-sm">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container">
                        <a class="navbar-brand" href="#">WEBTI3D</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/tt/"><i class="bi bi-house-fill"></i> Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=matkul">Matakuliah</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=galeri">Galeri</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=kontak">Kontak</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bi bi-person-fill"></i> <?= $name ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                                        <?php
                                            if($level === "Admin") {echo '<a class="dropdown-item" href="?page=user">User</a>';}
                                        ?>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container pt-3">
        <?php
            $page = @$_GET['page'];
            if(empty($page)) { include "content/home.php";  }
            else { include "content/$page.php"; }
        ?>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
    const previewImg = event => {
        const img = document.getElementById("imgP");
        const file = event.files[0];
        const reader = new FileReader();

        reader.addEventListener(
            "load", () => {
                img.classList.remove("d-none");
                img.classList.add("d-block")
                img.src = reader.result;
            }, false
        )

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    const switchPass = () => {
        const input = document.getElementById("inputPass");
        const eyecon = document.getElementById("eyecon");
        const classShow = "bi bi-eye-slash-fill";
        const classHide = "bi bi-eye-fill";

        if (input.type === "password") {
            input.type = "text";
            eyecon.setAttribute("class", classShow);
        } else if (input.type === "text") {
            input.type = "password";
            eyecon.setAttribute("class", classHide);
        }
    }
    </script>
</body>

</html>