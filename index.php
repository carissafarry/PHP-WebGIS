<?php
include './admin/_loader.php';
$title = "map";
$judul = $title;
$url = 'map';
$url2 = 'map';
$fileJs = 'leaflet-pointHomeJs';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Geomatry</title>
    <link rel="stylesheet" href="admin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="admin/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="admin/assets/css/styles.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
    <link rel="stylesheet" href="admin/assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
    <style type="text/css">
        #mapid {
            height: 100vh;
        }

        .icon {
            display: inline-block;
            margin: 2px;
            height: 16px;
            width: 16px;
            background-color: #ccc;
        }

        .icon-bar {
            background: url('admin/assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;

        }

        .beranda a {
            text-decoration: none;
            color: white;
        }

        .beranda a:hover {
            color: black;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark clean-navbar" style="background-color: #585454;">
        <div class="container"><a class="navbar-brand logo" href="#">&nbsp;<img src="admin/assets/img/e536c9af-2c28-4116-9cb9-dd8be7e32ca4_200x200.png"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item item" role="presentation"><a class="nav-link active" href="/">HOME</a></li>
                    <li class="nav-item item" role="presentation"><a class="nav-link" href="admin/">Log in</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image:url(&quot;admin/assets/img/bgcandi.jpg&quot;);color:rgba(80, 80, 80, 0.85);">
            <div class="text">
                <h2>Geomatry</h2>
                <p>Jelajahi dan Searcing &nbsp;Candi Candi Pelajari Sejarah - Sejarahnya</p><button class="btn btn-outline-light btn-lg beranda" type="button"><a href="admin/">Beranda</a></button>
            </div>
        </section>
        <section class=" clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">About Us</h2>
                    <p>Website ini diciptakan oleh kelompok kami dengan pembagian sebagian tugas sebagai berikut.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="admin/assets/img/avatars/avatar1.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Dimas Triandi Putra</h4>
                                <p class="card-text">Front - End</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="admin/assets/img/avatars/avatar2.jpeg">
                            <div class="card-body info">
                                <h4 class="card-title">Carissa Farry Hilmi Az Zahra</h4>
                                <p class="card-text">Back-End</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="admin/assets/img/avatars/avatar3.jpeg">
                            <div class="card-body info">
                                <h4 class="card-title">M.Arief GraifhanRamadhan</h4>
                                <p class="card-text">Leaflet</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="admin/assets/img/avatars/avatar4.jpeg">
                            <div class="card-body info">
                                <h4 class="card-title">Nadia Indah Fania Suhariyanti</h4>
                                <p class="card-text">Leaflet</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <!-- MAP GIS -->
        <div class="footer-copyright">
            <div class="box-body">
                <div id="mapid"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign Up</a></li>
                        <li><a href="#">Sign In</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="admin/assets/js/jquery.min.js"></script>
    <script src="admin/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="admin/assets/js/script.min.js"></script>
</body>

</html>

<?php
include 'admin/_halaman/js/leaflet-pointHomeJs.php';
?>