<!DOCTYPE html>
<html lang="en">
<?php
$sayfa = "Tur Kart Ekstra Güncelle";
include("ad-include/ahead.php");
global $baglanti;

if ($_SESSION["yetki"] != "1") {

    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='index.php'}}) </script>";
    exit;
}

$id = $_GET['id'];
$sorgu = $baglanti->prepare("select * from tour_card_extra where id=:id");
$sorgu->execute(['id' => $id]);
$sonuc = $sorgu->fetch();


if ($_POST) {


    $aktif = 0;
    if (isset($_POST["aktif"])) $aktif = 1;

    $hata = '';

    // Form alanlarını ve dosyanın gönderilip gönderilmediğini kontrol et
    if (
        isset($_POST["card_baslik"]) &&
        isset($_POST["card_aciklama"]) &&
        /*
        isset($_POST["card_prop_1"]) &&
        isset($_POST["card_prop_2"]) &&
        isset($_POST["card_prop_3"]) &&
        isset($_POST["card_prop_4"]) &&
        isset($_POST["card_prop_5"]) &&
        */
        isset($_POST["card_fiyat"]) &&
        isset($_POST["card_link"]) &&
        isset($_FILES["card_images"]["name"]) &&
        !empty($_POST["card_baslik"]) &&
        !empty($_POST["card_aciklama"]) &&
        /*
        !empty($_POST["card_prop_1"]) &&
        !empty($_POST["card_prop_2"]) &&
        !empty($_POST["card_prop_3"]) &&
        !empty($_POST["card_prop_4"]) &&
        !empty($_POST["card_prop_5"]) &&
        */
        !empty($_POST["card_fiyat"]) &&
        !empty($_POST["card_link"]) &&
        !empty($_FILES["card_images"]["name"])
    ) {

        if ($_FILES["card_images"]["error"] != 0) {
            $hata = 'Dosya Yüklenirken Hata Oluştu. Lütfen Tekrar Deneyin.-----';
        } else {
            copy($_FILES['card_images']['tmp_name'], '../assets/images/' . strtolower($_FILES["card_images"]["name"]));

            $images = strtolower($_FILES["card_images"]["name"]);
        }
    } else {
        $hata = 'Tüm form alanlarını doldurun ve bir resim seçin.';
    }


    // SQL sorgusunu düzgün şekilde hazırla
    $Sorgu = $baglanti->prepare('UPDATE tour_card_extra SET card_baslik=:card_baslik, card_aciklama=:card_aciklama, aktif=:aktif, card_images=:card_images, card_prop_1=:card_prop_1, card_prop_2=:card_prop_2, card_prop_3=:card_prop_3, card_prop_4=:card_prop_4, card_prop_5=:card_prop_5, card_link=:card_link, card_fiyat=:card_fiyat WHERE id=:id');

    $guncelle = $Sorgu->execute([
        'card_baslik' => isset($_POST['card_baslik']),
        'card_aciklama' => isset($_POST['card_aciklama']),
        'card_prop_1' => isset($_POST['card_prop_1']) ? $_POST['card_prop_1'] : null,
        'card_prop_2' => isset($_POST['card_prop_2']) ? $_POST['card_prop_2'] : null,
        'card_prop_3' => isset($_POST['card_prop_3']) ? $_POST['card_prop_3'] : null,
        'card_prop_4' => isset($_POST['card_prop_4']) ? $_POST['card_prop_4'] : null,
        'card_prop_5' => isset($_POST['card_prop_5']) ? $_POST['card_prop_5'] : null,
        'card_fiyat' => isset($_POST['card_fiyat']),
        'card_link' => isset($_POST['card_link']),
        'card_images' => isset($images),
        'aktif' => $aktif,
        'id' => $id,
    ]);


    if ($guncelle) {
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('Ekleme İşlemi Başarılı - Güncelleme', '', 'success').then((value) => {
                if (value.isConfirmed) {
                    window.location.href = 'Tour-card-ekstra.php';
                }
            }) </script>";
    } else {
        $hata = 'Veritabanına güncelleme sırasında bir hata oluştu.';
    }
}

if (!empty($hata)) {
    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('Hata', '$hata', 'error')</script>";

}
?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tour Güncelle</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Ana Sayfa tur Güncelle</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-5"></i>


            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">

                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Başlığı Ekle</b></label>
                        <input type="text" name="card_baslik" class="form-control"
                               value="<?= $sonuc["card_baslik"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Açıklama Ekle</b></label>
                        <input type="text" name="card_aciklama" class="form-control"
                               value="<?= $sonuc["card_aciklama"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Bilgisi 1</b></label>
                        <input type="text" name="card_prop_1" class="form-control"
                               value="<?= $sonuc["card_prop_1"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Bilgisi 2</b></label>
                        <input type="text" name="card_prop_2" class="form-control"
                               value="<?= $sonuc["card_prop_2"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Bilgisi 3</b></label>
                        <input type="text" name="card_prop_3" class="form-control"
                               value="<?= $sonuc["card_prop_3"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Bilgisi 4</b></label>
                        <input type="text" name="card_prop_4" class="form-control"
                               value="<?= $sonuc["card_prop_4"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Bilgisi 5</b></label>
                        <input type="text" name="card_prop_5 " class="form-control"
                               value="<?= $sonuc["card_prop_5"] ?>">
                    </div>

                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Fiyatı</b></label>
                        <input type="text" name="card_fiyat " class="form-control"
                               value="<?= $sonuc["card_fiyat"] ?>">
                    </div>


                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Linki "reservation.php"</b></label>
                        <input type="text" name="card_link " class="form-control"
                               value="<?= $sonuc["card_link"] ?>">
                    </div>


                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Resim Seçin </b></label>
                        <div class="text-start"><img width="200px" height="200px"
                                                     src="../assets/images/<?= $sonuc['card_images'] ?>" alt=""></div>
                        <label class="form-label"></label>
                        <input type="file" name="images" class="form-control-file" required>

                    </div>

                    <div class="form-label form-check">
                        <label class="form-label">
                            <input type="checkbox" name="aktif"
                                   class="form-check-input" <?= $sonuc['aktif'] == 1 ? 'checked' : '' ?>>Aktif
                            Et</label>
                    </div>

                    <div class="form-label">
                        <input type="submit" value="Güncelle" class="btn btn-outline-primary">
                    </div>


                </form>
            </div>
        </div>
    </div>
</main>


<?php
include("ad-include/afooter.php");
?>


</html>




