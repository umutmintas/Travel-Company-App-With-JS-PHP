<!DOCTYPE html>
<html lang="en">
<?php
$sayfa = "Tur Kart Ekstra Ekle";
include("ad-include/ahead.php");
global $baglanti;

$_SESSION['hata'] = '';
if ($_SESSION["yetki"] != "1") {

    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='index.php'}}) </script>";
    exit;

}


if ($_POST) {

    $aktif=0;
    $hata = "";

    if(isset($_POST["aktif"])) $aktif=1;

    if ($_POST["card_baslik"] != '' &&
        $_POST["card_aciklama"] != '' &&
        $_FILES['card_images']['name'] != '' && // Change made here
        /*
        $_POST["card_prop_1"] != '' &&
        $_POST["card_prop_2"] != '' &&
        $_POST["card_prop_3"] != '' &&
        $_POST["card_prop_4"] != '' &&
        $_POST["card_prop_5"] != '' &&
        */
        $_POST["card_fiyat"] != '' &&
        $_POST["card_link"] != '' ) {

        if($_FILES['card_images']['error'] != 0){
            $hata.='Dosya Yüklenirken Hata Gerçekleşti Lüften Tekrar Deneyin--8877.';
        }


        else {

            copy($_FILES['card_images']['tmp_name'],'../assets/images/'.strtolower($_FILES["card_images"]['name']));

            $ekleSorgu = $baglanti->prepare("INSERT  INTO tour_card_extra SET card_baslik=:card_baslik, card_aciklama=:card_aciklama, aktif=:aktif, card_images=:card_images, card_prop_1=:card_prop_1, card_prop_2=:card_prop_2, card_prop_3=:card_prop_3, card_prop_4=:card_prop_4, card_prop_5=:card_prop_5, card_fiyat=:card_fiyat, card_link=:card_link");
            $ekle = $ekleSorgu->execute([
                'card_baslik' => $_POST['card_baslik'],
                'card_aciklama' => $_POST['card_aciklama'],
                'card_prop_1' => $_POST['card_prop_1'],
                'card_prop_2' => $_POST['card_prop_2'],
                'card_prop_3' => $_POST['card_prop_3'],
                'card_prop_4' => $_POST['card_prop_4'],
                'card_prop_5' => $_POST['card_prop_5'],
                'card_fiyat' => $_POST['card_fiyat'],
                'card_link' => $_POST['card_link'],
                'card_images' => strtolower($_FILES["card_images"]['name']),
                'aktif' => $aktif,
            ]);
            if ($ekle) {
                echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
                echo "<script>Swal.fire('Ekleme İşlemi Başarılı','','success',).then((value)=>{
                        if(value.isConfirmed){window.location.href='Tour-card-ekstra.php'}}) </script>";
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
        echo "<script>Swal.fire('$hata','belirsiz hata','error',)</script>";
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
                        <label class="form-label"><b>Tur Başlığı Ekle  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; '<i class="btn">Maksimum 50 karakter girin</i>'</b></label>
                        <input type="text" name="card_baslik" class="form-control"
                               value="<?= @$_POST["card_baslik"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Açıklama Ekle   &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; '<i class="btn">Maksimum 50 karakter girin</i>'</b></label>
                        <input type="text" name="card_aciklama" class="form-control"
                               value="<?= @$_POST["card_aciklama"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Bilgisi 1</b></label>
                        <input type="text" name="card_prop_1" class="form-control"
                               value="<?= @$_POST["card_prop_1"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Bilgisi 2</b></label>
                        <input type="text" name="card_prop_2" class="form-control"
                               value="<?= @$_POST["card_prop_2"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Bilgisi 3</b></label>
                        <input type="text" name="card_prop_3" class="form-control"
                               value="<?= @$_POST["card_prop_3"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Bilgisi 4</b></label>
                        <input type="text" name="card_prop_4" class="form-control"
                               value="<?= @$_POST["card_prop_4"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Bilgisi 5</b></label>
                        <input type="text" name="card_prop_5" class="form-control"
                               value="<?= @$_POST["card_prop_5"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Fiyatı</b></label>
                        <input type="text" name="card_fiyat" class="form-control"
                               value="<?= @$_POST["card_fiyat"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur linki - "Dış link için site linki girebilirsiniz" - "Site içi tur ise 'reservation.php' yazabilirsin.</b></label>
                        <input type="text" name="card_link" class="form-control"
                               value="<?= @$_POST["card_link"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"><b>Bir Resim Yükleyin</b></label>
                        <input type="file" name="card_images" class="form-control-file" required>
                    </div>

                    <div class="form-label form-check">
                        <label class="form-label">
                            <input type="checkbox" name="aktif" class="form-check-input">Aktif Et</label>
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




