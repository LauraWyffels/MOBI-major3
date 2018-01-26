<header class="headerDetail">
  <div class="titleActiviteit">

    <h1  class="detailTitle"><?php echo $event['title']; ?></h1>
    <p class="weekvdmobiliteit">Week van de mobiliteit</p>

  </div>
  <div  class="backgroundheader">
    <img src="assets/images/backgroundheader2.png" alt="weekVanDeMobiliteit" width="578" height="501">
  </div>
  <div class="girl_bike2">
    <img src="assets/images/bike_girl_left.png" alt="weekVanDeMobiliteit" width="415" height="402">
    <img src="assets/images/bike_girl_right.png" alt="weekVanDeMobiliteit" width="415" height="402">
  </div>
</header>

<main class="detail">
  <section class="tags">
    <ul><?php

    // var_dump($event); //array


    foreach($event['tags'] as $tag): ?><li><?php echo $tag['tag'];?></li><?php endforeach;?></ul>
  </section>
  <section class="section1">
    <img src="assets/images/events/<?php echo $event['code'];?>.jpg" alt="" width="500" height="360" class="eventImage" >
    <div class="GeelInfoBlok">
      <article class="">
        <h2 class="hide">Adres</h2>
        <img src="assets/images/icon_map.svg" alt="Adress" width="34" height="60">
        <?php if($event['address'] === "Diverse locaties"){ ?>
          <p><?php echo $event['location'];?></p>
        <?php
        }else if ($event['address'] === $event['location']) {
      ?>  <p><?php echo $event['address']; ?>
          <br><?php echo $event['postal'];?> <?php echo $event['city'];?>
        <?php  }else { ?>
        <p><?php echo $event['address']; ?>
          <br><?php echo $event['postal'];?> <?php echo $event['city'];?>
          <br>
          <br><?php echo $event['location'];?>
        </p>
        <?php
          }
        ?>

        <!-- <p><?php echo $event['address']; ?>
          <br><?php echo $event['postal'];?> <?php echo $event['city'];?>
          <br>
          <br><?php echo $event['location'];?>
        </p> -->
      </article>

      <svg  width="4" height="300" viewBox="0 0 4 300">
      <g>
      	<line class="yellowline" x1="2.1" y1="0" x2="2.1" y2="300"/>
      </g>
      </svg>

      <article class="articleDate">
        <h2 class="hide">Datum</h2>
        <img src="assets/images/icon_time.svg" alt="Datum" width="48,82" height="60">
        <?php if (date('d', strtotime($event['start'])) === date('d', strtotime($event['end']))){?>
          <p class="eventsDatum"><?php echo date('d', strtotime($event['start']));?> september 2018</p>
        <?php
          }else{
        ?>
          <p class="eventsDatum">van <?php echo date('d', strtotime($event['start']));?> september 2018
          <br>tot <?php echo date('d', strtotime($event['end']));?> september 2018</p>
        <?php
          }
        ?>
        <br>
        <p>start: <?php echo date('G', strtotime($event['start']));?>:<?php echo date('i', strtotime($event['start']));?> uur
          <br>end: <?php echo date('G', strtotime($event['end']));?>:<?php echo date('i', strtotime($event['end']));?> uur
        </p>
      </article>

      <svg  width="4" height="300" viewBox="0 0 4 300">
      <g>
        <line class="yellowline" x1="2.1" y1="0" x2="2.1" y2="300"/>
      </g>
      </svg>

      <article class="">
        <h2 class="hide">Organisatoren</h2>
        <img src="assets/images/icon_organisator.svg" alt="Organisatoren" width="84,67" height="60">
        <!-- <p><ul><?php foreach($event['name'] as $name): ?><li><?php echo $name['name'];?></li><?php endforeach;?></ul></p> -->
      </article>
    </div>
    <?php if($event['practical'] === ""){ ?>
    <?php echo " ";?>
    <?php
      }else{
    ?>
    <h3 class="titledetail">Praktisch</h3>
    <?php
      }
    ?>
    <p><?php echo $event['practical'];?></p>
  </section>
  <section class="section2">
    <h2 class="titledetail"><?php echo $event['title']; ?></h2>
    <p><?php echo $event['content'];?></p>
  </section>
</main>
