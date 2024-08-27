<!DOCTYPE html>
<html lang="en">
<?php
$sayfa = "Tur Güncelleme Sayfası";
include("ad-include/ahead.php");
global $baglanti;

if ($_SESSION["yetki"] != "1") {

    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='Deals-Tur.php'}}) </script>";
    exit;
}

$id = $_GET['id'];
$sorgu = $baglanti->prepare("select * from tour_cards where id=:id");
$sorgu->execute(['id' => $id]);
$sonuc = $sorgu->fetch();


if ($_POST) {


    $aktif = 0;
    if (isset($_POST["aktif"])) $aktif = 1;

    $hata = '';
    $images = '';

    // Form alanlarını ve dosyanın gönderilip gönderilmediğini kontrol edin
    if (
        !empty($_POST["card_baslik"]) &&
        !empty($_POST["card_aciklama"]) &&
        !empty($_POST["card_prop_clock"]) &&
        !empty($_POST["card_prop_visited"]) &&
        !empty($_POST["card_prop_transfer"]) &&
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


    // SQL sorgusunu düzgün şekilde hazırlayın
    $Sorgu = $baglanti->prepare('UPDATE tour_cards SET card_baslik=:card_baslik, card_aciklama=:card_aciklama, aktif=:aktif, card_images=:card_images, card_price=:card_price, card_etiket=:card_etiket, card_prop_clock=:card_prop_clock, card_prop_visited=:card_prop_visited, card_prop_transfer=:card_prop_transfer WHERE id=:id');
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $guncelle = $Sorgu->execute([
        'card_baslik' => $_POST['card_baslik'],
        'card_aciklama' => $_POST['card_aciklama'],
        'card_prop_clock' => $_POST['card_prop_clock'],
        'card_prop_visited' => $_POST['card_prop_visited'],
        'card_prop_transfer' => $_POST['card_prop_transfer'],
        'card_price' => $_POST['card_price'],
        'card_etiket' => $_POST['card_etiket'],
        'card_images' => $images,
        'aktif' => $aktif,
        'id' => $id,
    ]);

    if ($guncelle) {
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('Ekleme İşlemi Başarılı - Güncelleme', '', 'success').then((value) => {
                if (value.isConfirmed) {
                    window.location.href = 'Deals-Tur.php';
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
                        <label class="form-label">Tur Başlığı Ekle</label>
                        <input type="text" name="card_baslik" class="form-control" value="<?= $sonuc["card_baslik"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">Açıklama Ekle</label>
                        <input type="text" name="card_aciklama" class="form-control" value="<?= $sonuc["card_aciklama"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">Tur Toplamda ne kadar sürecek</label>
                        <input type="text" name="card_prop_clock" class="form-control" value="<?= $sonuc["card_prop_clock"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">Kaç Farklı Yer Ziyaret Edilecek</label>
                        <input type="text" name="card_prop_visited" class="form-control" value="<?= $sonuc["card_prop_visited"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">Tur a Transfer hizmeti dahil mi ? Dahil ise "Yes" Değil ise "No"
                            Yazınız </label>
                        <input type="text" name="card_prop_transfer" class="form-control" value="<?= $sonuc["card_prop_transfer"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Fiyatı ?</b></label>
                        <input type="text" name="card_price" class="form-control" value="<?= @$_POST["card_price"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label"><b>Tur Hangi Şehirde yapılacak ?</b></label>
                        <input type="text" name="card_etiket" class="form-control" value="<?= @$_POST["card_etiket"] ?>">
                    </div>
                    <br>
                    <div class="form-control form-label">
                        <label class="form-label">İmages</label>
                        <div class="text-start">
                            <img width="200px" height="200px" src="../assets/images/<?= $sonuc['card_images'] ?>" alt="Tur">
                        </div>
                        <label class="form-label"></label>
                        <input type="file" name="card_images" class="form-control-file">

                    </div>

                    <div class="form-label form-check">
                        <label class="form-label">
                            <input type="checkbox" name="aktif" class="form-check-input" <?= $sonuc['aktif'] == 1 ? 'checked' : '' ?>>Aktif Et</label>
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