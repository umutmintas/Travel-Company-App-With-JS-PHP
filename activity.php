<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    $sayfa = ("Activity-Page");
    include("include/Mislina_DB.php");
    include("include/head.php");
    ?>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="assets/css/activity-card.css">
    <link rel="stylesheet" href="assets/css/tour-card-c.css">

    <title>Activity Page</title>
</head>

<body>






<body>
  <section id="intro">
    <div class="info">
      <h1>Octoberfest</h1>
      <p>
        Are you ready for the world's most renowned beer festival? Join us for
        the Oktoberfest, where we bring a piece of Bavaria to you! This
        four-day event promises non-stop fun, delicious food, and, of course,
        plenty of the finest German beer. Here's what you can expect:
      </p>
      <a href="#content" class="button explore">Explore</a>
    </div>
    <div class="split-beer">
      <img class="beer" src="assets/images/offers-02.jpg" />
      <img class="beer" src="assets/images/offers-02.jpg" />
      <img class="beer" src="assets/images/offers-02.jpg" />
    </div>
  </section>

  <section id="content">
    <!-- Cards -->
    
        <button class="modal-open" data-modal="modal5">
          more<ion-icon class="open-icon" name="open-outline" aria-hidden="true"></ion-icon>
        </button>
      </div>
    </div>

    <div class="card">
      <img class="card-img" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/82bb545a-3d20-442c-9670-191105298b4b" />
      <div class="title">
        <h2>Fun and Games</h2>
      </div>
      <div class="more">
        <button class="modal-open" data-modal="modal6">
          more<ion-icon class="open-icon" name="open-outline" aria-hidden="true"></ion-icon>
        </button>
      </div>
    </div>

    <!-- Modals -->
    <div class="modal" id="modal1">
      <div class="modal-content">
        <div class="modal-header">
          Beer Galore<button class="modal-close">
            <ion-icon class="close-icon" name="close-outline">Close</ion-icon>
          </button>
        </div>
        <div class="modal-body">
          <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/8970757c-5e57-43ee-9014-60640eaa2469" alt="" />
          <ul>
            <li>
              Savor a wide variety of world-famous German beers, including
              lagers, ales, and stouts.
            </li>
            <li>
              Raise your stein high and enjoy traditional Bavarian toasts with
              friends old and new.
            </li>
            <li>
              Be sure to try the special brews crafted exclusively for
              Oktoberfest.
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button class="button close-btn modal-close">Close</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modal2">
      <div class="modal-content">
        <div class="modal-header">
          Bavarian Culture Showcase<button class="modal-close">
            <ion-icon class="close-icon" name="close-outline">Close</ion-icon>
          </button>
        </div>
        <div class="modal-body">
          <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/98d23019-9931-4e20-a823-30724a018d9c" alt="" />
          <ul>
            <li>
              Immerse yourself in the rich Bavarian culture with art
              exhibitions and demonstrations.
            </li>
            <li>
              Learn about the history and traditions of Oktoberfest through
              informative displays.
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button class="button close-btn modal-close">Close</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modal3">
      <div class="modal-content">
        <div class="modal-header">
          Souvenirs and Shopping<button class="modal-close">
            <ion-icon class="close-icon" name="close-outline">Close</ion-icon>
          </button>
        </div>
        <div class="modal-body">
          <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/58bdbc26-b73b-4066-99ba-cbbfb45214d6" alt="" />
          <ul>
            <li>
              Shop for unique Bavarian souvenirs, clothing, and trinkets at
              our market stalls.
            </li>
            <li>
              Take home a piece of Oktoberfest to remember this incredible
              experience.
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button class="button close-btn modal-close">Close</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modal4">
      <div class="modal-content">
        <div class="modal-header">
          Bavarian Culinary Delights<button class="modal-close">
            <ion-icon class="close-icon" name="close-outline">Close</ion-icon>
          </button>
        </div>
        <div class="modal-body">
          <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/be357710-c460-45e8-a61e-2db9c45eb12b" alt="" />
          <ul>
            <li>
              Indulge in mouthwatering German cuisine, from bratwurst and
              schnitzel to pretzels and sauerkraut.
            </li>
            <li>
              Experience the rich flavors of authentic Bavarian dishes
              prepared by skilled chefs.
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button class="button close-btn modal-close">Close</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modal5">
      <div class="modal-content">
        <div class="modal-header">
          Live Music and Entertainment<button class="modal-close">
            <ion-icon class="close-icon" name="close-outline">Close</ion-icon>
          </button>
        </div>
        <div class="modal-body">
          <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e2f37f05-f3a7-45b9-83dc-1e1ab9212e43" alt="" />
          <ul>
            <li>
              Get your groove on with live traditional German bands and folk
              dancers.
            </li>
            <li>
              Expect a vibrant atmosphere filled with music, dancing, and
              cultural performances.
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button class="button close-btn modal-close">Close</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modal6">
      <div class="modal-content">
        <div class="modal-header">
          Fun and Games<button class="modal-close">
            <ion-icon class="close-icon" name="close-outline">Close</ion-icon>
          </button>
        </div>
        <div class="modal-body">
          <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/82bb545a-3d20-442c-9670-191105298b4b" alt="" />
          <ul>
            <li>
              Participate in traditional Oktoberfest games, including
              stein-holding contests and bratwurst-eating competitions.
            </li>
            <li>
              Bring the whole family; we have activities for all ages,
              including a dedicated kids' zone.
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button class="button close-btn modal-close">Close</button>
        </div>
      </div>
    </div>
  </section>

  <section>
    <p>
      Don't miss this opportunity to experience the magic of Oktoberfest!
      Gather your friends and family and join us for an unforgettable
      celebration of Bavarian culture, delicious food, and world-class beer.
    </p>
</section>
</body>









<div class="mt-5">
            <p> Lorem İpsum Lorem İpsum Lorem İpsum Lorem İpsum Lorem İpsum Lorem İpsum Lorem İpsum Lorem İpsum </p>
        </div>


    <div class="container srlm"> 
        
        

        <div id="card">
            <img id="avatar" src="assets/images/bg-25.jpg" alt="images" />
            <div id="info">
                <p class="text-center" id="name">LOREM İPSUM

                </p>
                <p id="activity">
                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                </p>
                <span class="black-line"></span>
                <div id="stats">
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                </div>
                <a href="reservation" id="btn-res">Make a reservation <span style="font-size: 25px;">/ $ 250</span> </a>
            </div>
        </div>





        <div id="card">
            <img id="avatar" src="assets/images/bg-25.jpg" alt="images" />
            <div id="info">
                <p id="name">LOREM İPSUM

                </p>
                <p id="activity">
                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                </p>
                <span class="black-line"></span>
                <div id="stats">
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                </div>
                <a href="reservation" id="btn-res">Make a reservation <span style="font-size: 25px;">/ $ 250</span> </a>
            </div>
        </div>


        <div id="card">
            <img id="avatar" src="assets/images/bg-25.jpg" alt="images" />
            <div id="info">
                <p id="name">LOREM İPSUM

                </p>
                <p id="activity">
                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                </p>
                <span class="black-line"></span>
                <div id="stats">
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                </div>
                <a href="reservation" id="btn-res">Make a reservation <span style="font-size: 25px;">/ $ 250</span> </a>
            </div>
        </div>


        <div id="card">
            <img id="avatar" src="assets/images/bg-25.jpg" alt="images" />
            <div id="info">
                <p id="name">LOREM İPSUM

                </p>
                <p id="activity">
                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                </p>
                <span class="black-line"></span>
                <div id="stats">
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                </div>
                <a href="reservation" id="btn-res">Make a reservation <span style="font-size: 25px;">/ $ 250</span> </a>
            </div>
        </div>


        <div id="card">
            <img id="avatar" src="assets/images/bg-25.jpg" alt="images" />
            <div id="info">
                <p id="name">LOREM İPSUM

                </p>
                <p id="activity">
                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                </p>
                <span class="black-line"></span>
                <div id="stats">
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                    <p class="stats-text">| lorem ipsum </p>
                </div>
                <a href="reservation" id="btn-res">Make a reservation <span style="font-size: 25px;">/ $ 250</span> </a>
            </div>
        </div>


    </div>





        <!-- Firs Sections Start-->



        <!-- Firs Sections End-->




        
<script>
    const modalOpenBtns = document.querySelectorAll(".modal-open");
const modalCloseBtns = document.querySelectorAll(".modal-close");
const body = document.querySelector("body");

modalOpenBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    let modal = btn.getAttribute("data-modal");
    document.getElementById(modal).style.display = "block";
    body.classList.add("prevent-background-scroll");
  });
});

modalCloseBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    let modal = (btn.closest(".modal").style.display = "none");
    body.classList.remove("prevent-background-scroll");
  });
});

document.addEventListener("click", (e) => {
  if (e.target.classList.contains("modal")) {
    e.target.style.display = "none";
    body.classList.remove("prevent-background-scroll");
  }
});

</script>



        <?php
                include ("include/footer.php");
        ?>
</body>

</html>