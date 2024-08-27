<?php
$sayfa = "silme sayfası"; // Değişken adı arasına boşluk eklendi.
global $baglanti;

include("ad-include/ahead.php");
include("ad-include/aktif-pasif-button.php");

if ($_SESSION["yetki"] != "1") {
    echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
    echo "<script>Swal.fire('HATA','Yetkisiz kullanıcı Düzenleme Yapamaz ! ','error',).then((value)=>{
        if (value.isConfirmed){window.location.href='index.php'}}) </script>";
    exit;
}

if (isset($_GET["tablo"]) && isset($_GET["id"])) {
    $tablo = $_GET["tablo"];
    $id = $_GET["id"];

    try {
        // Hata ayıklama için PDO hata modu aktifleştirildi.
        $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL sorgusu düzeltildi ve parametre olarak kullanıldı.
        $sorgu = $baglanti->prepare("DELETE FROM $tablo WHERE id = :id ");
        $sonuc = $sorgu->execute(["id" => $id]);

        if ($sonuc) {
            echo '<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js" ></script>';
            echo "<script>Swal.fire('Başarılı','Veri silme işlemi başarılı !','success',).then((value)=>{if (value.isConfirmed){window.location.replace('dashboard.php')}}) </script>";

        } else {
            echo "Silme işlemi başarısız.";
        }
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage(); // Hatanın ekrana yazdırılması.
    }
} else {
    echo "Hatalı URL parametreleri";
    exit;
}
?>
