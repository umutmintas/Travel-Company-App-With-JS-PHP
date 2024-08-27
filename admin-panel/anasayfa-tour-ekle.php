<!DOCTYPE html>
<html lang="en">
<?php
$sayfa = "Ana Sayfa Tour Card";
include("ad-include/ahead.php");
global $baglanti;

$_SESSION['hata'] = '';
if ($_SESSION["yetki"] != "1") {

    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='anasayfa-tour.php'}}) </script>";
    exit;

}


if ($_POST) {

    $aktif=0;
    $hata = "";

    if(isset($_POST["aktif"])) $aktif=1;

    if ($_POST["Baslik"] != '' &&
        $_POST["Aciklama"] != '' &&
        $_FILES['images']['name'] != '' && // Change made here
        $_POST["Tour_time"] != '' &&
        $_POST["Tour_place"] != '' &&
        $_POST["Tour_transfer"] != '' ) {

        if($_FILES['images']['error'] != 0){
            $hata.='Dosya Yüklenirken Hata Gerçekleşti Lüften Tekrar Deneyin--8877.';
        }


        else {

            copy($_FILES['images']['tmp_name'],'../assets/images/'.strtolower($_FILES["images"]['name']));

            $ekleSorgu = $baglanti->prepare("INSERT INTO anasayfa_tour SET Baslik=:Baslik, Aciklama=:Aciklama, aktif=:aktif, images=:images, Tour_time=:Tour_time, Tour_place=:Tour_place, Tour_transfer=:Tour_transfer");
            $ekle = $ekleSorgu->execute([
                'Baslik' => $_POST['Baslik'],
                'Aciklama' => $_POST['Aciklama'],
                'Tour_time' => $_POST['Tour_time'],
                'Tour_place' => $_POST['Tour_place'],
                'Tour_transfer' => $_POST['Tour_transfer'],
                'images' => strtolower($_FILES["images"]['name']),
                'aktif' => $aktif,
            ]);


            if ($ekle) {
                echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
                echo "<script>Swal.fire('Ekleme İşlemi Başarılı','','success',).then((value)=>{
                        if(value.isConfirmed){window.location.href='anasayfa-tour.php'}}) </script>";
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
                        <label class="form-label">Tur Başlığı Ekle</label>
                        <input type="text" name="Baslik" class="form-control"
                               value="<?= @$_POST["Baslik"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">Açıklama Ekle</label>
                        <input type="text" name="Aciklama" class="form-control"
                               value="<?= @$_POST["Aciklama"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">Tur Toplamda ne kadar sürecek</label>
                        <input type="text" name="Tour_time" class="form-control"
                               value="<?= @$_POST["Tour_time"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">Kaç Farklı Yer Ziyaret Edilecek</label>
                        <input type="text" name="Tour_place" class="form-control"
                               value="<?= @$_POST["Tour_place"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">Tur a Transfer hizmeti dahil mi ? Dahil ise "Yes" Değil ise "No"
                            Yazınız </label>
                        <input type="text" name="Tour_transfer" class="form-control"
                               value="<?= @$_POST["Tour_transfer"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">İMAGES</label>
                        <input type="file" name="images" class="form-control-file" required>
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




