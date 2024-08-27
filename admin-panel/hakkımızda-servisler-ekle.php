<!DOCTYPE html>
<html lang="en">
<?php
$sayfa = "Hakkımızda Servisler Ekle";
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

    $aktif = 0;
    $hata = "";

    if (isset($_POST["aktif"])) $aktif = 1;

    if ($_POST["services_header"] != '' &&
        $_POST["services_description"] != '' &&
        $_FILES['services_images']['name'] != '' // Change made here
    ) {

        if ($_FILES['services_images']['error'] != 0) {
            $hata .= 'Dosya Yüklenirken Hata Gerçekleşti Lüften Tekrar Deneyin--8877.';
        } else {

            copy($_FILES['services_images']['tmp_name'], '../assets/images/' . strtolower($_FILES["services_images"]['name']));

            $ekleSorgu = $baglanti->prepare("INSERT INTO about_service_content SET services_header=:services_header, services_description=:services_description, aktif=:aktif, services_images=:services_images");
            $ekle = $ekleSorgu->execute([
                'services_header' => $_POST['services_header'],
                'services_description' => $_POST['services_description'],
                'services_images' => strtolower($_FILES["services_images"]['name']),
                
                'aktif' => $aktif,
            ]);



            if ($ekle) {
                echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
                echo "<script>Swal.fire('Ekleme İşlemi Başarılı','','success',).then((value)=>{
                        if(value.isConfirmed){window.location.href='hakkımızda-servisler.php'}}) </script>";
            }

        }

        if ($hata != '') {
            echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
            echo "<script>Swal.fire('$hata','belirsiz hata','error',)</script>";
        }

    } else {
        $hata .= 'Bütün Alanları Doldurun.';
    }

    if ($hata != '') {
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('$hata','belirsiz hata','error',)</script>";
    }

}


?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Hizmet Ekle</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="hakkımızda-servisler.php">Hizmetler</a></li>
            <li class="breadcrumb-item active">Hizmet Güncelle</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-5"></i>


            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">


                    <div class="form-control form-label">
                        <label class="form-label">Hizmet Başlığı Ekle</label>
                        <input type="text" name="services_header" class="form-control"
                               value="<?= @$_POST["services_header"] ?>">
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">Açıklama Ekle</label>
                        <input type="text" name="services_description" class="form-control"
                               value="<?= @$_POST["services_description"] ?>">
                    </div>


                    <div class="form-control form-label">
                        <label class="form-label">İMAGES</label>
                        <input type="file" name="services_images" class="form-control-file" required>
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




