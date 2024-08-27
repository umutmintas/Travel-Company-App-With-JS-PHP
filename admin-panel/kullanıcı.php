<!DOCTYPE html>
<html lang="en">

<?php
$sayfa = "kullanıcılar";
global $baglanti;
include("ad-include/ahead.php");
$sorgu = $baglanti->prepare("select * from kullanicilar");
$sorgu->execute();
$sonuc = $sorgu->fetch();

$_SESSION['hata'] = '';
if ($_SESSION["yetki"] != "1") {

    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='kullanıcı.php'}}) </script>";
    exit;

}

?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $sayfa?></h1>
        <ol class="breadcrumb mb-4">
            <li href="index.php" class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active"><?= $sayfa?></li>
        </ol>




        <div class="card mb-2">
            <div class="card-header">
                <a class="btn btn-outline-primary" href="kullanıcı-ekle.php">Kullanıcı Ekle</a>
                <a class=" btn btn-outline-success" href="kullanıcı.php"><b>Verileri Güncelle</b></a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Kullanıcı Adı</th>
                        <th>Kullanıcının Yetkisi</th>
                        <th>Aktif</th>
                        <th>Parola Güncelle</th>
                        <th>Kullanıcı Güncelle</th>
                        <th></th>


                    </tr>
                    </thead>


                    <tbody>

                    <?php
                    $sorgu = $baglanti->prepare("select * from kullanicilar");
                    $sorgu->execute();
                    while ($sonuc = $sorgu->fetch())
                    {
                    ?>

                    <tr>
                        <td><?= $sonuc["kadi"] ?></td>
                        <td style="margin-left: auto; margin-right: auto"><?= $sonuc["yetki"]==1?'Yönetici':'Normal'?></td>
                        <td>
                            <link href="css/switch.css" rel="stylesheet">
                            <label class="switch">
                                <!-- checkbox a id ve checked bilgilerini ekliyoruz -->
                                <input type="checkbox" id='<?= $sonuc['id'] ?>' class="aktifPasif" <?= $sonuc['aktif']==1?'checked':'' ?>/>
                                <span class="slider round"></span>
                            </label>                        </td>

                        <td style="padding: 0 15px;" class="">
                                <a href="kullanıcı-Parola-guncelle.php?id=<?=$sonuc["id"] ?>">
                                    <span class="btn btn-lg btn-primary">
                                        <i class="fa-solid fa-key " style="color: #ffffff;"></i>
                                    </span>
                                </a>
                        </td>

                        <td class="text-center">
                            <a href="kullanıcı-güncelle.php?id=<?=$sonuc["id"] ?>">
                                <span class="btn btn-lg btn-primary table-hover" >
                                    <i class="fa-solid fa-user-gear " style="color: #ffffff;"></i>
                                </span>
                            </a>
                        </td>

                        <td class="text-center">


                            <a href="#" data-toggle="modal" data-target="#silModal<?=$sonuc["id"]?>" ><span><i class="fa-solid fa-trash-can fa-2x text-danger"></i></span></a>
                            <!-- Modal -->
                            <div class="modal fade" id="silModal<?=$sonuc["id"]?>" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <a class="modal-title" id="exampleModalLabel"><span class="fa fa-edit fa-2xl"></span></a>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <p class="text-center align-content-center btn btn-primary "> <?= $sonuc["kadi"] ?> </p>
                                            </div

                                            <p class="text-center align-content-center  btn-primary "></p>

                                            <p class="text-center btn-lg">Kullanıcıyı silmek istediğinizden emin misiniz ? Bu işlem geri alınamaz ?</P>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                                            <a href="sil.php?id=<?=$sonuc["id"] ?>&tablo=kullanicilar" class="btn btn-danger">Sil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!---->
                        </td>
                    </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>


<?php
include("ad-include/afooter.php");
?>


<script>$(document).ready(function () {
        $('.aktifPasif').click(function (event) {
            var id = $(this).attr("id");  //id değerini alıyoruz

            var durum = ($(this).is(':checked')) ? '1' : '0';
            //checkbox a göre aktif mi pasif mi bilgisini alıyoruz.

            $.ajax({
                type: 'POST',
                url: 'ad-include/aktif-pasif-button.php',  //işlem yaptığımız sayfayı belirtiyoruz
                data: { id:id, tablo:'kullanicilar', durum: durum }, //datamızı yolluyoruz
                success: function (result) {
                    $('#sonuc').text(result);
                    //gelen sonucu h2 tagında gösteriyoruz
                },
                error: function () {
                    alert('Hata');
                }
            });
        });
    });</script>



</html>




