<!DOCTYPE html>
<html lang="en">
<?php
$sayfa = "Hakkımızda Servisler Güncelle";
include("ad-include/ahead.php");
global $baglanti;

if ($_SESSION["yetki"] != "1") {

    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='anasayfa-tour.php'}}) </script>";
    exit;
}

$id = $_GET['id'];
$sorgu = $baglanti->prepare("select * from about_service_content where id=:id");
$sorgu->execute(['id' => $id]);
$sonuc = $sorgu->fetch();


if ($_POST) {


    $aktif = 0;
    if (isset($_POST["aktif"])) $aktif = 1;

    $hata = '';
    $images = '';

    // Form alanlarını ve dosyanın gönderilip gönderilmediğini kontrol edin
    if (
        !empty($_POST["services_header"]) &&
        !empty($_POST["services_description"]) &&
        !empty($_FILES["services_images"]["name"])
    ) {

        if ($_FILES["services_images"]["error"] != 0) {
            $hata = 'Dosya Yüklenirken Hata Oluştu. Lütfen Tekrar Deneyin.-----';
        }
        else {
            copy($_FILES['services_images']['tmp_name'], '../assets/images/' . strtolower($_FILES["services_images"]["name"]));

            $images = strtolower($_FILES["services_images"]["name"]);
        }
    } else {
        $hata = 'Tüm form alanlarını doldurun ve bir resim seçin.';
    }


        // SQL sorgusunu düzgün şekilde hazırlayın
        $Sorgu = $baglanti->prepare('UPDATE  about_service_content SET services_header=:services_header, services_description=:services_description, aktif=:aktif,services_images=:services_images WHERE id=:id');

            $guncelle = $Sorgu->execute([
                'services_header' => $_POST['services_header'],
                'services_description' => $_POST['services_description'],
                'services_images' => $images,
                'aktif' => $aktif,
                'id' => $id,
            ]);

            if ($guncelle) {
                echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
                echo "<script>Swal.fire('Ekleme İşlemi Başarılı - Güncelleme', '', 'success').then((value) => {
                if (value.isConfirmed) {
                    window.location.href = 'hakkımızda-servisler.php';
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
        <h1 class="mt-4">Hizmet Güncelle</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Hizmet Güncelle</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-5"></i>


            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">

                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">Hizmet Başlığı Ekle</label>
                        <input type="text" name="services_header" class="form-control"
                               value="<?= $sonuc["services_header"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">Açıklama Ekle</label>
                        <input type="text" name="services_description" class="form-control"
                               value="<?= $sonuc["services_description"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">İmages</label>
                        <div class="text-start"><img width="200px" height="200px" src="../assets/images/<?=$sonuc['services_images']?>" alt=""></div>
                        <label class="form-label"></label>
                        <input type="file" name="services_images" class="form-control-file">

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




