<!DOCTYPE html>
<html lang="en">
<?php
$sayfa = "kullanıcı-ekle";
include("ad-include/ahead.php");
global $baglanti;

$_SESSION['hata'] = '';
if ($_SESSION["yetki"] != "1") {

    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='anasayfa.php'}}) </script>";
    exit;

}


if ($_POST) {
$aktif = 0;

if (isset($_POST["aktif"])) $aktif = 1;

if ($_POST["kadi"] != '' &&
    $_POST["kparola"] != '' &&
    $_POST["yetki"] != '') {


    $ekleSorgu = $baglanti->prepare("INSERT INTO kullanicilar SET kadi=:kadi, kparola=:kparola, yetki=:yetki,aktif=:aktif");
    $ekle = $ekleSorgu->execute([
        'kadi' => $_POST['kadi'],
        'kparola' => $_POST['kparola'],
        'yetki' => $_POST['yetki'],
        'aktif' => $aktif,
    ]);

    if ($ekle) {
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('Ekleme İşlemi Başarılı','','success',).then((value)=>{
                        if(value.isConfirmed){window.location.href='kullanıcı.php'}}) </script>";
    } else {
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('Kullanıcı oluşturulamadı lütfen bilgileri doğru şekilde girin.','','error',)</script>";
    }

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
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-control form-label">
                        <label class="form-label">Kullanıcı Adı</label>
                        <input type="text" name="kadi" class="form-control"
                               value="<?= @$_POST["kadi"] ?>"required>
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">Parola</label>
                        <input type="text" name="kparola" class="form-control" required>
                    </div>

                    <div class="form-control form-label">
                        <label>yetki</label> <br>
                        <label><input type="radio" name="yetki" value="1"> Admin Kullanıcı </label><br>
                        <label><input type="radio" name="yetki" value="2" checked>Normal Kullanıcı </label>
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