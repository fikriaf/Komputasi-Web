<?php
session_start();
include "koneksi/koneksi.php";

 if(isset($_SESSION["email"]) && $_SESSION["password"]) {
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

    $query = "SELECT * FROM $tabelUser WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $name = $result->fetch_assoc()["name"];
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <!-- File Sendiri -->
    <link rel="stylesheet" href="style.css">

  </head>
  <body style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
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
                        <a class="navbar-brand d-flex align-items-center text-center gap-3" href="/">
                            <img class="icon" src="./src/logo-no-bg.png" alt="faftech" style="width: 50px;">
                            <h1 class="text-light m-0 pt-1" style="font-family: Teko; font-size: medium2em;">FAF-Tech</h1>
                        </a>
                        <button type="button" class="navbar-toggler toggle-utama" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false" style="z-index: 999; border-style: none; transform: skew(-20deg);">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse" id="navbarCollapse"">
                            <ul class="navbar-nav ms-auto gap-4">
                                <li class="nav-item">
                                    <a class="nav-link py-3" href="#">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3" href="./about/about.php">ABOUT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3" href="./contact/contact.php">CONTACT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3" href="./project/project.php">PROJECT</a>
                                </li>
                                <li class="tambahane text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
                                    <a class="btn btn-outline-light" href="./ADMIN/loginAdmin.php">VIEW DATABASE</a>
                                </li>
                            </ul>
                        </div>
                        <span class="tambahan-nav" style="position: absolute; right: -15px; top: 0; bottom: 0; width: 30px; background: inherit; transform: skewX(-20deg); z-index: 0;"></span>
                    </nav>
                    <div class="nav-profile d-flex gap-1 p-0 m-0">
                        <nav class="navbar navbar-expand-lg navbar-profile navbar-dark bg-transparent p-0 d-grid gap-1" style="transform: skew(-20deg);">
                            <a href="./ADMIN/loginAdmin.php" class="btn btn-primary rounded-0 px-4 py-0" type="button">
                                <div class="mt-1 ms-1" style="transform: skew(20deg); font-size: 20px; font-weight: 600;">ADMIN</div>
                            </a>
                            <a href="./ADMIN/loginAdmin.php" class="btn btn-primary rounded-0 py-0" type="button">
                                <div class="mt-1 ms-1" style="transform: skew(20deg); font-size: 20px; font-weight: 600;">CRUD</div>
                            </a>
                        </nav>
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 ms-3">
                            <a href="#" class="dropdown-toggle ps-1 pe-3" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="z-index: 999;">
                                <img src="./src/profile.png" style="width: 30px;" alt="">
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
                                                                <img src="./src/profile.png"
                                                                class="rounded-circle img-fluid" style="width: 100px;" />
                                                            </div>
                                                            <h4 class="mb-2 px-5">
                                                                <?php if (isset($name)) { echo $name; } ?>
                                                            </h4>
                                                            <p class="text-muted mb-4">
                                                                <?php if (isset($email)) { echo $email; } ?>
                                                            </p>
                                                            <div class="d-flex justify-content-between text-center mt-3 mb-2">
                                                                <a type="button" href="./account/login.php" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark w-100 btn-rounded btn-md loginnya" style="font-family: Heebo;">
                                                                    Login
                                                                </a>
                                                                <a type="button" href="./account/edit.php" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark w-100 btn-rounded btn-md editnya" style="font-family: Heebo;">
                                                                    Edit
                                                                </a>
                                                                <a type="button" href="./account/logout.php" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary w-100 btn-rounded btn-md logoutnya" style="font-family: Heebo;">
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
        </div>
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 headnya">
                    <div class="px-3">
                        <h1 class="head-1 mb-3" style="    font-family: Heebo;
    font-weight: 800;">Jelajahi Website dengan Dukungan Teknologi
                            <span class="text-primary">AI</span>
                            dan
                            <span class="text-primary">Kuantum</span>
                        </h1>
                        <p class="animated fadeIn mb-4 pb-2">
                            Website FAF-Tech menyediakan solusi canggih berbasis teknologi
                            <span class="text-primary">AI</span> dan
                            <span class="text-primary">Kuantum</span>
                            untuk
                            mendukung pengalaman digitalmu. Jelajahi sekarang untuk merasakan
                            transformasi teknologi masa depan.
                        </p>
                        <a href="https://github.com/fikriarmiafahmi?tab=repositories" target="_blank" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
                    </div>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="width: 3180px;">
                                <div class="owl-item">
                                    <div class="owl-carousel-item">
                                        <img class="img-fluid" src="img/fikri.jpg" alt="" >
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="owl-carousel-item">
                                        <img class="img-fluid" src="img/fikri2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="owl-carousel-item">
                                        <img class="img-fluid" src="img/ai1.webp" alt="">
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="owl-carousel-item">
                                        <img class="img-fluid" src="img/kuantum1.webp" alt="">
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="owl-carousel-item">
                                        <img class="img-fluid" src="img/kuantum2.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav gap-3">
                            <div class="owl-prev bg-primary"><i class="panah left"></i></div>
                            <div class="owl-next bg-primary"><i class="panah right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Start -->
        <div class="container-fluid bg-primary wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2" style="font-family: inherit;">
                            <div class="col-md-12">
                                <select class="form-select border-0 py-3">
                                    <option selected>Select Category</option>
                                    <option value="1">Github</option>
                                    <option value="2">Article [OSC]</option>
                                    <option value="3">Article [Lainnya]</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-search btn-dark border-0 w-100 py-3">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->
        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" id="github-section" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="mb-3" style="font-weight: 600;">Github</h1>
                    <p>Berikut ini beberapa proyek yang saya kembangkan dan publikasikan di GitHub. Proyek-proyek tersebut mencakup berbagai bidang, mulai dari aplikasi berbasis AI hingga platform web yang inovatif.</p>
                </div>
                <div class="row g-4" id="category-container">
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi/CorePoint-v1" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>CorePoint-v1</h4>
                                <span>✅ Aplikasi Serbaguna Berbasis AI</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi/EncoAI" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>EncoAI</h4>
                                <span>🤖 Enco AI, Berbasis Neural Network (PyTorch)</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi/pySemut-AI" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>pySemutAI</h4>
                                <span>🐜 Program Simulasi Jejak Feromon Semut Berbasis Pygame</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi/Lacak-OmeTV" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>LacakOmeTV</h4>
                                <span>👀 Melacak Lokasi Target OmeTV, Scanning IP Address</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi/plag-check" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>plag-check</h4>
                                <span>📜 Program Ini Untuk Cek Plagiarisme</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi/Hand-Mouse" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>Hand-Mouse</h4>
                                <span>🖐️ Hand Tracking Mouse Controller</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi/LLM-API" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>LLM-API</h4>
                                <span>Script yang terhubung ke API Large Language Model</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi/Face-Detect" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>Face-Detect</h4>
                                <span>📷 Mendeteksi wajah secara real-time pakai CV2</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi/ai-driving-car" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>AI-Driving-Car</h4>
                                <span>🚗 Program Self-Driving Car, menggunakan algoritma NEAT</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi/scholary" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>Scholary</h4>
                                <span>🎓 Scholary: platform beasiswa untuk pelajar berbasis web</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-1 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://github.com/fikriarmiafahmi?tab=repositories" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="src/github-logo.png" alt="Icon" style="width: 100px;">
                                </div>
                                <h4>LAINNYA</h4>
                                <span>GO ></span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Tombol View All -->
                <div class="d-flex justify-content-center align-items-center text-center mt-4 w-100">
                    <button id="viewAllBtn" class="btn btn-primary w-100">View All</button>
                    <button id="HideBtn" class="btn btn-primary w-100">Hide</button>
                </div>
                <hr>
                <div class="text-center mx-auto mt-5 mb-5 wow fadeInUp" id="osc-article-section" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Artikel [OSC]</h1>
                    <p>Berikut ini artikel-artikel saya yang sudah publish di media OSC Community</p>
                </div>
                <div class="row g-4" id="category-container">
                    <div class="col-lg-3 kategori-2 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://osc.medcom.id/community/teknologi-makin-maju-angka-kelahiran-di-indonesia-alami-penurunan-6911" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://osccdn.medcom.id/images/content/2024/08/05/bdd9a3c3ec1b3d5b4fd6248095c3a23c.jpg" alt="Icon">
                                </div>
                                <span>Teknologi Makin Maju, Angka Kelahiran di Indonesia Alami Penurunan?</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-2 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://osc.medcom.id/community/bedakan-saat-menggunakan-0-0-0-0-dan-127-0-0-1-6910" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4 h-100">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://osccdn.medcom.id/images/content/2024/08/05/8c31c6bc2ec1aa326514d5e45ba5a2aa.jpg" alt="Icon">
                                </div>
                                <span>Bedakan Saat Menggunakan 0.0.0.0 dan 127.0.0.1</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-2 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://osc.medcom.id/community/kenalan-tentang-framework-node-js-dan-express-js-6909" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://osccdn.medcom.id/images/content/2024/08/05/9111ea4b3b60cfd9e040b1a8fb8a3ef0.jpg" alt="Icon">
                                </div>
                                <span>Kenalan Tentang Framework Node.js dan Express.js</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-2 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://osc.medcom.id/community/kunci-pembelajaran-kuliah-di-era-ai-6798" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://osccdn.medcom.id/images/content/2024/07/04/e1a467f6d5aa8ef5cd2759b995571d3f.jpg" alt="Icon">
                                </div>
                                <span>Kunci Pembelajaran Kuliah di Era AI</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-2 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://osc.medcom.id/community/para-backender-pemula-wajib-lihat-framework-backend-ini-6799" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://osccdn.medcom.id/images/content/2024/07/04/77f9e51de9ccce1192b03c34105b3f0f.jpg" alt="Icon">
                                </div>
                                <span>Para Backender Pemula, Wajib Lihat Framework Backend ini</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-2 col-sm-6 wow fadeInUp" data-wow-delay="1.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://osc.medcom.id/community/siapkan-dan-pahami-ini-jika-anda-ingin-menggeluti-bidang-machine-learning-ai-6744" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://osccdn.medcom.id/images/content/2024/06/05/cee0ec40a51124f0d6e21fbb6257d98b.jpg" alt="Icon">
                                </div>
                                <span>Siapkan dan Pahami Ini jika Anda Ingin Menggeluti Bidang Machine Learning AI</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-2 col-sm-6 wow fadeInUp" data-wow-delay="1.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://osc.medcom.id/community/perhatikan-kunci-pemahaman-deep-learning-pada-framework-keras-6746" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://osccdn.medcom.id/images/content/2024/06/05/bbd3caa1b69f60b8d7385cad3f076c03.jpg" alt="Icon">
                                </div>
                                <span>Perhatikan Kunci Pemahaman Deep Learning pada Framework Keras</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-2 col-sm-6 wow fadeInUp" data-wow-delay="1.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://osc.medcom.id/community/pentingnya-ethical-security-dalam-sebuah-perusahaan-6592" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://osccdn.medcom.id/images/content/2024/04/26/51d60ee96bc21f143a9f203f3a06aada.jpg" alt="Icon">
                                </div>
                                <span>Pentingnya ethical security dalam sebuah perusahaan</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-2 col-sm-6 wow fadeInUp" data-wow-delay="1.9s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://osc.medcom.id/community/solusi-kultur-negatif-pada-remaja-urban-6514" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://osccdn.medcom.id/images/content/2024/03/13/f7a1c953cc584a534908579d55838e9d.jpg" alt="Icon">
                                </div>
                                <span>Solusi Kultur Negatif Pada Remaja Urban</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-2 col-sm-6 wow fadeInUp" data-wow-delay="2.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://osc.medcom.id/community/perkembangan-kecanggihan-ai-malah-makin-melemahkan-keamanan-cyber-6354" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://osccdn.medcom.id/images/content/2023/12/30/b2aa67a3214041c52fe36289f65330bc.jpg" alt="Icon">
                                </div>
                                <span>Perkembangan Kecanggihan AI malah Makin Melemahkan Keamanan Cyber</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Tombol View All -->
                <div class="d-flex justify-content-center align-items-center text-center mt-4 w-100">
                    <button id="viewAllBtn1" class="btn btn-primary w-100">View All</button>
                    <button id="HideBtn1" class="btn btn-primary w-100">Hide</button>
                </div>
                <hr>
                <div class="text-center mx-auto mt-5 mb-5 wow fadeInUp" id="lainnya-section" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h1 class="mb-3">Artikel [Lainnya]</h1>
                    <p>Berikut ini artikel-artikel saya yang sudah publish di media Kumparan, Geotimes, dan GNFI.</p>
                </div>
                <div class="row g-4" id="category-container">
                    <div class="col-lg-3 kategori-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://kumparan.com/fikri-af/rahasia-loading-website-kilat-optimasi-gambar-dan-media-dengan-html-and-css-23imSyufXmO" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/01ja7whg5cv6n2tz5x2cky02sc.jpg" alt="Icon">
                                </div>
                                <span>Rahasia Loading Website Kilat: Optimasi Gambar dan Media dengan HTML & CSS</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://kumparan.com/fikri-af/comparing-fastapi-vs-flask-framework-python-mana-yang-lebih-kuat-di-industri-23ilodDk2ti" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4 h-100">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/01ja7t4y7f1d8dbcjvxk1he3zg.jpg" alt="Icon">
                                </div>
                                <span>Comparing FastAPI vs Flask: Framework Python Mana yang Lebih Kuat di Industri?</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://kumparan.com/fikri-af/skalabilitas-tanpa-batas-aplikasi-mikroservices-dengan-kubernetes-dan-docker-23iiYV5odeK" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/01ja7eqarr4ma6qx0fqtvwm4rw.jpg" alt="Icon">
                                </div>
                                <span>Skalabilitas Tanpa Batas: Aplikasi Mikroservices dengan Kubernetes dan Docker</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://www.goodnewsfromindonesia.id/2023/12/15/perihal-deepfake-data-pengguna-internet-di-indonesia-terlalu-rentan" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://ik.imagekit.io/goodid/gnfi/uploads/articles/large-142342416-futuristic-face-scan-identity-hologram-with-data-and-personal-information-d.jpg?tr=w-730,h-486,fo-center" alt="Icon">
                                </div>
                                <span>Perihal Deepfake, Data Pengguna Internet di Indonesia Terlalu Rentan?</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-3 col-sm-6 wow fadeInUp" data-wow-delay="1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://geotimes.id/opini/penting-bagi-pengembang-web-pemula-amankan-hak-cipta-intelektual/" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://geotimes.id/wp-content/uploads/2017/08/Desain-tanpa-judul-2-3.png" alt="Icon">
                                </div>
                                <span>Penting bagi Pengembang Web Pemula Amankan Hak Cipta Intelektual</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 kategori-3 col-sm-6 wow fadeInUp" data-wow-delay="1.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://kumparan.com/fikri-af/pria-tak-berpacaran-di-era-modern-dianggap-ambigu-begini-pola-solusinya-23i6MfaULed" target="_blank" style="text-decoration: none;">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/01ja3eb4xdjcs1xgtxcq6thrcg.jpg" alt="Icon">
                                </div>
                                <span>Pria Tak Berpacaran Di Era Modern, Dianggap Ambigu? Begini Pola Solusinya!</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Tombol View All -->
                <div class="d-flex justify-content-center align-items-center text-center mt-4 w-100">
                    <button id="viewAllBtn2" class="btn btn-primary w-100">View All</button>
                    <button id="HideBtn2" class="btn btn-primary w-100">Hide</button>
                </div>
            </div>
        </div>
        <!-- Category End -->
        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="img/fikri5.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4" style="font-family: Heebo; font-weight: 700;">Nama Saya <strong class="text-primary">Fikri Armia Fahmi</strong></h1>
                        <p class="mb-4" style="text-align: justify;">Saya telah mengembangkan berbagai proyek yang mencakup banyak bidang teknologi, mulai dari kecerdasan buatan, algoritma, hingga platform berbasis web. Proyek-proyek ini bertujuan untuk memberikan solusi praktis, efisien, dan inovatif yang dapat diaplikasikan di berbagai sektor.</p>
                        <p><i class="fa fa-check text-primary me-3"></i><strong>Artificial Intelligence</strong></p>
                        <p><i class="fa fa-check text-primary me-3"></i><strong>Frontend Development</strong></p>
                        <p><i class="fa fa-check text-primary me-3"></i><strong>Backend Development</strong></p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="./about/about.php">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-3 mt-5 wow fadeIn" data-wow-delay="0.1s" style="font-family: Teko;">
            <div class="container py-2">
                <div class="row g-1">
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
                <div class="text-wrap mt-3">
                    <p>© 2024 Fikri Armia Fahmi - FAF-Tech. All rights reserved. Unauthorized use of this content is prohibited.</p>
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

    <!-- SCRIPT SENDIRI -->
    <script src="script.js"></script>
  </body>
</html>
    <?php
    include "./koneksi/koneksi.php";

    if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelector(".logoutnya").style.display = "block";
                    document.querySelector(".loginnya").style.display = "none";
                    document.querySelector(".editnya").style.display = "block";
                });
            </script>';
    }
?>