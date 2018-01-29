<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <title>Week van de mobiliteit - major 3</title>
    <meta name="viewport" content="initial-scale=1.0,  width=device-width" />

    <script>
      WebFontConfig = {
        custom: {
          families: ['Avenir Next'],
          urls: ['assets/fonts/AvenirNext/AvenirNext.css']
        }
      };

      (function(d) {
        var wf = d.createElement('script'),
          s = d.scripts[0];
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
      })(document);
    </script>
  <?php echo $css; ?>
  </head>
  <body>

    <?php if($currentPage == 'home'){
    ?>

    <header class="header">
      <div class="wvdm">
        <p>
          <span class="week">Week</span>
         <br><span class="vande">van</span>
         <br><span class="de">de</span>
         <br><span class="mobiliteit">mobiliteit</span>
         <br><span class="datum">16 - 22 september</span>
       </p>
      </div>
      <img
        sizes="(max-width: 1067px) 100vw, 1067px"
        srcset="
        assets/images/header_200.png 200w,
        assets/images/header_375.png 375w,
        assets/images/header_508.png 508w,
        assets/images/header_611.png 611w,
        assets/images/header_704.png 704w,
        assets/images/header_791.png 791w,
        assets/images/header_871.png 871w,
        assets/images/header_948.png 948w,
        assets/images/header_1019.png 1019w,
        assets/images/header_1067.png 1067w"
        src="assets/images/header_1067.png"
        alt="" class="headerimage">
    </header>

    <nav>
      <ul class="navigatie">
        <li >
          <a href="index.php"><img src="assets/images/house.svg" alt="home" width="25" height="25"></a>
        </li>
        <li class="navActiviteiten">
          <a href="index.php?page=activiteiten" class="hoverNavigatie<?php if($currentPage == 'activiteiten') echo ' active';?> pijltje">Events</a>
          <ul class="subNavigatie">
            <li class="subNavigatieA">
              <a href="index.php?page=activiteiten" class="a">Alle activiteiten</a>
            </li>
            <li class="subNavigatieA">
              <a href="#" class="a">Eigen activiteit</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#" class="hoverNavigatie">Informatie</a>
        </li>
          <li class="navmobile navActiviteiten">
            <a href="#" class="hoverNavigatie pijltje">Meer</a>
            <ul class="subNavigatie">

              <li class="subNavigatieMeer">
                <a href="#" class="hoverNavigatie">Scholen</a>
              </li>
              <li class="subNavigatieMeer">
                <a href="#" class="hoverNavigatie">Vorige edities</a>
              </li>
              <li class="subNavigatieMeer">
                <a href="#" class="hoverNavigatie">Contact</a>
              </li>
            </ul>
          </li>
          <ul class="navdesk">
            <li>
              <a href="#" class="hoverNavigatie">Scholen</a>
            </li>
            <li>
              <a href="#" class="hoverNavigatie">Vorige edities</a>
            </li>
            <li>
              <a href="#" class="hoverNavigatie">Contact</a>
            </li>
          </ul>
      </ul>
    </nav>

    <?php
      }else{
    ?>

    <nav class="nav">
      <ul class="navigatie navigatie2">
        <li >
          <a href="index.php"><img src="assets/images/house.svg" alt="home" width="25" height="25" class="homeIcon"></a>
        </li>
        <li class="navActiviteiten">
          <a href="index.php?page=activiteiten" class="hoverNavigatie<?php if($currentPage == 'activiteiten') echo ' active';?> pijltje">Events</a>
          <ul class="subNavigatie">
            <li class="subNavigatieA">
              <a href="index.php?page=activiteiten" class="a">Alle events</a>
            </li>
            <li class="subNavigatieA">
              <a href="#" class="a">Eigen event</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#" class="hoverNavigatie">Informatie</a>
        </li>
          <li class="navmobile navActiviteiten">
            <a href="#" class="hoverNavigatie pijltje">Meer</a>
            <ul class="subNavigatie">

              <li class="subNavigatieMeer">
                <a href="#" class="hoverNavigatie">Scholen</a>
              </li>
              <li class="subNavigatieMeer">
                <a href="#" class="hoverNavigatie">Vorige edities</a>
              </li>
              <li class="subNavigatieMeer">
                <a href="#" class="hoverNavigatie">Contact</a>
              </li>
            </ul>
          </li>
        <ul class="navdesk">
          <li>
            <a href="#" class="hoverNavigatie">Scholen</a>
          </li>
          <li>
            <a href="#" class="hoverNavigatie">Vorige edities</a>
          </li>
          <li>
            <a href="#" class="hoverNavigatie">Contact</a>
          </li>
        </ul>
      </ul>
    </nav>


    <img
      sizes="(max-width: 430px) 75vw, (max-width: 1440px) 50vw"
      srcset="
      assets/images/logo_200.png 200w,
      assets/images/logo_250.png 250w,
      assets/images/logo_294.png 294w,
      assets/images/logo_335.png 335w,
      assets/images/logo_369.png 369w,
      assets/images/logo_404.png 404w,
      assets/images/logo_439.png 439w,
      assets/images/logo_470.png 470w,
      assets/images/logo_501.png 501w,
      assets/images/logo_521.png 521w,
      assets/images/logo_531.png 531w"
      src="assets/images/logo_531.png"
      alt="Week van de mobiliteit" class="logo">

    <?php
      }
    ?>

    <div class="container">
      <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?>
      <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?>

      <?php echo $content; ?>
    </div>

    <footer class="footer">
      <div class="">
        <h2>Tweet met de hashtag <a href="https://twitter.com/hashtag/goedopweg?src=hash">#goedopweg</a></h2>
        <a href="https://twitter.com/week_mobiliteit"><img src="assets/images/twitter.png" alt="twitter" width="54" height="43"></a>
      </div>
      <div>
        <p>Laura Wyffels
        <br>Major 3
        <br>2017-2018</p>
      </div>
      <div class="">
        <h2>Volg ons op instagram</h2>
        <a href="https://www.instagram.com/weekvandemobiliteit/"><img src="assets/images/instagram.svg" alt="instagram" width="54" height="54"></a>
      </div>
    </footer>

    <?php echo $js;?>
  </body>
</html>
