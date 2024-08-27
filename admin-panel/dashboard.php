<!DOCTYPE html>
<html lang="en">

<?php
$sayfa = "Dashboard-ad";
include("ad-include/ahead.php");
global $sonucOkundu;
global $baglanti;
$sorgu = $baglanti->prepare("select * from anasayfa_header");
$sorgu->execute();
$sonuc = $sorgu->fetch();


?>


<!--- Sonradan Eklenen CDN ---->
<script src="https://cdn.tailwindcss.com/3.0.12"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>


<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">


<main>

    <div class="container-fluid px-6">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-5">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>


        <h3 class="text-end btn">Hızlı Erişim Alanı</h3>
        <div class="row">
            <div class="col-xl-2 col-md-2">
                <div style="border-radius:10px" class="card bg-primary text-white mb-4">
                    <div class="card-body">Slider 1 Ayarları</div>
                    <img style="max-height: 150px; min-height: 100px"
                         src="../assets/images/upload/<?= $sonuc['Banner_1_images'] ?>">
                    <div class="card-footer d-flex align-items-center">
                        <a class="small text-white stretched-link" href="anasayfa.php">Ayarlara Git</a>
                        <div class="small text-white">&nbsp;&nbsp;<i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            &nbsp;
            <div class="col-xl-2 col-md-2">
                <div style="border-radius:10px" class="card bg-primary text-white mb-4">
                    <div class="card-body">Slider 2 Ayarları</div>
                    <img style="max-height: 150px; min-height: 100px"
                         src="../assets/images/upload/<?= $sonuc['Banner_2_images'] ?>">
                    <div class="card-footer d-flex align-items-center">
                        <a class="small text-white stretched-link" href="anasayfa-slider-2.php">Ayarlara Git</a>
                        <div class="small text-white">&nbsp;&nbsp;<i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            &nbsp;
            <div class="col-xl-2 col-md-2">
                <div style="border-radius:10px"class="card bg-primary text-white mb-4">
                    <div class="card-body">Slider 3 ayarları</div>
                    <img style="max-height: 150px; min-height: 100px"
                         src="../assets/images/upload/<?= $sonuc['Banner_3_images'] ?>">
                    <div class="card-footer d-flex align-items-center">
                        <a class="small text-white stretched-link" href="anasayfa-slider-3.php">Ayarlara Git</a>
                        <div class="small text-white">&nbsp;&nbsp;<i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            &nbsp;
            <div class="col-xl-2 col-md-2">
                <div style="border-radius:10px" class="card bg-primary text-white mb-4">
                    <div class="card-body">Slider 4 Ayarları</div>
                    <img style="max-height: 150px; min-height: 100px"
                         src="../assets/images/upload/<?= $sonuc['Banner_4_images'] ?>">
                    <div class="card-footer d-flex align-items-center ">
                        <a class="small text-white stretched-link" href="anasayfa-slider-4.php">Ayarlara Git</a>
                        <div class="small text-white">&nbsp;&nbsp;<i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            &nbsp;
            <div style="border-radius:10px" class="col-lg-3 col-md-2 small-box bg-primary ">
                <div  class="inner">
                    <h3><span id="okunmaSayisi" class="badge btn btn-success"></span></h3>
                    <p>Ana Sayfa Vitrin Turlar</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-chart-bar fa-fade"></i>
                </div>
                <a href="anasayfa-tour.php" style="margin-top: 50px" class="small-box-footer">
                    Vitrin Turlarına Git <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            &nbsp;
            
            <div style="border: solid 3px forestgreen; border-radius: 20px;" class="ml-2 col-lg-3 col-md-2 small-box bg-success">
                <div class="inner">
                    <h3><span id="okunmaSayisi" class="badge btn btn-success"></span></h3>
                    <p style="text-align-last: center; background-color: seagreen; border-radius: 5px; " >Hizmetler</p>
                </div>
                <div class="icon">
                </div>
                <a href="hakkımızda-servisler.php" class="medium-box-footer btn btn-success">Hizmetlere Git &nbsp;<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            &nbsp;
            <div style="border: solid 3px forestgreen; border-radius: 20px;" class="ml-2 col-lg-3 col-md-2 small-box bg-success">
                <div class="inner">
                    <h3><span id="okunmaSayisi" class="badge btn btn-success"></span></h3>
                    <p style="text-align-last: center; background-color: seagreen; border-radius: 5px; " >Turlar</p>
                </div>
                <div class="icon">
                </div>
                <a href="Deals-Tur.php" class="medium-box-footer btn btn-success">Tur Düzenle&nbsp;<i class="fas fa-arrow-circle-right"></i>
                <a style="float:right;" href="Tour-card-ekstra.php" class="medium-box-footer btn btn-success">Slider Tur Düzenle &nbsp;<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            &nbsp;
             <div style="border: solid 3px forestgreen; border-radius: 20px;" class="ml-2 col-lg-3 col-md-2 small-box bg-success ">
                <div class="inner">
                    <h3>
                        
                        <span id="okunmaSayisi" class="badge active btn btn-success "><?= $sonucOkundu["sayi"] ?>
                        </span>
                    </h3>
                    <p>Rezervasyon Talepleri</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-envelope-circle-check"></i>
                </div>
                <a href="iletisimformu.php" class="small-box-footer">
                    Rezervasyonlara Git <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            &nbsp;
            <div style="border: solid 3px sandybrown; border-radius: 20px; background-color:#ffc107;" class="ml-2 col-lg-2 col-md-2 small-box ">
                <div class="inner">
                    <h3><span id="okunmaSayisi" class="badge btn btn-success"></span></h3>
                    <p style="text-align-last: center; background-color: sandybrown; border-radius: 5px; " >Yapılacaklar Listesi</p>
                </div>
                <div class="icon">
                </div>
                <a href="Todo-List.php" class="medium-box-footer btn btn-warning">Listeye Git &nbsp;<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4 mt-3">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart M
                        </div>
                        <div class="card-body">
                            <canvas id="myAreaChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card mb-4 mt-3">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart E
                        </div>
                        <div class="card-body">
                            <canvas id="myBarChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card mb-4 mt-3">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Most Populer Destination    
                        </div>
                        <div class="card-body">
                        <div id="myChart" style="max-width:700px; height:400px"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card mb-4 mt-3">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Most Populer Tour Package
                        </div>
                        <div class="card-body">
                        <div id="myChart2" style="max-width:700px; height:400px"></div>
                        </div>
                    </div>
                </div>


            </div>

            &nbsp;
            <div hidden class="col-lg-3 col-md-2 small-box bg-primary">
                <div class="inner">
                    <h3><span id="okunmaSayisi" class="badge btn btn-primary">352</span></h3>
                    <p>Site Görüntülemeleri</p>
                </div>
                <div class="icon">]
                    <i class="fa-regular fa-eye"></i>
                </div>
                <a href="iletisimformu.php" class="small-box-footer">
                    Rezervasyonlara Git <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>

            

        </div>
</main>

<!-- Google Charts Kullanmak için kullandigim kütüphane -->
<script src="https://www.gstatic.com/charts/loader.js"></script>


<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Contry', 'Tour'],
  ['İstanbul 7 day',35],
  ['Antalya 5 day',25],
  ['İzmir 14 day',20],
  ['Pamukkale 5 day',25]
]);

// Set Options
const options = {
  title:''
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart2'));
chart.draw(data, options);

}
</script>



<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Contry', 'City'],
  ['İstanbul',90],
  ['Antalya',70],
  ['İzmir',50],
  ['Pamukkale',40],
  ['Kapadokya',30]
]);

// Set Options
const options = {
  title:''
  
};

// Draw
const chart = new google.visualization.BarChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>


<?php
include("ad-include/afooter.php");
?>


</html>




