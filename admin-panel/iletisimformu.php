<!DOCTYPE html>
<html lang="en">

<?php
$sayfa = "Reservasyon Talepleri";
global $baglanti;
include("ad-include/ahead.php");

if (isset($_POST['sil']) && $_SESSION["yetki"] == "1") {
    //Seçilenleri pdo ile toplu silme kodu:
    $silinecekler = implode(', ', $_POST['sil']);
    $sorgu = $baglanti->prepare('DELETE FROM contact_page WHERE İD IN (' . $silinecekler . ')');
    $sorgu->execute();
}

?>


<main>


    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $sayfa ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= $sayfa ?></li>
        </ol>

        <form action="" method="post">

            <div class="card mb-4">
                <div class="card-header" style="display:flex;">

                    <?php if ($_SESSION["yetki"] == "1") {?>
                    <div class="text-end">
                        <a hidden class="btn btn-outline-primary" href="#" onclick="indirVeriler()">Verileri İndir
                            (TXT)</a>
                        <a href="#" class="btn btn-outline-danger " data-toggle="modal" data-target="#silModal">
                            <span><i class="fa-solid fa-trash-can fa-xl text-danger"></i> Seçilenleri Sil </span></a>
                        <a class="text-end btn btn-outline-success" href="iletisimformu.php"><b>Verileri Güncelle</b>

                        </a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="silModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <a class="modal-title" id="exampleModalLabel"><span
                                            class="fa fa-edit fa-2xl"></span></a>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <p class="text-center align-content-center btn-md">Silmek istediğinizden
                                            emin misiniz ?</p>
                                    </div> 
                                    <p class="text-center btn-lg"></P>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal
                                    </button>
                                    <button type="submit" class="btn btn-danger my-3"> Seçilenleri Sil</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                    <!-- Verileri txt dosyasına kaydete-->
                    <script>
                    // Verileri sabit bir dizi içinde tanımlayalım
                    var veriDizisi = [{
                            ID: 1,
                            ad: 'John Doe',
                            email: 'john@example.com',
                            telefon: '123-456-7890',
                            mesaj: 'Merhaba',
                            konum: 'New York',
                            person_number: '12345',
                            tarih: '2023-11-05'
                        },
                        {
                            ID: 2,
                            ad: 'Jane Smith',
                            email: 'jane@example.com',
                            telefon: '987-654-3210',
                            mesaj: 'Merhaba dünya!',
                            konum: 'Los Angeles',
                            person_number: '54321',
                            tarih: '2023-11-06'
                        },
                        // Diğer veri öğeleri
                    ];

                    function doldurTabloyu() {
                        var tablo = document.getElementById("veriTablosu");
                        var tbody = document.createElement("tbody");

                        veriDizisi.forEach(function(veri) {
                            var satir = document.createElement("tr");
                            satir.innerHTML = `
      <td>${veri.ID}</td>
      <td>${veri.ad}</td>
      <td>${veri.email}</td>
      <td>${veri.telefon}</td>
      <td>${veri.mesaj}</td>
      <td>${veri.konum}</td>
      <td>${veri.person_number}</td>
      <td>${veri.tarih}</td>
    `;
                            tbody.appendChild(satir);
                        });
                        // Mevcut tbody'yi temizle ve yeni tbody'yi ekleyin
                        tablo.replaceChild(tbody, tablo.getElementsByTagName("tbody")[0]);
                    }
                    function indirVeriler() {
                        // Verileri metin olarak bir txt dosyasına dönüştür
                        var txtVeri = "ID\tAd\tEmail\tTelefon\tMesaj\tKonum\tPersonel Numarası\tTarih\n";

                        veriDizisi.forEach(function(veri) {
                            txtVeri +=
                                `${veri.ID}\t${veri.ad}\t${veri.email}\t${veri.telefon}\t${veri.mesaj}\t${veri.konum}\t${veri.person_number}\t${veri.tarih}\n`;
                        });

                        // Verileri txt dosyası olarak indir
                        var blob = new Blob([txtVeri], {
                            type: "text/plain"
                        });
                        var url = URL.createObjectURL(blob);
                        var a = document.createElement("a");
                        a.href = url;
                        a.download = "Reservasyon-talepleri.txt";
                        a.click();
                    }
                    // Sayfa yüklendiğinde tabloyu doldur
                    doldurTabloyu();
                    </script>
                </div>
                <?php
                $sorgu = $baglanti->prepare("select * from contact_page ORDER BY okundu");
                $sorgu->execute();
                $sonuc = $sorgu->fetch();
                ?>
                <div class="card-body">
                <table class="table datatable-wrapper" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="tumunuSec" onclick="tumunuSec(İD);" value="">
                                </th>

                                <th>İD</th>
                                <th>Ad</th>
                                <th>E-Mail</th>
                                <th>Mesaj</th>
                                <th>Telefon No</th>
                                <th>Konum</th>
                                <th>Kişi Sayısı</th>
                                <th>Tarih</th>
                                <th> </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $sorgu = $baglanti->prepare("SELECT * from contact_page order by okundu");
                            $sorgu->execute();
                            while ($sonuc = $sorgu->fetch()) {
                            ?>


                            <tr>

                                <td>
                                    <input class="cbSil" type="checkbox" name="sil[İD]" value="<?= $sonuc["İD"]; ?>">
                                </td>

                                <td><?= $sonuc["İD"] ?></td>
                                <td><?= $sonuc["ad"] ?></td>
                                <td><?= $sonuc["email"] ?></td>

                                <td>

                                    <a id="<?= $sonuc["İD"] ?>" href="#" data-toggle="modal"
                                        data-target="#okuModal<?= $sonuc["İD"] ?>"
                                        class="btn btn-outline-primary Mesajıoku">Mesajı Oku</a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="okuModal<?= $sonuc["İD"] ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="logoutModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <a class="modal-title" id="exampleModalLabel">Mesaj</a>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?= $sonuc["mesaj"] ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">kapat
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td><?= $sonuc["telefon"] ?></td>
                                <td><?= $sonuc["konum"] ?></td>
                                <td><?= $sonuc["person_number"] ?></td>
                                <td><?= $sonuc["tarih"] ?></td>


                                <!-- Sil Butonu -->
                                <td class="text-center">
                                    <?php if ($_SESSION["yetki"] == "5") {
                                        

                                        ?>
                                    <a href="#" data-toggle="modal" data-target="#silModal<?= $sonuc["İD"] ?>"><span><i
                                                class="fa-solid fa-trash-can fa-2x text-danger"></i></span></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="silModal<?= $sonuc["İD"] ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="logoutModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <a class="modal-title" id="exampleModalLabel"><span
                                                            class="fa fa-edit fa-2xl"></span></a>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="d-grid gap-2 col-6 mx-auto">
                                                        <p class="text-center align-content-center btn-md">Silmek
                                                            istediğinizden emin misiniz ?</p>
                                                    </div> <p class="text-center btn-lg">
                                                    </P>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">İptal
                                                    </button>
                                                    <a href="sil.php?id=<?= $sonuc["İD"] ?>&tablo=contact_page"
                                                        class="btn btn-danger">Sil</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                        }?>
                                </td>
                            </tr>
                </div>
                <?php
    }?>

                </tbody>
                </table>
            </div>
    </div>
    </form>
    </div>
</main>
<?php
include("ad-include/afooter.php");
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="text/javascript">
//Tümünü seçme işlemi yapan script kodları:
$(document).ready(function() {
    $('#tumunuSec').on('click', function() {
        if ($('#tumunuSec:checked').length == $('#tumunuSec').length) {
            $('input.cbSil:checkbox').prop('checked', true);
        } else {
            $('input.cbSil:checkbox').prop('checked', false);

        }
    });

    $('.oku').click(function(event) {

        var id = $(this).attr("id");
        var veri = $(this);
        var sayi = parseInt($('#okunmaSayisi').text());

        $.ajax({
            type: 'POST',
            url: 'ad-include/okundu.php',
            data: {
                id: id,
                tablo: 'contact_page'
            },
            success: function(result) {
                if (result == true) {
                    veri.closest('td').removeClass("  ");
                    if (sayi > 0) $("#okunmaSayisi").text(sayi - 1);
                }
            },
        })

    });

});
</script>


</html>