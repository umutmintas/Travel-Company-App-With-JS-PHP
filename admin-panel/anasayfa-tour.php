<!DOCTYPE html>
<html lang="en">

<?php
$sayfa = "Ana Sayfadaki Tur İlanları";
global $baglanti;
include("ad-include/ahead.php");
$sorgu = $baglanti->prepare("select * from anasayfa_tour");
$sorgu->execute();
$sonuc = $sorgu->fetch();
?>


<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4"><?= $sayfa ?></h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active"><?= $sayfa ?></li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">

                <a class="btn btn-outline-primary" href="anasayfa-tour-ekle.php">Tour Ekle</a>
                <a class="btn btn-outline-primary" href="anasayfa-tour.php">Verileri Güncelle</a>


            </div>
            <div class="card-body">
                <table class="table table-bordered" id="datatablesSimple">
                    <thead>
                    <tr>

                        <th>NO</th>
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th>Tour Time</th>
                        <th>Tour Place</th>
                        <th>Tour Transfer</th>
                        <th>İmages</th>
                        <th>Aktif</th>
                        <th>Sil</th>
                        <th></th>
                        <th></th>

                    </tr>
                    </thead>


                    <tbody>

                    <?php
                    $sorgu = $baglanti->prepare("select * from anasayfa_tour");
                    $sorgu->execute();
                    while ($sonuc = $sorgu->fetch()) {
                        ?>

                        <tr>


                            <td>
                                <?= $sonuc['id'] ?>
                            </td>

                            <td contenteditable="true" onBlur="veriKaydet(this,'Baslik','<?= $sonuc['id'] ?>')"
                                onClick="duzenle(this);">
                                <?= $sonuc['Baslik'] ?>
                            </td>

                            <td contenteditable="true" onBlur="veriKaydet(this,'Aciklama','<?= $sonuc['id'] ?>')"
                                onClick="duzenle(this);">
                                <?= $sonuc['Aciklama'] ?>
                            </td>

                            <td contenteditable="true" onBlur="veriKaydet(this,'Tour_time','<?= $sonuc['id'] ?>')"
                                onClick="duzenle(this);">
                                <?= $sonuc['Tour_time'] ?>
                            </td>

                            <td contenteditable="true" onBlur="veriKaydet(this,'Tour_place','<?= $sonuc['id'] ?>')"
                                onClick="duzenle(this);">
                                <?= $sonuc['Tour_place'] ?>
                            </td>

                            <td contenteditable="true" onBlur="veriKaydet(this,'Tour_transfer','<?= $sonuc['id'] ?>')"
                                onClick="duzenle(this);">
                                <?= $sonuc['Tour_transfer'] ?>
                            </td>


                            <td>
                                <img style="width: 200px; height: 100px; border-radius: 15px"
                                     src="../assets/images/<?= $sonuc['images'] ?>">
                                <br>
                                <p class="text-center"><?= $sonuc['images'] ?></p>
                            </td>


                            <!-- Aktif pasif Swich Button-->
                            <td>
                                <link href="css/switch.css" rel="stylesheet">
                                <label class="switch">
                                    <!-- checkbox a id ve checked bilgilerini ekliyoruz -->
                                    <input type="checkbox" id='<?= $sonuc['id'] ?>'
                                           class="aktifPasif" <?= $sonuc['aktif'] == 1 ? 'checked' : '' ?> />
                                    <span class="slider round"></span>
                                </label>

                            </td>

                            <!-- Güncelle Butonu-->
                            <td hidden class="text-center"><?php if ($_SESSION["yetki"] == "1") { ?>
                                    <a href="anasayfa-tour-Guncelle.php?id=<?= $sonuc["id"] ?>)">
                                        <span class="fa fa-edit fa-2xl"></span>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>


                            <!-- Sil Butonu -->
                            <td class="text-center">
                                <?php if ($_SESSION["yetki"] == "1") {
                                    ?>
                                    <a href="#" data-toggle="modal" data-target="#silModal<?= $sonuc["id"] ?>"><span><i
                                                    class="fa-solid fa-trash-can fa-2x text-danger"></i></span></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="silModal<?= $sonuc["id"] ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="logoutModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <a class="modal-title" id="exampleModalLabel"><span
                                                                class="fa fa-edit fa-2xl"></span></a>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="d-grid gap-2 col-6 mx-auto">
                                                        <p class="text-center align-content-center btn btn-primary "> <?= $sonuc["Baslik"] ?> </p>
                                                    </div

                                                    <p class="text-center align-content-center  btn-primary "> <?= $sonuc["Aciklama"] ?> </p>


                                                    <img class="align-content-center"
                                                         style=" width: 450px ;height: 200px; border-radius: 15px"
                                                         src="../assets/images/<?= $sonuc["images"] ?>">
                                                    <br>
                                                    <br>

                                                    <p class="text-center btn-lg">Silmek istediğinizden emin misiniz
                                                        ?</P>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">İptal
                                                    </button>
                                                    <a href="sil.php?id=<?= $sonuc["id"] ?>&tablo=anasayfa_tour"
                                                       class="btn btn-danger">Sil</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>


<?php
include("ad-include/afooter.php");
?>

<script>$(document).ready(function () {
        $('.aktifPasif').click(function (event) {
            var id = $(this).attr("id");  //id değerini alıyoruz

            var durum = ($(this).is(':checked')) ? '1' : '0';
            //checkbox a göre aktif mi pasif mi bilgisini alıyoruz.

            $.ajax({
                type: 'POST',
                url: 'ad-include/aktif-pasif-button.php',  //işlem yaptığımız sayfayı belirtiyoruz
                data: {id: id, tablo: 'anasayfa_tour', durum: durum}, //datamızı yolluyoruz
                success: function (result) {
                    $('#sonuc').text(result);
                    //gelen sonucu h2 tagında gösteriyoruz
                },
                error: function () {
                    alert('Hata');
                }
            });
        });
    });</script>

<script>
    function duzenle(deger) {
        $(deger).css("background", "#e5ffdb");
        //seçilen hücrenin rengini değiştiriyoruz
    }

    function veriKaydet(deger, alan, id) {
        $(deger).css("background", "#FFF url(yukleniyor.gif) no-repeat right");

        $.ajax({
            url: "ad-include/düzenle-kaydet.php", //verileri göndereceğimiz url
            type: "POST", //post ile gönderilecek
            data: 'tablo=anasayfa_tour&alan=' + alan + '&deger=' + deger.innerHTML.split('+').join('{0}') + '&id=' + id,
            // verileri alan deger ve id olarak yolluyoruz
            //+ (artı) post edilirken boşluk ile değişiyor
            //bunu engellemek için + değeri {0} ile değiştirdim
            //kayıt yaparkende index.php de geri değişimini yapıyoruz
            success: function (data) {
                if (data == true) {
                    $(deger).css("background", "#fff");
                    // eğer veriler veri tabanına yazılmış ise hücrenin
                    //arka plan rengini beyaza geri döndürüyoruz
                } else {
                    $(deger).css("background", "#f00");
                    $("#sonuc").text("Hata veri düzenlenmedi");

                    //Eğer hata varsa hücre rengini kırmızı ve
                    // tablo altında hata mesajı yazdırıyoruz
                }
            }
        });
    }
</script>


</html>




