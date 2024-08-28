<html lang="en">

<?php
$sayfa = ("About-Page");
include("include/Mislina_DB.php");
include("include/head.php");
global $baglanti;
?>

<body>
  <!-- WhatsApp Butonu -->
  <div class="whatsapp-button"> 
    <a href="https://api.whatsapp.com/send?phone=905330338400" target="_blank">
      <img src="./include/whatsapp.png" alt="WhatsApp">
    </a>
  </div>
    <!-- ***** Main Banner Area Start ***** -->
    <div class="about-main-content">
        <div class="container">
            <div class="row">
                <?php
                $sorgu_about = $baglanti->prepare("select * from about_banner");
                $sorgu_about->execute();
                $sonuc_about = $sorgu_about->fetch();
                ?>
                <div class="col-lg-12">
                    <div class="content">
                        <div class="blur-bg"></div>
                        <h4> Explore Turkey</h4>
                        <div class="line-dec"></div>
                        <h2>Reach all tours in Turkey with Mislina Travel assurance</h2>
                        <p><?= $sonuc_about["about_baslik_3"] ?></p>
                        <div class="main-button hover">
                            <a href="reservation.html"><?= $sonuc_about["about_buton_baslik"] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Main Banner Area End ***** -->
    <div class="cities-town" hidden="hidden">
        <div class="container">
            <div class="row">
                <div class="slider-content">
                    <div class="row">
                        <?php
                        $sorgu_cities = $baglanti->prepare("select * from about_cities_baslik");
                        $sorgu_cities->execute();
                        $sonuc_cities = $sorgu_cities->fetch();
                        ?>
                        <div class="col-lg-12">
                            <h2><em><?= $sonuc_cities["cities_baslik"] ?></em></h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="owl-cites-town owl-carousel">
                                <?php
                                $sorgu_cities_images = $baglanti->prepare("select * from about_cities_content where active=1 ORDER BY layout ");
                                $sorgu_cities_images->execute();
                                while ($sonuc_cities_images = $sorgu_cities_images->fetch()) {
                                ?>
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="assets/images/<?= $sonuc_cities_images["city_images"] ?>" alt="">
                                            <h4><?= $sonuc_cities_images["city_name"] ?></h4>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="amazing-deals">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="section-heading text-center">
                        <h2>Our services we offer to our valued customers</h2>
                        <p style=" font-size: 16px; line-height: 25px; border-radius: 18px; padding: 15px; background-color: rgba(87,186,87,0.29); color: #000;" class="mt-lg-5 box-anim">Thousands of tourists come to Turkey to explore the touristic spots from all over
                            the world and
                            during this whole trip process, they deal with many troubles such as airplane, accommodation,
                            car rental, exploring the sightseeing spots. You can access all these services from a single
                            point and reliable sources with Mislina Travel difference without dealing with these
                            inconveniences as thousands of tourists do every year. If you want to join the tour organized
                            daily from every point of Turkey, contact us to join the tour and access accommodation needs,
                            car rental, airport service and many services without any problems with the difference of
                            Mislina Travel CLICK FOR INFORMATION </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HİZMETLER -->
    <span class="">
        <span class="centering">
            <section class="articles">
                <?php
                $sorgu_servicess = $baglanti->prepare("select * from about_service_content where aktif=1 ORDER BY layout ");
                $sorgu_servicess->execute();
                while ($sonuc_servicess = $sorgu_servicess->fetch()) {
                ?>
                    <article class=" btn-primary mb-lg-5">
                        <figure>
                            <a href="https://yorukhotelpamukkale.com/"> <img src="assets/images/<?= $sonuc_servicess["services_images"] ?>" alt="Preview" title="Preview" /> </a>
                        </figure>
                        <div class="article-preview">
                            <a href="https://yorukhotelpamukkale.com/">
                                <h2> <?= $sonuc_servicess["services_header"] ?> </h2>
                            </a>
                            <p style="color: #0d0d0d"><?= $sonuc_servicess["services_description"] ?>
                            </p>
                        </div>
                    </article>
                <?php
                }
                ?>
            </section>
        </span>
    </span>
    <!-- İndirim Uygulanacak Tur Alanı-->
    <div class="weekly-offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Access all tours in Turkey with TRAVEL difference</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Place Card -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-weekly-offers owl-carousel">
                        <?php
                        $sorgu_tour_extra = $baglanti->prepare("select * from tour_card_extra where aktif=1");
                        $sorgu_tour_extra->execute();
                        $sonuc_tour_extra = $sorgu_tour_extra->fetch();

                        while ($sonuc_tour_extra = $sorgu_tour_extra->fetch()) {
                        ?>
                            <div class="item">
                                <div class="thumb">
                                    <img src="assets/images/<?= $sonuc_tour_extra["card_images"] ?>" alt="">
                                    <div class="text">
                                        <h4> <?= $sonuc_tour_extra["card_baslik"] ?> <br><span> </span></h4>
                                        <h6><?= $sonuc_tour_extra["card_fiyat"] ?><br><span>/person</span></h6>
                                        <p style="font-size: 14px; display:table-row"> <?= $sonuc_tour_extra["card_aciklama"] ?> <br><span> </span></p>
                                        <div class="line-dec"></div>
                                        <ul>
                                            <li>Deal Includes:</li>
                                            <?php if (!empty($sonuc_tour_extra["card_prop_1"])) {
                                                echo "<li> | " . $sonuc_tour_extra["card_prop_1"] . '</li>';
                                            } ?>
                                            <?php if (!empty($sonuc_tour_extra["card_prop_2"])) {
                                                echo "<li> | " . $sonuc_tour_extra["card_prop_2"] . '</li>';
                                            } ?>
                                            <?php if (!empty($sonuc_tour_extra["card_prop_3"])) {
                                                echo "<li> | " . $sonuc_tour_extra["card_prop_3"] . '</li>';
                                            } ?>
                                            <?php if (!empty($sonuc_tour_extra["card_prop_4"])) {
                                                echo "<li> | " . $sonuc_tour_extra["card_prop_4"] . '</li>';
                                            } ?>
                                            <?php if (!empty($sonuc_tour_extra["card_prop_5"])) {
                                                echo "<li> | " . $sonuc_tour_extra["card_prop_5"] . '</li>';
                                            } ?>
                                        </ul>
                                        <div class="main-button">
                                            <a href="<?= $sonuc_tour_extra["card_link"] ?>">Make a Reservation</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="more-about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="left-image">
                            <img src="assets/images/about-left-image.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-heading">
                            <h2>learn more about Mislina Travel</h2>
                            <p>With Mislina Travel difference, you can instantly access daily and weekly tours to every city
                                in
                                Turkey, please <a href="reservation.php">contact us</a> for detailed information about the
                                tours.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="info-item box-anim">
                                    <h4>60.000 +</h4>
                                    <span>Total Guests Yearly</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-item box-anim">
                                    <h4>25.000 +</h4>
                                    <span>Amazing Accomoditations</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-item box-anim">
                                    <h4>420 +</h4>
                                    <span>Total Tour Yearly</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-item box-anim">
                                    <h4>58 +</h4>
                                    <span>Places to visit in turkey</span>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer üst yazısı -->
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
    </div>

</body>

</html>