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

if ($_POST["kadi"] != '' && $_POST["kparola"] != '' && $_POST["kparola"] == $_POST["kparolaTekrar"]) {


    $ekleSorgu = $baglanti->prepare("UPDATE kullanicilar SET kadi=:kadi, kparola=:kparola where id=:id");
    $ekle = $ekleSorgu->execute([
        'kadi' => $_POST['kadi'],
        'kparola' => $_POST['kparola'],
        'id'=>$_GET['id']

    ]);

    if ($ekle) {
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('Güncelleme işlemi Başarılı','','success',).then((value)=>{
                        if(value.isConfirmed){window.location.href='kullanıcı.php'}}) </script>";
    } else {
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('Kullanıcı oluşturulamadı lütfen bilgileri doğru şekilde girin.','','error',)</script>";
    }

}else {
    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('Güncelleme Başarısız.','Lütfen tüm bilgileri doğru şekilde girin.','error',)</script>";
}

}
?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Parola </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Parola Güncelle</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-5"></i>


            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-control form-label">
                        <label class="form-label">Kullanıcı Adınız</label>
                        <input type="text" name="kadi" class="form-control"
                               value="<?= $sonuc["kadi"] ?>"required>
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">Parolanızı girin</label>
                        <input type="text" name="kparola" class="form-control" required>
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">Parolanızı tekrar girin</label>
                        <input type="text" name="kparolaTekrar" class="form-control" required>
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