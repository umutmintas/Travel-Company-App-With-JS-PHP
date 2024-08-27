<!DOCTYPE html>
<html lang="en">

<?php
$sayfa = "anasayfa-slider-3";
global $baglanti;
include("ad-include/ahead.php");
$sorgu = $baglanti->prepare("select * from anasayfa_header");
$sorgu->execute();
$sonuc = $sorgu->fetch();
?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mb-2 mt-4">Ana Sayfa  Banner 3</h1>
        <ol class="breadcrumb mb-5 ">
            <li class="breadcrumb-item active"><a class="btn btn-outline-secondary text-decoration-underline btn-sm" href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Banner 3</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Ana Sayfa Banner Düzenleme Alanı
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Banner üst baslik</th>
                        <th>Banner alt basflik</th>
                        <th>Banner images link</th>
                        <th> Bilgileri Düzenle</th>

                    </tr>
                    </thead>

                    <tbody>
                    <tr hidden="hidden">
                        <td><?= $sonuc["Banner_3_Baslik_1"] ?></td>
                        <td><?= $sonuc["Banner_3_Baslik_2"] ?></td>

                        <td>
                            <img style="border-radius: 25px" width="300px" height="200px" src="../assets/images/upload/<?=$sonuc['Banner_3_images']?>" alt=""><br>
                            <p style="margin-left: 100px"> <?= $sonuc["Banner_3_images"] ?>  </p>
                        </td>


                        <td class="text-center">
                            <?php if ($_SESSION["yetki"] == "1") { ?>

                                <a href="anasayfa-slider-3-Guncelle.php?id=<?= $sonuc["id"] ?>)">
                                    <span class="fa fa-edit fa-2xl"></span>
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>

                    </tbody>

                </table>
            </div>
        </div>

    </div>
</main>


<?php
include("ad-include/afooter.php");
?>


</html>




