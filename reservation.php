<!DOCTYPE html>
<html lang="en">

<?php
$sayfa=("Reservation-Page");
include ("include/head.php");
include ("include/Mislina_DB.php");
global$baglanti;
global$_SESSION;
global $ekle;
?>

<body>
    <!-- WhatsApp Butonu -->
    <div class="whatsapp-button"> 
    <a href="https://api.whatsapp.com/send?phone=905330338400" target="_blank">
      <img src="./include/whatsapp.png" alt="WhatsApp">
    </a>
  </div>
  
  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-11">
          <h4>Book Prefered Deal Here</h4>
          <h2>Make Your Reservation</h2>
          <p></p>
          <div class="main-button"><a href="about.php">Discover More</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <p>Pamukkale : <a href="tel:+905528418420">+90 (552) 841 8420</a></p>
            <p>Kuşadası :<a href="tel:+905330338400">+90 (533) 033 84 00</a></p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="mailto:info@mislinatravel.com">info@mislinatravel.com</a>
            <br>
            <a href="mailto:yorukotel@gmail.com">yorukotel@gmail.com</a>
           
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
              <i class="fa-solid fa-location-dot"></i>
            <h4>Visit Our Offices</h4>
            <a href="#">Pamukkale</a>
            <br>
            <a href="#">Kuşadası</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-11">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14524.273431527641!2d29.11320363497978!3d37.9193943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c71234f193a1f3%3A0x60b2bbc7e5eb3661!2sMislina%20Travel!5e1!3m2!1str!2str!4v1706287075328!5m2!1str!2str" width="100%" height="450px"  style="border-radius: 20px 20px 20px 20px;" allowfullscreen=""></iframe>

          </div>
        </div>


        <div class="col-lg-12">
          <form id="reservation-form" name="reservation_form_c" method="post" action="reservation.php">
            <div class="row">
              <div class="col-lg-12">
                <h4><em>Create your reservation through this form</em> </h4>
              </div>

              <div class="col-lg-6">
                  <fieldset>
                      <label for="txAd" class="form-label">Your name and surname</label>
                      <input type="text" name="txAd" id="txAd" class="text" placeholder="Name and surname" autocomplete="on" required>
                  </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                    <label for="txTelefon" class="form-label">Your Phone Number</label>
                    <input type="text" name="txTelefon" id="txTelefon" class="Number" placeholder=" e.g.: +90 555 555 55 55" autocomplete="on" required>
                </fieldset>
              </div>

                <div class="col-lg-6">
                    <fieldset>
                        <label for="txEmail" class="form-label">Your E-Mail</label>
                        <input type="email" name="txEmail" id="txEmail" class="text" placeholder=" e.g.: example@mail.com" autocomplete="on" required>
                    </fieldset>
                </div>

              <div class="col-lg-6">
                  <fieldset>
                      <label for="txPerson" class="form-label">select the number of visitors</label>
                      <select name="txPerson" id="txPerson" class="form-select" aria-label="Default select example" onChange="this.form.click()">

                          <option type="checkbox" name="option1" value="1 Person">1 Person</option>
                          <option value=" 2 Person"> 2 Person</option>
                          <option value="3 Person"> 3 person</option>
                          <option value="4 Person"> 4 person</option>
                          <option value="5 Person"> 5 person</option>
                          <option value="+ More People">+ More People</option>

                      </select>
                  </fieldset>
              </div>

              <div class="col-lg-6">
                  <fieldset>
                      <label for="txKonum" class="form-label">Choose Your Destination</label>
                      <select  required name="txKonum" id="txKonum" class="form-select" aria-label="Default select example" onChange="this.form.click()">

                          <option value="Pamukkale">Pamukkale</option>
                          <option value="Didim">İstanbul</option>
                          <option value="Didim" selected >Efes</option>
                          <option value="Didim">Çanakkale</option>
                          <option value="Didim">Bursa</option>
                          <option value="Didim">İzmir</option>
                          <option value="Bodrum">Bodrum</option>
                          <option value="Antalya">Fethiye</option>
                          <option value="Didim">Marmaris</option>
                          <option value="Bodrum">Antalya</option>
                          <option value="Bodrum">Cappadocia</option>

                      </select>
                  </fieldset>
              </div >


                <div class="col-lg-6">
                    <img src="include/captcha.php" alt="images"  id="security-gorsel" style="width: 120px; height: 40px; border: 2px solid #333; margin: 0px 25px;">
                    <fieldset>
                        <label for="captcha" class="form-label"></label>
                        <input type="text" name="captcha" id="captcha" class="text form-control" placeholder="Enter the security code" autocomplete="on" required>
                    </fieldset>
                </div>

                <label for="txMesaj" class="form-label">Message</label>
                <textarea type="text" name="txMesaj" id="txMesaj"  class="form-label form-control-lg " placeholder="Please write message..." rows="4" cols="50"></textarea>
              <div class="col-lg-11">
                  <fieldset>

                      <button href="anasayfa" type="submit"  class="main-button" id="Submit">Make Your Reservation Now</button>       
                  </fieldset>
              </div>
            </div>
          </form>





        </div>

         <script type="text/javascript" src="assets/js/sweetalert2.all.min.js" ></script>

          <?php  include("include/Mislina_DB.php"); // Veritabanı bağlantısını doğru şekilde sağlayın

          if ($_POST) {

              /*   if ($_SESSION['captcha'] && $_POST['captcha'] !== null) */

             /* if (isset($_SESSION['captcha']) && $_POST['captcha'] == $_POST['captcha']) {*/

                  $sorgu_contact = $baglanti->prepare("INSERT INTO contact_page (ad, email, konum, person_number, telefon, mesaj) VALUES (:ad2, :email2, :konum2, :person_number2, :telefon2, :mesaj2)");

                  // Form verilerini doğru bir şekilde kullanın
                  $txAd = $_POST["txAd"];
                  $txEmail = $_POST["txEmail"];
                  $txKonum = $_POST['txKonum'];
                  $txPerson = $_POST["txPerson"];
                  $txTelefon = $_POST["txTelefon"];
                  $txMesaj = $_POST["txMesaj"];

                  $ekle = $sorgu_contact->execute([
                      'ad2' => $txAd,
                      'email2' => $txEmail,
                      'konum2' => $txKonum,
                      'person_number2' => $txPerson,
                      'telefon2' => $txTelefon,
                      'mesaj2' => $txMesaj
                  ]);


                  if ($ekle){
                      /*
                                        function mailgonder(){
                                            require "inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz
                                            $mail = new PHPMailer();
                                            $mail->IsSMTP();
                                            $mail->From     = "user.privacy99@gmail.com"; //Gönderen kısmında yer alacak e-mail adresi
                                            $mail->Sender   = $_POST["txEmail"];
                                            $mail->FromName = $_POST["txAd"];
                                            $mail->Host     = "smtp.gmail.com"; //SMTP server adresi
                                            $mail->SMTPAuth = true;
                                            $mail->Username = "user.privacy99@gmail.com"; //SMTP kullanıcı adı
                                            $mail->Password = "ztqx wevm wvuk gpsa"; //SMTP şifre
                                            $mail->SMTPSecure="";
                                            $mail->Port = "587";
                                            $mail->CharSet = "utf-8";
                                            $mail->WordWrap = 50;
                                            $mail->IsHTML(true); //Mailin HTML formatında hazırlanacağını bildiriyoruz.
                                            $mail->Subject  = "Mislinadan Gönderilen Mesaj".$_POST["txAd"];

                                            $mail->Body = "mesaj";
                                            $mail->AltBody = strip_tags("mesaj");
                                            $mail->AddAddress("user.privacy99@gmail.com");
                                            return ($mail->Send())?true:false;
                                            $mail->ClearAddresses();
                                            $mail->ClearAttachments();
                                        }

                                        if(mailgonder()) echo "başarılı";
                                        else echo "olmadı";

                      */
                      echo "<script>Swal.fire('We received your Message','We will get back to you as soon as possible.','success',).then((value)=>{
         if (value.isConfirmed){window.location.href='anasayfa'}})</script>";
                  }
                  else {
                      echo "<script>Swal.fire('Mesajınızı İletilmedi',' Lütfen Tüm Alanları Doğru Şekilde doldurunuz!','error')</script>";
                  }

          }
          ?>



      </div>
    </div>
  </div>

<?php
include ("include/footer.php");
?>
  </body>

</html>
