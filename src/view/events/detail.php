<header class="headerActiviteiten headerDetail">
  <div class="titleActiviteit">
    <h1  class="detailTitle"><?php echo $event['title']; ?></h1>
    <p class="weekvdmobiliteitDetail">Week van de mobiliteit</p>
    </div>

    <img
      sizes="(max-width: 1067px) 100vw, 1067px"
      srcset="
      assets/images/header2_200.png 200w,
      assets/images/header2_365.png 365w,
      assets/images/header2_485.png 485w,
      assets/images/header2_591.png 591w,
      assets/images/header2_679.png 679w,
      assets/images/header2_762.png 762w,
      assets/images/header2_837.png 837w,
      assets/images/header2_910.png 910w,
      assets/images/header2_982.png 982w,
      assets/images/header2_1049.png 1049w,
      assets/images/header2_1067.png 1067w"
      src="assets/images/header2_1067.png"
      alt="" class="headerimage">
</header>

<main class="detail">
  <h1  class="titleDetail"><?php echo $event['title']; ?></h1>
  <section>
    <h2 class="hide">tags</h2>
    <ul  class="tags"><?php
    foreach($event['tags'] as $tag): ?><li class="tag"><?php echo $tag['tag'];?></li><?php endforeach;?></ul>
  </section>

  <div class="DetailSection">
    <section>
      <h2 class="hide">event image</h2>
      <img src="assets/images/events/<?php echo $event['code'];?>.jpg" alt="" width="500" height="360" class="eventImage">
    </section>
    <section class="GeelInfoBlok">
      <h2 class="hide">Adres</h2>
      <img src="assets/images/icon_map.svg" alt="Adress" width="34" height="60" class="iconAdres">

      <?php if($event['address'] === "Diverse locaties"){ ?>
        <p><?php echo $event['location'];?></p>
      <?php
      }else if ($event['address'] === $event['location']) {
      ?>
      <p class="address"><?php echo $event['address']; ?>
      <br><?php echo $event['postal'];?> <?php echo $event['city'];?>
      <?php  }else { ?>

      <p class="address"><?php echo $event['address']; ?>
        <br><?php echo $event['postal'];?> <?php echo $event['city'];?>
      </p>
      <p class="locatie"><?php echo $event['location'];?></p>
      <?php
        }
      ?>

      <h2 class="hide">Datum</h2>
      <img src="assets/images/icon_time.svg" alt="Datum" width="49" height="60" class="iconDate">
      <?php if (date('d', strtotime($event['start'])) === date('d', strtotime($event['end']))){?>
        <p class="datumDetail"><?php echo date('d', strtotime($event['start']));?> september 2018</p>
      <?php
        }else{
      ?>
        <p class="datumDetail">van <?php echo date('d', strtotime($event['start']));?> september 2018
        <br>tot <?php echo date('d', strtotime($event['end']));?> september 2018</p>
      <?php
        }
      ?>

      <p class="timeDetail">start: <?php echo date('G', strtotime($event['start']));?>:<?php echo date('i', strtotime($event['start']));?> uur
        <br>end: <?php echo date('G', strtotime($event['end']));?>:<?php echo date('i', strtotime($event['end']));?> uur
      </p>

      <h2 class="hide">Organisatoren</h2>
      <img src="assets/images/icon_organisator.svg" alt="Organisatoren" width="85" height="60" class="iconOrganisator">
      <ul  class="organisators"><?php foreach($event['organisers'] as $name): ?><li> - <?php echo $name['name'];?></li><?php endforeach;?></ul>
    </section>
  </div>
  <div class="DetailSection2">
    <section class="content">
      <h2 class="practicalTitle">Informatie</h2>
      <article class="infoP"><?php echo $event['content'];?></article>
    </section>

    <section class="practical">
      <?php if($event['practical']): ?>
        <h2 class="practicalTitle">Praktisch</h2>
        <article class="infoP"><?php echo $event['practical'];?></article>
      <?php endif ?>
    </section>
  </div>
</main>
