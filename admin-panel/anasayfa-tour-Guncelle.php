<!DOCTYPE html>
<html lang="en">
<?php
$sayfa = "Ana Sayfa Tour Card";
include("ad-include/ahead.php");
global $baglanti;

if ($_SESSION["yetki"] != "1") {

    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='anasayfa-tour.php'}}) </script>";
    exit;
}

$id = $_GET['id'];
$sorgu = $baglanti->prepare("select * from anasayfa_tour where id=:id");
$sorgu->execute(['id' => $id]);
$sonuc = $sorgu->fetch();


if ($_POST) {


    $aktif = 0;
    if (isset($_POST["aktif"])) $aktif = 1;

    $hata = '';
    $images = '';

    // Form alanlarını ve dosyanın gönderilip gönderilmediğini kontrol edin
    if (
        !empty($_POST["Baslik"]) &&
        !empty($_POST["Aciklama"]) &&
        !empty($_POST["Tour_time"]) &&
        !empty($_POST["Tour_place"]) &&
        !empty($_POST["Tour_transfer"]) &&
        !empty($_FILES["images"]["name"])
    ) {

        if ($_FILES["images"]["error"] != 0) {
            $hata = 'Dosya Yüklenirken Hata Oluştu. Lütfen Tekrar Deneyin.-----';
        }
        else {
            copy($_FILES['images']['tmp_name'], '../assets/images/' . strtolower($_FILES["images"]["name"]));

            $images = strtolower($_FILES["images"]["name"]);
        }
    } else {
        $hata = 'Tüm form alanlarını doldurun ve bir resim seçin.';
    }


        // SQL sorgusunu düzgün şekilde hazırlayın
        $Sorgu = $baglanti->prepare('UPDATE  anasayfa_tour SET Baslik=:Baslik, Aciklama=:Aciklama, aktif=:aktif, images=:images, Tour_time=:Tour_time, Tour_place=:Tour_place, Tour_transfer=:Tour_transfer WHERE id=:id');

            $guncelle = $Sorgu->execute([
                'Baslik' => $_POST['Baslik'],
                'Aciklama' => $_POST['Aciklama'],
                'Tour_time' => $_POST['Tour_time'],
                'Tour_place' => $_POST['Tour_place'],
                'Tour_transfer' => $_POST['Tour_transfer'],
                'images' => $images,
                'aktif' => $aktif,
                'id' => $id,
            ]);

            if ($guncelle) {
                echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
                echo "<script>Swal.fire('Ekleme İşlemi Başarılı - Güncelleme', '', 'success').then((value) => {
                if (value.isConfirmed) {
                    window.location.href = 'anasayfa-tour.php';
                }
            }) </script>";
            }


       else {
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
                        <label class="form-label">Tur Başlığı Ekle</label>
                        <input type="text" name="Baslik" class="form-control"
                               value="<?= $sonuc["Baslik"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">Açıklama Ekle</label>
                        <input type="text" name="Aciklama" class="form-control"
                               value="<?= $sonuc["Aciklama"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">Tur Toplamda ne kadar sürecek</label>
                        <input type="text" name="Tour_time" class="form-control"
                               value="<?= $sonuc["Tour_time"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">Kaç Farklı Yer Ziyaret Edilecek</label>
                        <input type="text" name="Tour_place" class="form-control"
                               value="<?= $sonuc["Tour_place"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">Tur a Transfer hizmeti dahil mi ? Dahil ise "Yes" Değil ise "No"
                            Yazınız </label>
                        <input type="text" name="Tour_transfer" class="form-control"
                               value="<?= $sonuc["Tour_transfer"] ?>">
                    </div>
                        <br>
                    <div class="form-control form-label">
                        <label class="form-label">İmages</label>
                        <div class="text-start"><img width="200px" height="200px" src="../assets/images/<?=$sonuc['images']?>" alt=""></div>
                        <label class="form-label"></label>
                        <input type="file" name="images" class="form-control-file">

                    </div>

                    <div class="form-label form-check">
                        <label class="form-label">
                            <input type="checkbox" name="aktif" class="form-check-input" <?= $sonuc['aktif']==1?'checked':''?>>Aktif Et</label>
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




