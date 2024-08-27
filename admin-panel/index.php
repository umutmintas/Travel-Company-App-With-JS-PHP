<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title> Travel App Login Panel</title>

    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<!------  Giriş Saygası ------->

<body>
    <div class="log_bg" id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div style="margin-top: 100px" class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4"> Travel App Paneli</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    
                                    global $baglanti;
                                    include("../include/Mislina_DB.php");
                                    session_start();
                                    if  (isset($_SESSION["Oturum"])) {

                                        header("location: dashboard.php");
                                    } elseif (isset($_SESSION["cerez"])) {
                                        $sorgu = $baglanti->prepare("SELECT kadi,yetki from kullanicilar where akti=1");
                                        $sorgu->execute();
                                        while ($sonuc = $sorgu->fetch()); {
                                            if ($_SESSION["cerez"] == md5("aa" . $sonuc["kadi"] . "bb")) {
                                                $_SESSION["Oturum"] = "4567";
                                                $_SESSION["kadi"] = $sonuc["kadi"];
                                                $_SESSION["yetki"] = $sonuc["yetki"];
                                                header("location: dashboard.php");
                                            }
                                        }
                                    }
                                    if ($_POST) {
                                        $kadi = $_POST["txkadi"];
                                        $parola = $_POST["txkparola"];
                                    }
                                    /*
                                echo md5(md5("1234"));
                                */
                                    ?>
                                    <form method="post" action="index.php">
                                        <div class="form-floating mb-3">
                                            <input required class="form-control" id="inputUsername" type="text" name="txkadi" value="<?= @$kadi ?>" placeholder="Enter your username." />
                                            <label for="inputUsername">Kullanıcı Adı</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input required class="form-control" id="inputPassword" type="password" name="txkparola" placeholder="Enter your Password." />
                                            <label for="inputPassword">Şifre</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="chbox_rem" />
                                            <label class="form-check-label" for="inputRememberPassword">Beni Hatırla</label>
                                        </div>
                                        <div class="d-flex flex-column mt-4 mb-0">
                                            <a class="small"></a>
                                            <input type="submit" href="dashboard.php" name="giriş_btn" class="justify-content-center btn log_btn" value="Giriş">
                                        </div>
                                    </form>
                                    <script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"></script>
                                    <?php

                                    if ($_POST) {
                                        /* if ($_SESSION["captcha"] == $_POST["captcha"]) {*/
                                        $sorgu = $baglanti->prepare("SELECT kparola,yetki from kullanicilar where kadi=:kadi and aktif=1");
                                        $sorgu->execute(params: ['kadi' => htmlspecialchars($kadi)]);
                                        $sonuc = $sorgu->fetch();

                                        if (@$parola = $_POST["txkparola"] == $sonuc["kparola"]) {
                                            @$_SESSION["Oturum"] = "4567";
                                            @$_SESSION["kadi"] = $kadi;
                                            @$_SESSION["yetki"] = $sonuc["yetki"];

                                            if (isset($_POST["chbox_rem"])) {
                                                //md5 ile $kadi na şifreleme  yapılacak.//
                                                md5(setcookie("cerez", $kadi, time() + (60 * 60 * 7)));
                                            }
                                            header("location: dashboard.php");
                                        } else {
                                            echo "<script>Swal.fire('Hata!',' Kullanıcı Adı Ve Parolayı Doğru Şekilde doldurunuz!','error')</script>";
                                        }
                                        /* } else {
                                    echo "<script>Swal.fire('Hata !',' Güvenlik Kodunu Eksikisiz Doldurun.','info')</script>";
                                     }*/
                                    }
                                    ?>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">Eğer Giriş Yaparken bir sorun yaşıyorsanız yöneticinize danışın
                                        <a href="register.html"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div style="font-size: medium" class="text-muted">Copyright &copy; <u class="btn-outline-primary">
                                Mislina Travel 2024</u></div>
                        <div>
                            <a style="font-size: medium">Designed and Develop BY :</a>
                            <a class="btn btn-outline-primary btn-sm" href="https://umutmintas.com">Umut Mintaş</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>