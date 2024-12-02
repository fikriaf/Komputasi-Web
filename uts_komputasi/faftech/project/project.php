<?php
session_start();
include "../koneksi/koneksi.php";

if(isset($_SESSION["email"]) && $_SESSION["password"]) {
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

    $query = "SELECT * FROM $tabelUser WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $name = $result->fetch_assoc()["name"];
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector(".logoutnya").style.display = "block";
                document.querySelector(".loginnya").style.display = "none";
                document.querySelector(".editnya").style.display = "block";
            });
        </script>';
    }   
}


$queryProject = "SELECT github FROM $tabelProject";
$resultProject = $conn->query($queryProject);

if ($resultProject) {
    $github = array();
    while ($row = $resultProject->fetch_assoc()) {
        $github[]  = json_decode($row['github'], true);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAF-Tech</title>
    <link rel="icon" type="image/x-icon" href="/src/logo-no-bg.ico">

    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Animated -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">

</head>
<body style="font-family: Teko;">
    <div class="container-xxl bg-white m-0 p-0">
        <div id="spinner" class="bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center" style="z-index: 999999999999999999999;">
            <div class="spinner-border text-primary" style="width:3rem;height:3rem;" role="status">
                <span class="sr-only"></span>
            </div>
        </div>
        <div class="container-fluid nav-bar bg-transparent">
            <div class="total-navbar">
                <div class="container-fluid d-flex gap-1 px-0 navbarnya" style="font-family: Teko; letter-spacing: 3px; font-size: 1.5rem;">
                    <nav class="navbar navbar-expand-lg navbar-utama navbar-dark bg-dark py-0 px-3 w-100 me-3">
                        <a class="navbar-brand d-flex align-items-center text-center gap-3" href="../">
                            <img class="icon" src="../src/logo-no-bg.png" alt="faftech" style="width: 50px;">
                            <h1 class="text-light m-0 pt-1" style="font-family: Teko; font-size: medium2em;">FAF-Tech</h1>
                        </a>
                        <button type="button" class="navbar-toggler toggle-utama" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false" style="z-index: 999; border-style: none; transform: skew(-20deg);">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse" id="navbarCollapse"">
                            <ul class="navbar-nav ms-auto gap-4">
                                <li class="nav-item">
                                    <a class="nav-link py-3" href="../">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3" href="../about/about.php">ABOUT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3" href="../contact/contact.php">CONTACT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3" href="#">PROJECT</a>
                                </li>
                                <li class="tambahane text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
                                    <a class="btn btn-outline-light" href="../ADMIN/loginAdmin.php">VIEW DATABASE</a>
                                </li>
                            </ul>
                        </div>
                        <span class="tambahan-nav" style="position: absolute; right: -15px; top: 0; bottom: 0; width: 30px; background: inherit; transform: skewX(-20deg); z-index: 0;"></span>
                    </nav>
                    <div class="nav-profile d-flex gap-1 p-0 m-0">
                        <nav class="navbar navbar-expand-lg navbar-profile navbar-dark bg-transparent p-0 d-grid gap-1" style="transform: skew(-20deg);">
                            <a href="../ADMIN/loginAdmin.php" class="btn btn-primary rounded-0 px-4 py-0" type="button">
                                <div class="mt-1 ms-1" style="transform: skew(20deg); font-size: 20px; font-weight: 600;">ADMIN</div>
                            </a>
                            <a href="../ADMIN/loginAdmin.php" class="btn btn-primary rounded-0 py-0" type="button">
                                <div class="mt-1 ms-1" style="transform: skew(20deg); font-size: 20px; font-weight: 600;">CRUD</div>
                            </a>
                        </nav>
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 ms-3">
                            <a href="#" class="dropdown-toggle ps-1 pe-3" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="z-index: 999;">
                                <img src="../src/profile.png" style="width: 30px;" alt="">
                            </a>
                            <span class="tambahan-nav" style="position: absolute; left: -15px; top: 0; bottom: 0; width: 50px; background: inherit; transform: skewX(-20deg);"></span>
                            <ul class="menu-profile dropdown-menu dropdown-menu-end bg-primary" aria-labelledby="profileDropdown">
                                <li>
                                    <section class="bg-primary">
                                        <div class="container">
                                            <div class="row d-flex justify-content-center align-items-center">
                                                <div class="col-md-12 col-xl-12">
                                                    <div class="card" style="border-radius: 15px;">
                                                        <div class="card-body text-center">
                                                            <div class="mt-3 mb-4">
                                                                <img src="../src/profile.png"
                                                                class="rounded-circle img-fluid" style="width: 100px;" />
                                                            </div>
                                                            <h4 class="mb-2 px-5">
                                                                <?php if (isset($name)) { echo $name; } ?>
                                                            </h4>
                                                            <p class="text-muted mb-4">
                                                                <?php if (isset($email)) { echo $email; } ?>
                                                            </p>
                                                            <div class="d-flex justify-content-between text-center mt-3 mb-2">
                                                                <a type="button" href="../account/login.php" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark w-100 btn-rounded btn-md loginnya" style="font-family: Heebo;">
                                                                    Login
                                                                </a>
                                                                <a type="button" href="../account/edit.php" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark w-100 btn-rounded btn-md editnya" style="font-family: Heebo;">
                                                                    Edit
                                                                </a>
                                                                <a type="button" href="../account/logout.php" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary w-100 btn-rounded btn-md logoutnya" style="font-family: Heebo;">
                                                                    Logout
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <ul class="breadcrumb bg-transparent position-absolute" style="font-family: Teko; z-index: -199;">
                <li><a href="../">Home</a></li>
                <li>Project</li>
            </ul>
        </div>
        <div class="container-fluid contain">
            <div class="headercuy">
                <div class="mb-5">
                    <h1>My Project</h1>
                </div>
                <div class="row">
                    <div class="leftcolumn">
                        <?php
                        foreach ($github as $result) {
                            echo '<div class="card">
                                    <a class="text-dark" href="'.$result[0]["href"].'" target="_blank" style="text-decoration: none;">
                                        <h2>'.$result[0]["title"].'</h2>
                                        <hr>
                                        <p>'.$result[0]["description"].'</p>
                                        <img src="'.$result[0]["src"].'" alt="" style="width: 100%; height: 80%;">
                                    </a>
                                </div>
                                <div class="card">
                                    <a class="text-dark" href="'.$result[1]["href"].'" target="_blank" style="text-decoration: none;">
                                        <h2>'.$result[1]["title"].'</h2>
                                        <hr>
                                        <p>'.$result[1]["description"].'</p>
                                        <video src="'.$result[1]["src"].'" alt="" autoplay loop muted style="height: 100%;">
                                    </a>
                                </div>
                                <div class="card">
                                    <a class="text-dark" href="'.$result[2]["href"].'" target="_blank" style="text-decoration: none;">
                                        <h2>'.$result[2]["title"].'</h2>
                                        <hr>
                                        <p>'.$result[2]["description"].'</p>
                                        <img src="'.$result[2]["src"].'" alt="" style="width: 100%;">
                                    </a>
                                </div>
                                <div class="card">
                                    <a class="text-dark" href="'.$result[3]["href"].'" target="_blank" style="text-decoration: none;">
                                        <h2>'.$result[3]["title"].'</h2>
                                        <hr>
                                        <p>'.$result[3]["description"].'</p>
                                        <img src="'.$result[3]["src"].'" alt="" style="width: 100%;">
                                    </a>
                                </div>';
                        }
                        ?>
                        <div class="mb-5 w-100">
                            <a class="w-100 btn btn btn-primary btn-outline-dark d-flex gap-2 justify-content-center align-items-center" href="https://github.com/fikriarmiafahmi" style="font-size: 1.5rem" target="_blank"><i class="far fa-folder-open"></i>View All</a>
                        </div>
                    </div>
                    <div class="rightcolumn">
                        <div class="card">
                            <h2>About Me</h2>
                            <div class="fakeimg" style="height:100%;">
                                <img src="../img/fikri2.jpg" alt="">
                            </div>
                            <p class="mt-3">I'm 🅵🅸🅺🆁🅸 🅰🆁🅼🅸🅰 🅵🅰🅷🅼🅸</p>
                            <p>I studied the fields of Artificial Intelligence, Backend Development, and Frontend Development</p>
                        </div>
                        <div class="card">
                            <h3>Popular Post</h3>
                            <div class="fakeimg mb-2">
                                <a href="https://osc.medcom.id/community/author/barayaroas@gmail.com" target="_blank">
                                    <img src="https://osccdn.medcom.id/images/content/2023/12/30/b2aa67a3214041c52fe36289f65330bc.jpg" alt="" style="border: solid 2px black">
                                </a>
                            </div>
                            <div class="fakeimg mb-2">
                                <a href="https://kumparan.com/fikri-af" target="_blank">
                                    <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/01ja7whg5cv6n2tz5x2cky02sc.jpg" alt="" style="border: solid 2px black">
                                </a>
                            </div>
                            <div class="fakeimg mb-2">
                                <a href="https://www.goodnewsfromindonesia.id/2023/12/15/perihal-deepfake-data-pengguna-internet-di-indonesia-terlalu-rentan" target="_blank">
                                    <img src="https://ik.imagekit.io/goodid/gnfi/uploads/articles/large-142342416-futuristic-face-scan-identity-hologram-with-data-and-personal-information-d.jpg?tr=w-730,h-486,fo-center" alt="" style="border: solid 2px black">
                                </a>
                            </div>
                        </div>
                        <div class="card">
                            <h3><i class="fab fa-github"></i></h3>
                            <a href="https://github.com/fikriarmiafahmi" style="text-decoration: none; font-size: 2rem;" target="_blank">Fikri AF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-3 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-2">
                <div class="row g-1 d-grid">
                    <div class="col-lg-6 col-md-6">
                        <h5 class="text-white mb-4">Contact Me</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Cendrawasih VI, Sawah Baru, Ciputat</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 8953 4850 5284</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>fikriarmia27@gmail.com</p>
                    </div>
                    <!-- Kolom Kanan -->
                    <div class="col-lg-6 col-md-6 d-flexbox w-100 justify-content-end align-items-center">
                        <a class="btn btn-outline-light btn-social me-2" href="https://github.com/fikriarmiafahmi" target="_blank"><i class="fab fa-github"></i></a>
                        <a class="btn btn-outline-light btn-social me-2" href="https://www.instagram.com/fikriaf27" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social me-2" href="https://linkedin.com/in/fikri-armia-fahmi-b373b3288" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social me-2" href="https://osc.medcom.id/community/author/barayaroas@gmail.com" target="_blank"><i class="fab fa-blogger"></i></a>
                        <a class="btn btn-outline-light btn-social me-2" href="https://discord.gg/fighterfire0346" target="_blank"><i class="fab fa-discord"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- SCRIPT LUAR -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- SCRIPT DALAM -->
    <script src="../script.js"></script>
</body>
</html>

