<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/css/tour-card-c.css">

<?php
$sayfa = ("Tours-Page");
include("include/head.php");
include("include/Mislina_DB.php");
global $baglanti;
?>

<body>

    <!-- WhatsApp Butonu -->
    <div class="whatsapp-button">
        <a href="https://api.whatsapp.com/send?phone=905330338400" target="_blank">
            <img src="./include/whatsapp.png" alt="WhatsApp">
        </a>
    </div>

    <div class="page-heading">
        <div class="container">
            <div class="row duzen-8">
                <div class="col-lg-10">
                    <h4>Discover Our Weekly Offers</h4>
                    <h2>Amazing Prices & More</h2>
                    <div class="btn-outline-primary"><a class="btn btn-outline-primary" href="">Discover More</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="search-form" hidden>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form id="search-form" name="" method="post" role="search" action="#">

                        <div class="row">
                            <div class="col-lg-2">
                                <h4>Sort Deals By:</h4>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>

                                    <select name="Location" class="form-select" aria-label="Default select example" id="chooseLocation" onChange="showSelectedOption()">
                                        <option selected>Locations</option>
                                        <option type="checkbox" name="option1" value="italy">italy</option>
                                        <option value="pamukkale">pamukkale</option>
                                        <option value="fethiye">Fethiye</option>
                                        <option value="maldivler">Maldivler</option>
                                        <option value="didim">Didim</option>
                                        <option value="antalya">Antalya</option>
                                        <option value="bodrum">Bodrum</option>
                                        <option value="cappadocia">Cappadocia</option>
                                        <option value="istanbul">İstanbul</option>
                                        <option value="izmir">İzmir</option>
                                        <option value="side">Side</option>
                                        <option value="fethiye">Fethiye</option>
                                        <option value="marmaris">Marmaris</option>
                                        <option value="didim">Didim</option>
                                        <option value="alanya">Alanya</option>
                                        <option value="belek">Belek</option>
                                        <option value="konya">Konya</option>

                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <select name="Price" class="form-select" aria-label="Default select example" id="choosePrice" onChange="showSelectedOption()">
                                        <option selected>Price Range</option>
                                        <option value="100">$100</option>
                                        <option value="250">$250</option>
                                        <option value="500">$500</option>
                                        <option value="1000">$1,000</option>
                                        <option value="2500+">$2,500+</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="mt-3 row-cols-sm-12">
                                <fieldset>
                                    <button class="border-button">Search Results</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fiyat Seçici END-->


    <!-- ======================== -->
    <!-- Just Copy The Code Below -->


    <?php

    $sorgu_tour = $baglanti->prepare("SELECT * from tour_cards where aktif=1 ORDER BY id ");
    $sorgu_tour->execute();
    $sonuc_tour = $sorgu_tour->fetch();

    while ($sonuc_tour = $sorgu_tour->fetch()) {
    ?>
        <div id="targetvalue" style="display: none;" class="d-flex">
            <section class="main-card" id="mainCard">

                <div class="card-content">

                    <a class="left-cont" href="assets/images/<?= $sonuc_tour["card_images"] ?>" data-lightbox="gallery">
                        <img class="full-img" src="assets/images/<?= $sonuc_tour["card_images"] ?>" alt="image">
                    </a>
                    <div class="content-right">

                        <p class="tur-adver">Tour announcement : <?= $sonuc_tour["id"] ?></p>


                        <div <?php echo (!empty($sonuc_tour['card_etiket'])) ? ' class="tag"  style="background-color: #109170BC"' : ''; ?>>
                            <h6 style="color: #ffffff"><?= $sonuc_tour["card_etiket"] ?></h6>
                        </div>

                        <h2 class="mb-4"><!-- Ana Başlık --> <?= $sonuc_tour["card_baslik"] ?></h2>

                        <p class="mb-3"> <!-- Açıklama --> <?= $sonuc_tour["card_aciklama"] ?> </p>
                        <!-- icons-->
                        <div class="card-content-icons flex-nowrap">
                            <div <?php echo (!empty($sonuc_tour['card_prop_clock'])) ? 'class="col-4 btn-sm btn btn-secondary"' : ''; ?>>
                                <i <?php echo (!empty($sonuc_tour['card_prop_clock'])) ? 'cl
                                ass="fa fa-clock fa-lg"' : ''; ?>></i>
                                <span class="list"><!-- Tur Saat Bilgisi --> <?= $sonuc_tour["card_prop_clock"] ?></span>
                            </div>
                            &nbsp;
                            <div <?php echo (!empty($sonuc_tour['card_prop_visited'])) ? 'class="col-4 btn-sm btn btn-secondary"' : ''; ?>>
                                <i <?php echo (!empty($sonuc_tour['card_prop_visited'])) ? 'class="fa fa-map"' : ''; ?>></i>
                                <span class="list"> <!-- Tur ziyaret edilme Bilgisi --> <?= $sonuc_tour["card_prop_visited"] ?></span>
                            </div>
                            &nbsp;
                            <div <?php echo (!empty($sonuc_tour['card_prop_transfer'])) ? 'class="col-4 btn-sm btn btn-secondary"' : ''; ?>>
                                <i <?php echo (!empty($sonuc_tour['card_prop_transfer'])) ? 'class="fa fa-van-shuttle fa-lg"' : ''; ?>></i>
                                <span class="list"><?= $sonuc_tour["card_prop_transfer"] ?></span>
                            </div>

                        </div>


                        <div class="alert alert-primary " role="alert">
                            If you would like to make a reservation for this tour or get more information. <a href="#" class="alert-link">Just send us the tour number above when you make a <a href="reservation">reservation</a>.</a>
                        </div>


                        <div class="tag_buton box-anim"><a href="reservation">
                                <h5> <?= $sonuc_tour["card_price"] ?> </h5>
                            </a>
                        </div>



                    </div>

                </div>

            </section>
        </div>
    <?php
    }
    ?>


    <!-- Just Copy The Code Above -->
    <!-- ======================== -->

    <!-- İndirim Uygulanacak Tur Alanı-->
    <div class="weekly-offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Access all tours in Turkey with MİSLINA TRAVEL difference</h2>
                        <p>With Mislina Travel difference, you can instantly access daily and weekly tours to every city in
                            Turkey, please contact us for detailed information about the tours.</p>
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
                        $sorgu_tour_extra = $baglanti->prepare("select * from tour_card_extra where aktif=1 DESC");
                        $sorgu_tour_extra->execute();
                        $sonuc_tour_extra = $sorgu_tour_extra->fetch();
                        while ($sonuc_tour_extra = $sorgu_tour_extra->fetch()) {
                        ?>

                            <div class="item">
                                <div class="thumb">

                                    <img class="full-img" src="assets/images/<?= $sonuc_tour_extra["card_images"] ?>" alt="İmages">
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


        <!-- Footer Area-->
        <div class="call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2>Are You Looking To Travel ?</h2>
                        <h4>Make A Reservation By Clicking The Button</h4>
                    </div>
                    <div class="col-lg-4">
                        <div class="border-button">
                            <a href="reservation.html">Communication</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>

function showSelectedOption() {
  const selectedValue = document.getElementById("chooseLocation").value;
  const targetElement = document.getElementById("targetvalue");

  if (selectedValue === '<?= $sonuc_tour["card_etiket"] ?>') {
    targetElement.style.display = "block";
  } else {
    targetElement.style.display = "none";
  }
}

</script>

        <?php
        include("include/footer.php");
        ?>

</body>

</html>