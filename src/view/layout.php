<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Autovrij</title>
    <?php echo $css;?>
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
      <div  class="backgroundheader">
        <img src="assets/images/backgroundheader.png" alt="weekVanDeMobiliteit" width="643" height="748">
      </div>
      <div class="girl_bike">
        <img src="assets/images/bike_girl_left.png" alt="weekVanDeMobiliteit" width="415" height="402">
        <img src="assets/images/bike_girl_right.png" alt="weekVanDeMobiliteit" width="415" height="402">
      </div>
    </header>

    <nav>
      <ul class="navigatie">
        <li class="navActiviteiten">
          <a href="index.php?page=activiteiten" class="hoverNavigatie<?php if($currentPage == 'activiteiten') echo ' active';?>">Activiteiten</a>
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

    <?php
      }else{
    ?>

        <a href="index.php"><img src="assets/images/logo.png" alt="" width="389" height="402" class="logo"></a>

        <nav class="nav">
          <ul class="navigatie">
            <li class="navActiviteiten">
              <a href="index.php?page=activiteiten" class=" hoverNavigatie<?php if($currentPage == 'activiteiten') echo ' active';?>">Activiteiten</a>
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



    <?php
      }
    ?>

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
