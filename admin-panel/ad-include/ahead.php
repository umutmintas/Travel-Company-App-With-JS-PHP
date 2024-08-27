<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
global $baglanti;
global $_SESSION;

if (!(isset($_SESSION["Oturum"]))) {
    header("location: dashboard.php");
}

include ('../include/Mislina_DB.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?=$sayfa?>- Mislina Admin -</title>


    <!-- Font Awesome İCON CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"></script>




    <!--  data table simple cdn
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" crossorigin="anonymous" />
    -->

<!-- Hızlı veri düzenleme alanı jquery -->
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

    <link href="css/styles.css" rel="stylesheet"/>





<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">Travel Agency</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <a href="https://mislinatravel.com/" target="_blank" class="btn btn-primary text-center" >Web Siteyi Önizle</a>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="kullanıcı.php">Ayarlar</a>
              </li>
                <li hidden="hidden"><a class="dropdown-item" href="#!">Log Activity</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item btn-outline-primary" href="logout.php" data-toggle="modal" data-target="#logoutModal">Çıkış Yap</a>
                </li>
                <li>

                </li>
            </ul>
        </li>
    </ul>

</nav>

<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Çıkış</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center"> <label class="btn btn-outline-primary"><?=$_SESSION["kadi"]?></label> </div>
                <div class="text-center"> Çıkış yapmak istediğinizden emin misiniz ?</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                <a href="logout.php" class="btn btn-danger">Çıkış</a>
            </div>
        </div>
    </div>
</div>
<!---->

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Admin Dashboard</div>
                    <a class="nav-link <?=$sayfa=="Dashboard-ad"?"active":""?> " href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: #80c6ff"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">- Sayfalar -</div>

                    <a class="nav-link collapsed <?= $sayfa=="Ana Sayfa-ad" || $sayfa=="Ana Sayfa Tour Card" ?"active":""?>" href="index.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fa-regular fa-newspaper" style="color: #80c6ff;"></i>
                        </div>
                        Ana Sayfa Düzenle
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link btn-outline-primary <?=$sayfa=="Ana Sayfa-ad"?"active":""?>" href="anasayfa.php">Slider-1</a>
                            <a class="nav-link btn-outline-primary <?=$sayfa=="anasayfa-slider-2"?"active":""?>" href="anasayfa-slider-2.php">Slider-2</a>
                            <a class="nav-link btn-outline-primary <?=$sayfa=="anasayfa-slider-3"?"active":""?>" href="anasayfa-slider-3.php">Slider-3</a>
                            <a class="nav-link btn-outline-primary <?=$sayfa=="anasayfa-slider-4"?"active":""?>" href="anasayfa-slider-4.php">Slider-4</a>
                            <a class="nav-link btn-outline-primary <?=$sayfa=="Ana Sayfa Tour Card"?"active":""?>" href="anasayfa-tour.php">Anasayfa Vitrin Tur</a>
                        </nav>
                    </div>


                    <!-- Hakkımızda sayfası hizmet kartları -->

                    <a class="nav-link collapsed <?= $sayfa=="" || $sayfa=="Ana Sayfa Tour Card" ?"active":""?>" href="index.php" data-bs-toggle="collapse" data-bs-target="#hakkımızda" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fa-regular fa-newspaper" style="color: #80c6ff;"></i>
                        </div>
                        Hakkımızda Düzenle
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="hakkımızda" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                            <a class="nav-link btn-outline-primary <?=$sayfa=="Hakkımızda Hizmet Kartları"?"active":""?>" href="hakkımızda-servisler.php">Hizmetler</a>

                        </nav>
                    </div>

                    <!-- TUR SAYFASI -->

                    <a class="nav-link collapsed <?= $sayfa=="Ana Sayfa-ad" || $sayfa=="Ana Sayfa Tour Card" ?"active":""?>" href="index.php" data-bs-toggle="collapse" data-bs-target="#tourcollapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fa-regular fa-newspaper" style="color: #80c6ff;"></i>
                        </div>
                        Tur Sayfası Düzenle
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="tourcollapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link btn-outline-primary <?=$sayfa=="Tur Kartları"?"active":""?>" href="Deals-Tur.php">Tur İlanları</a>
                            <a class="nav-link btn-outline-primary <?=$sayfa=="Tur Kart Ekstra"?"active":""?>" href="Tour-card-ekstra.php">Tour Kartları </a>
                        </nav>
                    </div>


                    <?php
                    $sorguOkundu=$baglanti->prepare('SELECT COUNT(*) AS sayi FROM contact_page WHERE okundu=0');
                    $sorguOkundu->execute();
                    $sonucOkundu=$sorguOkundu->fetch();
                    global $sonucOkundu;
                    ?>
                    <a class="nav-link <?=$sayfa=="Reservasyon Talepleri"?"active":""?>" href="iletisimformu.php">
                            <i class="fa-regular fa-envelope" style="color: #98ff8c"></i>&nbsp;
                        </i> Rezervasyon Talepleri &nbsp; <span id="okunmaSayisi" class="badge">  </span></a>


                    <?php if ($_SESSION["yetki"] == "1"){?>

                        <a class="nav-link <?=$sayfa=="Todo-List"?"active":""?>" href="Todo-List.php">

                            <i class="fa-regular fa-rectangle-list" style="color: #fef958"></i> &nbsp;

                            </i> Todo-List &nbsp; <span id="okunmaSayisi" class="badge">  </span></a>

                    <div class="sb-sidenav-menu-heading">Kullanıcı işlemleri</div>

                    <a class="nav-link collapsed <?= $sayfa=="Ana Sayfa-ad" || $sayfa=="Ana Sayfa Tour Card" ?"active":""?>" href="kullanıcı.php" data-bs-toggle="collapse" data-bs-target="#kullanıcılar" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-circle-user" style="color: #80c6ff"></i>
                        </div>Kullanıcı işlemleri<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="kullanıcılar" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?=$sayfa=="kullanıcılar"?"active":""?>" href="kullanıcı.php">Kullanıcılar</a>
                        </nav>
                    </div>

                    <?php }?>





                </div>
            </div>
            <div class="sb-sidenav-footer text-center">
                <div href="#" class="medium form-label btn btn-outline-secondary" >User : <span style="color: #c2c2c2"><?=$_SESSION["kadi"]?></span></div>

            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
