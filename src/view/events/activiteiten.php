<main>

  <header class="headerActiviteiten">
    <div class="titleActiviteit">
      <h1  class="activiteiten">Activiteiten</h1>
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

  <section class="search">
    <form class="" action="index.php?page=activiteiten" method="post">
      <fieldset class="fieldsetSearch">
        <div class="zoekbalk">
          <img src="assets/images/search.svg" alt="" width="40" height="40" class="searchimage">
          <input type="text" name="stad" class="searchinput" placeholder="Steden, activiteit, dag, ..."/>
        </div>
        <input type="submit" name="" value="Zoek" class="submitSearch">
      </fieldset>
    </form>
  </section>

  <section class="filter">
    <h2 class="hide">Filters</h2>
    <div>
      <article>
        <h2 class="filterTitle">Kies je activiteit aan de hand van</h2>
        <div class="flex">
          <input class="filterKinderen" type="submit" name="Kinderen" value="Kinderen">
        </div>
      </article>

      <article>
        <h2 class="filterTitle">Kies de plaats van je activiteit </h2>
        <div class="plaats">
          <label class="column">
            <span>Postcode</span>
            <input type="text" name="postcode" class="inputplaats inputPostcode" placeholder="8500"/>
            <!-- <?php if(!empty($errors['postal'])) echo '<span class="error">' . $errors['postal'] . '</span>';?> -->
          </label>
          <label class="column">
            <span>Stad</span>
            <input type="text" name="stad" class="inputplaats inputplaatsStad" placeholder="Kortrijk"/>
            <!-- <?php if(!empty($errors['city'])) echo '<span class="error">' . $errors['city'] . '</span>';?> -->
          </label>
        </div>
      </article>
    </div>
    <article>
      <h2 class="filterTitle">Kies je activiteit per dag</h2>
      <ul class="filterDays">
        <a href=""><li class="filterDay">Ma 16/09</li></a>
        <a href=""><li class="filterDay">Di 17/09</li></a>
        <a href=""><li class="filterDay">Woe 18/09</li></a>
        <a href=""><li class="filterDay">Do 19/09</li></a>
        <a href=""><li class="filterDay">Vrij 20/09</li></a>
        <a href=""><li class="filterDay">Zat 21/09</li></a>
        <a href=""><li class="filterDay">Zon 22/09</li></a>
      </ul>
      <input type="submit" name="" value="Zoek" class="submitFilterForm">
    </article>

  </section>


  <!-- <section  class="filter">
    <h2 class="hide">Filters</h2>
    <form action="index.php?page=activiteiten" method="post">
      <fieldset class="fieldsetFilter">

        <div class="fieldsetFilterDiv1">
          <section class="">
            <h2 class="filterTitle">Kies je activiteit met of zonder</h2>
            <div class="flex">
              <input class="filterKinderen" type="submit" name="Kinderen" value="Kinderen">
            </div>
          </section>
          <section class="">
            <h2 class="filterTitle">Kies de plaats van je activiteit </h2>
            <div class="plaats">
              <label class="column">
                <span>Postcode</span>
                <input type="text" name="postcode" class="inputplaats inputPostcode" placeholder="8500"/>
              </label>
              <label class="column">
                <span>Stad</span>
                <input type="text" name="stad" class="inputplaats inputplaatsStad" placeholder="Kortrijk"/>
              </label>
            </div>
          </section>
        </div>

        <section class="fieldsetFilterDiv1">
          <h2 class="filterTitle">Kies je activiteit per dag</h2>
          <ul>
            <a href=""><li>Ma</li></a>
            <a href=""><li>Di</li></a>
            <a href=""><li>Woe</li></a>
            <a href=""><li>Do</li></a>
            <a href=""><li>Vr</li></a>
            <a href=""><li>Zat</li></a>
            <a href=""><li>Zon</li></a>
          </ul>
        </section>

      </fieldset>
    </form>
  </section> -->


  <section class="events">
    <?php foreach($events as $event): ?>
      <article class="eventArticle">
      <a href="index.php?page=detail&amp;id=<?php echo $event['id'];?>">  <header><h2 class="eventTitle"><?php echo $event['title']; ?></h2></header>
        <div class="eventsDriehoek">
        </div>
            <img src="assets/images/events/<?php echo $event['code'];?>.jpg" alt="" width="500" height="360" class="eventsImage">

        <div class="eventTimeDiv">
          <h3 class="eventTimeTitle">Time</h3>
          <p class="eventTime">start: <?php echo date('G', strtotime($event['start']));?>:<?php echo date('i', strtotime($event['start']));?> uur
            <br>end: <?php echo date('G', strtotime($event['end']));?>:<?php echo date('i', strtotime($event['end']));?> uur
          </p>
        </div></a>

        <div class="eventInfo">
        <section class="eventsAdres">
          <p><?php echo $event['address'];?>
            <br><?php echo $event['postal'];?> <?php echo $event['city'];?></p>
        </section>
        <section>
          <?php if (date('d', strtotime($event['start'])) === date('d', strtotime($event['end']))){
            ?>
            <p class="eventsDatum"><?php echo date('d', strtotime($event['start']));?> september 2018</p>
            <?php
          }else{
            ?>
            <p class="eventsDatum">van <?php echo date('d', strtotime($event['start']));?> september 2018
              <br>tot <?php echo date('d', strtotime($event['end']));?> september 2018</p>
            <?php
          } ?>
        </section>
        </div>
      </article>
    <? endforeach;?>
  </section>
</main>
