 <!DOCTYPE html>
<html lang="en">
 <?php
 $sayfa="anasayfa-slider-3-güncelle";
 global$baglanti;
 global $_SESSION;
 include ("ad-include/ahead.php");

 if($_SESSION["yetki"]!="1") {

 echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
 echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
         if (value.isConfirmed){window.location.href='index.php'}}) </script>";
 exit;

 }


$sorgu=$baglanti->prepare("select * from anasayfa_header where id=:id");
$sorgu->execute(['id'=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();
if ($_POST){ // veri Güncelleme İşlemleri burada yapılıyor

    $guncelleSorgu=$baglanti->prepare("Update anasayfa_header set Banner_3_Baslik_1=:Banner_3_Baslik_1, Banner_3_Baslik_2=:Banner_3_Baslik_2, Banner_3_images=:Banner_3_images where id=:id");
    $guncelle=$guncelleSorgu->execute([
            'Banner_3_Baslik_1'=>$_POST["Banner_3_Baslik_1"],
            'Banner_3_Baslik_2'=>$_POST["Banner_3_Baslik_2"],
            'Banner_3_images' => strtolower($_FILES["Banner_3_images"]['name']),
            'id'=>(int)$_GET["id"],


    ]);
    if ($guncelle){
        echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
        echo "<script>Swal.fire('Güncelleme İşlemi Başarılı','','success',).then((value)=>{
            if (value.isConfirmed){window.location.href='anasayfa-slider-3.php'}}) </script>";
    }
}



/* ------------------------------- Dosya / Resim güncelleme işlemi ------------------------  */
 if ($_POST) {

     $hata = "";

     if (
         $_FILES['Banner_3_images']['name'] != '')// Change made here
     {
         if ($_FILES['Banner_3_images']['error'] != 0) {
             $hata .= 'Resim Yüklenirken Hata Gerçekleşti Resim Formatında Hata Var ! Lüften Tekrar Deneyin.';
         } else {

             copy($_FILES['Banner_3_images']['tmp_name'], '../assets/images/upload/' . strtolower($_FILES["Banner_3_images"]['name']));

             $ekleSorgu = $baglanti->prepare("INSERT INTO anasayfa_header SET Banner_3_Baslik_1=:Banner_3_Baslik_1, Banner_3_Baslik_2=:Banner_3_Baslik_2, Banner_3_images=:Banner_3_images");
             $ekle = $ekleSorgu->execute([
                 'Banner_3_Baslik_1' => $_POST['Banner_3_Baslik_1'],
                 'Banner_3_Baslik_2' => $_POST['Banner_3_Baslik_2'],
                 'Banner_3_images' => strtolower($_FILES["Banner_3_images"]['name']),
             ]);



             if ($ekle) {
                 echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
                 echo "<script>Swal.fire('Resim Güncelleme İşlemi Başarılı','','success',).then((value)=>{
                        if(value.isConfirmed){window.location.href='anasayfa-slider-3.php'}}) </script>";
             }

         }

         if ($hata != '') {
             echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
             echo "<script>Swal.fire('$hata','12313','error',)</script>";
         }

     } else {
         $hata .= '';
     }

     if ($hata != '') {
         echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
         echo "<script>Swal.fire('$hata','','error',)</script>";
     }

 }




?>



<main>
    <div class="container-fluid px-4">
        <h1 class="mb-2 mt-4">Ana Sayfa  Banner 3 Güncelle</h1>
        <ol class="breadcrumb mb-5 ">
            <li class="breadcrumb-item active"><a class="btn btn-outline-secondary text-decoration-underline btn-sm" href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a class="btn btn-outline-secondary text-decoration-underline btn-sm" href="anasayfa-slider-3.php">Banner 3 </a></li>
            <li class="breadcrumb-item active">Banner 3 güncelle</li>
        </ol>



        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>

            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-control form-label">
                        <label class="form-label">ÜST BAŞLIK ALANI</label>
                        <input type="text" name="Banner_3_Baslik_1" class="form-control"
                               value="<?=$sonuc["Banner_3_Baslik_1"]?>" >
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label">ALT BAŞLIK ALANI  -  <span class="text-decoration-underline">Metin 70 Karakterden fazla olmamalıdır.</span></label>
                        <input type="text" name="Banner_3_Baslik_2" class="form-control"
                               value="<?=$sonuc["Banner_3_Baslik_2"]?>"  >
                    </div>

                    <div class="form-control form-label">
                        <label class="form-label"></label>
                        <img  style="border-radius: 25px" width="300px" height="200px" src="../assets/images/upload/<?=$sonuc["Banner_3_images"]?>">
                        <p style="margin-left: 100px"><?=$sonuc["Banner_3_images"]?></p>
                        <input type="file" name="Banner_3_images" class="form-control-file" value="<?=$sonuc["Banner_3_images"]?>" >
                    </div>

                    <div class="form-label">
                        <input type="submit"
                               value="Güncelle" class="btn btn-outline-primary">
                    </div>

                </form>

            </div>
        </div>
    </div>
</main>



<?php
include ("ad-include/afooter.php");
?>


</html>




