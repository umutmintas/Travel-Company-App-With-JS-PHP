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

$sorgu = $baglanti->prepare("select * from kullanicilar where id=:id");
$sorgu->execute(['id'=>$_GET['id']]);
$sonuc = $sorgu->fetch();

if ($_POST) {
$aktif = 0;

if (isset($_POST["aktif"])) $aktif = 1;

if ($_POST["kadi"] != '' && $_POST["yetki"] != '') {

    $ekleSorgu = $baglanti->prepare("UPDATE kullanicilar SET kadi=:kadi, yetki=:yetki, aktif=:aktif WHERE id=:id");
    
    $ekle = $ekleSorgu->execute([
        'kadi' => $_POST['kadi'],
        'yetki' => $_POST['yetki'],
        'aktif' => $aktif,
        'id' => $_GET['id']
    ]);
    
    

    if ($ekle) {
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('Güncelleme İşlemi Başarılı','','success',).then((value)=>{
                        if(value.isConfirmed){window.location.href='kullanıcı.php'}}) </script>";
    } else {
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('Güncelleme İşlemi Başarısız','','error',)</script>";
    }

}

}
?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kullanıcı Güncelle</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Kullanıcı Güncelle</li>
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
                               value="<?= $sonuc["kadi"] ?>"required>
                    </div>

                    <div class="form-control form-label">
                        <label>yetki</label> <br>
                        <label><input type="radio" name="yetki" value="1" <?=$sonuc['yetki']=='1'?'checked':''?>> Admin Kullanıcı</label><br>
                        <label><input type="radio" name="yetki" value="0" <?=$sonuc['yetki']=='2'?'checked':''?>> Normal Kullanıcı</label>
                    </div>

                    <div class="form-label form-check">
                        <label class="form-label">
                            <input type="checkbox" name="aktif" <?=$sonuc['aktif']=='1'?'checked':''?> class="form-check-input">Aktif Et</label>
                    </div>

                    <div class="form-labele">
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