<!DOCTYPE html>
<html lang="en">
<?php
$sayfa = ("Home-Page");
include("include/Mislina_DB.php");
include("include/head.php");
global $baglanti;
$sorgu = $baglanti->prepare("select * from anasayfa_header");
$sorgu->execute();
$sonuc = $sorgu->fetch();
?>
<body>
  <!-- WhatsApp Butonu -->
  <div class="whatsapp-button"> 
    <a href="https://api.whatsapp.com/send?phone=905555555555" target="_blank">
      <img src="./include/whatsapp.png" alt="WhatsApp">
    </a>
  </div>
  <!-- ***** Main Banner Area Start ***** -->
  <section id="section-1">
    <div class="content-slider">
      <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
      <input type="radio" id="banner2" class="sec-1-input" name="banner">
      <input type="radio" id="banner3" class="sec-1-input" name="banner">
      <input type="radio" id="banner4" class="sec-1-input" name="banner">
      <div id="top-banner-1-/" class="slider">
        <div style="background: url('assets/images/upload/<?= $sonuc["Banner_1_images"] ?>') no-repeat center center; background-size:cover;" id="top-banner-1" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <?php if (!empty($sonuc["Banner_1_Baslik_1"])) {
                echo '<h1>' . $sonuc["Banner_1_Baslik_1"] . '</h1>';
              } ?>
              <br>
              <?php if (!empty($sonuc["Banner_1_Baslik_2"])) {
                echo '
                <a href="reservation">
                <h2  class="btn rounded-4">' . $sonuc["Banner_1_Baslik_2"] . '</h2></a>';
              } ?>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-user"></i>
                        <h4><span>Population:</span><br>4 Million</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-globe"></i>
                        <h4><span>City : </span><br>Antalya</em></h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-plane"></i>
                        <h4><span>Tourist Visited :</span><br>13.500.000</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button ">
                          <a href="reservation">Explore More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div style="background: url('assets/images/upload/<?= $sonuc["Banner_2_images"] ?>') no-repeat center center; background-size: cover;" id="top-banner-2" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <?php if (!empty($sonuc["Banner_2_Baslik_1"])) {
                echo '<h1 href="reservation.php">' . $sonuc["Banner_2_Baslik_1"] . '</h1>';
              } ?>
              <br>
              <?php if (!empty($sonuc["Banner_2_Baslik_2"])) {
                echo '<a href="reservation.php"><h2 class="btn rounded-4">' . $sonuc["Banner_2_Baslik_2"] . '</h2></a>';
              } ?>


            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-user"></i>
                        <h4><span>Population:</span><br>1 Million</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-globe"></i>
                        <h4><span>City :</span><br> Denizli </h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-plane"></i>
                        <h4><span>Tourist Visited:</span><br>2.580.245</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a href="reservation">Explore More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div style="background: url('assets/images/upload/<?= $sonuc["Banner_3_images"] ?>') no-repeat center center; background-size: cover;" id="top-banner-3" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <?php if (!empty($sonuc["Banner_3_Baslik_1"])) {
                echo '<h1>' . $sonuc["Banner_3_Baslik_1"] . '</h1>';
              } ?>
              <br>
              <?php if (!empty($sonuc["Banner_3_Baslik_2"])) {
                echo '<a href="reservation.php"><h2 class="btn rounded-4">' . $sonuc["Banner_3_Baslik_2"] . '</h2></a>';
              } ?>

            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-user"></i>
                        <h4><span>Population:</span><br>310.000</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-globe"></i>
                        <h4><span>City :</span><br>Nevşehir </h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-plane"></i>
                        <h4><span>Touris Visited:</span><br>2.545.158</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a href="reservation">Explore More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div style="background: url('assets/images/upload/<?= $sonuc["Banner_4_images"] ?>') no-repeat center center; background-size: cover;" id="top-banner-4" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">

              <?php if (!empty($sonuc["Banner_4_Baslik_1"])) {
                echo '<h1>' . $sonuc["Banner_4_Baslik_1"] . '</h1>';
              } ?>
              <br>
              <?php if (!empty($sonuc["Banner_4_Baslik_2"])) {
                echo '<a href="reservation.php"><h2 class="btn rounded-4">' . $sonuc["Banner_4_Baslik_2"] . '</h2></a>';
              } ?>

            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-user"></i>
                        <h4><span>Population:</span><br>4 Million </h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-globe"></i>
                        <h4><span>City :</span><br> Antalya </h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-plane"></i>
                        <h4><span>Tourist Visited:</span><br>8.245.600</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a href="reservation">Explore More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="controls">
          <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">1</span></label>
          <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">2</span></label>
          <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">3</span></label>
          <label for="banner4"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">4</span></label>
        </div>
      </nav>
    </div>
  </section>





  <!-- ***** Main Banner Area End ***** -->

  <div class="visit-country">
    <div class="container">
      <div class="row">

        <?php
        $Section_tour = $baglanti->prepare("select * from anasayfa_tour_baslik");
        $Section_tour->execute();
        $Section_tour_sonuc = $Section_tour->fetch();
        ?>

        <div class="col-lg-5">
          <div class="section-heading">
            <h2>Check out our tours and visit one of our cities</h2>
            <p>contact us for detailed information</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="items">
            <div class="row">

              <?php
              $sorgu2 = $baglanti->prepare("select * from anasayfa_tour where aktif=1 ORDER BY Layout ");
              $sorgu2->execute();
              while ($sonuc2 = $sorgu2->fetch()) {
              ?>

                <div class="col-lg-12">
                  <div class="item">
                    <div class="row">
                      <div class="col-lg-4 col-sm-5">
                        <div class="image">
                          <img src="assets/images/<?= $sonuc2["images"] ?>" alt="images">
                        </div>
                      </div>
                      <div class="col-lg-8 col-sm-7">
                        <div class="right-content">
                          <h4><?= $sonuc2["Baslik"] ?></h4>
                          <span></span>
                          <div class="main-button">
                            <a href="tours">Explore More</a>
                          </div>
                          <p><?= $sonuc2["Aciklama"] ?></p>
                          <ul class="info">
                            <li><i class="fa fa-clock"></i> <b>Tour Hour:</b> <?= $sonuc2["Tour_time"] ?></li>
                            <li><i class="fa fa-map"></i><b>place Visited :</b> <?= $sonuc2["Tour_place"] ?></li>
                            <li><i class="fa fa-van-shuttle"></i><b> Transfer Service :</b> <?= $sonuc2["Tour_transfer"] ?></li>
                          </ul>
                          <div class="text-button">
                            <a href="reservation">Need Directions ? <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
              <!-- Page Number İcon -->
              <div class="col-lg-12" hidden>
                <ul class="page-numbers">
                  <li><a href="#"><i class="fa fa-arrow-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="fa fa-arrow-right"></i></a></li>
                </ul>
              </div>
              <!-- Page Number İcon -->
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="side-bar-map">
            <div class="row">
              <div class="col-lg-12">
                <div id="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14524.273431527641!2d29.11320363497978!3d37.9193943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c71234f193a1f3%3A0x60b2bbc7e5eb3661!2sMislina%20Travel!5e1!3m2!1str!2str!4v1706279197895!5m2!1str!2str" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" width="100%" height="550px" frameborder="0" style="border:1px; border-radius: 25px; " allowfullscreen=""></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Are You Looking To Travel ?</h2>
          <h4>Make A Reservation By Clicking The Button</h4>
        </div>
        <div class="col-lg-4">
          <div class="border-button">
            <a href="reservation.html">Book Yours Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
  include("include/footer.php");
  ?>

  <script>
    function bannerSwitcher() {
      next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
      if (next.length) next.prop('checked', true);
      else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function() {
      clearInterval(bannerTimer);
      bannerTimer = setInterval(bannerSwitcher, 5000)
    });
  </script>

</body>

</html>