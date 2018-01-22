<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Autovrij</title>
    <?php echo $css;?>
  </head>
  <body>

    <header>
      <section class="header">
        <div class="wvdm">
          <p>
            <span class="week">Week</span>
           <br><span class="vande">van</span>
           <br><span class="de">de</span>
           <br><span class="mobiliteit">mobiliteit</span>
           <br><span class="datum">16 - 22 september</span>
         </p>
        </div>
        <div  class="backgroundheader">
          <img src="assets/images/backgroundheader.png" alt="weekVanDeMobiliteit" width="643" height="748">
        </div>
        <div class="girl_bike">
          <img src="assets/images/bike_girl_left.png" alt="weekVanDeMobiliteit" width="415" height="402">
          <img src="assets/images/bike_girl_right.png" alt="weekVanDeMobiliteit" width="415" height="402">
        </div>
      </section>
      <section>
        <h1><a href="index.php"><span class="hide">Week van de mobiliteit</span></a></h1>
          <nav>
            <ul class="navigatie">
              <li>
                <a href="activiteiten.php" class="navActiviteiten hoverNavigatie<?php if($currentPage == 'activiteiten') echo ' active';?>">Activiteiten</a>
              </li>
<!--
              <ul class="subNavigatie">
                <li>
                  <a href="#" class="hoverNavigatie">Alle activiteiten</a>
                </li>
                </ul>
                <ul  class="subNavigatie">
                <li>
                  <a href="#" class="hoverNavigatie">Eigen activiteit</a>
                </li>
              </ul> -->

              <li>
                <a href="#" class="hoverNavigatie">Informatie</a>
              </li>
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

          </nav>
        </section>
    </header>

    <div class="container">
      <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?>
      <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?>

      <?php echo $content; ?>
    </div>

    <footer class="footer">

    </footer>

    <?php echo $js;?>
  </body>
</html>
