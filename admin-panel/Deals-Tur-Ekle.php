<!DOCTYPE html>
<html lang="en">
<?php
$sayfa = "Tur Kartı Ekle";
include("ad-include/ahead.php");
global $baglanti;

$_SESSION['hata'] = '';
if ($_SESSION["yetki"] != "1") {

    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='Deals-Tur.php'}}) </script>";
    exit;

}


if ($_POST) {

    $aktif=0;
    $hata = "";

    if(isset($_POST["aktif"])) $aktif=1;

    if ($_POST["card_baslik"] != '' &&
        $_POST["card_aciklama"] != '' &&
        $_FILES['card_images']['name'] != '' && // Change made here
        $_POST["card_prop_clock"] != '' &&
        $_POST["card_prop_visited"] != '' &&
        $_POST["card_prop_transfer"] != '' &&
        $_POST["card_etiket"] != '' &&
        $_POST["card_price"] != '' ) {

        if($_FILES['card_images']['error'] != 0){
            $hata.='Fotoğraf Yüklenirken Hata Gerçekleşti Lüften Tekrar Deneyin.';
        }


        else {

            copy($_FILES['card_images']['tmp_name'],'../assets/images/'.strtolower($_FILES["card_images"]['name']));

            $ekleSorgu = $baglanti->prepare("INSERT INTO tour_cards SET card_baslik=:card_baslik, card_aciklama=:card_aciklama, aktif=:aktif, card_images=:card_images, card_prop_clock=:card_prop_clock, card_prop_visited=:card_prop_visited, card_prop_transfer=:card_prop_transfer, card_price=:card_price, card_etiket=:card_etiket");
            $ekle = $ekleSorgu->execute([
                'card_baslik' => $_POST['card_baslik'],
                'card_aciklama' => $_POST['card_aciklama'],
                'card_prop_clock' => $_POST['card_prop_clock'],
                'card_prop_visited' => $_POST['card_prop_visited'],
                'card_prop_transfer' => $_POST['card_prop_transfer'],
                'card_price' => $_POST['card_price'],
                'card_etiket' => $_POST['card_etiket'],
                'card_images' => strtolower($_FILES["card_images"]['name']),
                'aktif' => $aktif,
            ]);


            if ($ekle) {
                echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
                echo "<script>Swal.fire('Ekleme İşlemi Başarılı','','success',).then((value)=>{
                        if(value.isConfirmed){window.location.href='Deals-Tur.php'}}) </script>";
            }

        }

        if ($hata!= '') {
            echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
            echo "<script>Swal.fire('$hata','belirsiz hata','error',)</script>";
        }

    }

    else {
        $hata.='Bütün Alanları Doldurun.';
    }

    if ($hata!= '') {
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('$hata','İşlem Başarısız','error',)</script>";
    }

}



?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tour Ekle</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Tour Güncelle Card</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-5"></i>


            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">


                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Başlığı Ekle<b></label>
                        <input type="text" name="card_baslik" class="form-control"
                               value="<?= @$_POST["card_baslik"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Açıklama Ekle</b></label>
                        <input type="text" name="card_aciklama" class="form-control"
                               value="<?= @$_POST["card_aciklama"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Toplamda ne kadar sürecek ?</b> - "Gün Veya Saat Olarak Yazabilirsiniz"</label>
                        <input type="text" name="card_prop_clock" class="form-control"
                               value="<?= @$_POST["card_prop_clock"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Kaç Farklı Yer Ziyaret Edilecek ?</b> "| Şehir" şeklinde yazabilirsiniz.</label>
                        <input type="text" name="card_prop_visited" class="form-control"
                               value="<?= @$_POST["card_prop_visited"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur a Transfer hizmeti dahil mi ?</b>  Dahil ise "Yes" Değil ise "No" Yazınız </label>
                        <input type="text" name="card_prop_transfer" class="form-control"
                               value="<?= @$_POST["card_prop_transfer"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Fiyatı ?</b></label>
                        <input type="text" name="card_price" class="form-control"
                               value="<?= @$_POST["card_price"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Hangi Şehirde yapılacak ?</b></label>
                        <input type="text" name="card_etiket" class="form-control"
                               value="<?= @$_POST["card_etiket"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">Yapılcak Turun Fotoğrafını Yükleyin.</label>
                        <input type="file" name="card_images" class="form-control-file" required>
                    </div>

                    <div class="form-label form-check">
                        <label class="form-label">
                            <input type="checkbox" name="aktif" class="form-check-input">Tur Yayınlansın mı ?</label>
                    </div>

                    <div class="form-labele">
                        <input type="submit" value="Ekle" class="btn btn-outline-primary">
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




