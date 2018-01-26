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
    <form class="" action="index.php?page=activiteiten" method="get">
      <fieldset class="fieldsetSearch">
        <div class="zoekbalk">
          <img src="assets/images/search.svg" alt="" width="40" height="40" class="searchimage">
          <input type="search" name="query" class="searchinput" placeholder="Zoek een event..." id="search">
        </div>
        <input type="hidden" name="page" value="activiteiten">
        <input type="submit" name="action" value="Zoek" class="submitSearch">
      </fieldset>
    </form>
  </section>

  <section  class="filter">
    <h2 class="hide">Filters</h2>
    <form action="index.php?page=activiteiten" method="get">
      <fieldset class="fieldsetFilter">
        <input type="hidden" name="page" value="activiteiten">
      <div class="divFilter">
        <div class="fieldsetFilterDiv1">
          <section class="">
            <h2 class="filterTitle">Kies je activiteit met of zonder</h2>
            <div class="flex">
              <input class="filterKinderen" type="radio" name="Kinderen" value="Kinderen">
            </div>
          </section>
          <section class="">
            <h2 class="filterTitle">Kies de plaats van je activiteit </h2>
            <div class="plaats">
              <label class="column">
                <span>Postcode</span>
                <input type="text" name="postal" class="inputplaats inputPostcode" placeholder="8500">
              </label>
              <label class="column">
                <span>Stad</span>
                <input type="text" name="city" class="inputplaats inputplaatsStad" placeholder="Kortrijk" id="city" value="<?php echo $_GET['city']; ?>">
              </label>
            </div>
          </section>
        </div>

        <section class="fieldsetFilterDiv1">
          <h2 class="filterTitle">Kies je activiteit per dag</h2>
            <div class="filterDays">

            <label  class="filterDay">
              <input type="radio" name="select" value="2018-09-16" class="radio">
              <p>Ma 16/09</p>
            </label>
            <label  class="filterDay">
              <input type="radio" name="select" value="2018-09-17" class="radio">
              <p>Di 17/09</p>
            </label>
            <label  class="filterDay">
              <input type="radio" name="select" value="2018-09-18" class="radio">
              <p>Woe 18/09</p>
            </label>
            <label  class="filterDay">
              <input type="radio" name="select" value="2018-09-19" class="radio">
              <p>Do 19/09</p>
            </label>
            <label  class="filterDay">
              <input type="radio" name="select" value="2018-09-20" class="radio">
              <p>Vrij 20/09</p>
            </label>
            <label  class="filterDay">
              <input type="radio" name="select" value="2018-09-21" class="radio">
              <p>Zat 21/09</p>
            </label>
            <label  class="filterDay">
              <input type="radio" name="select" value="2018-09-22" class="radio">
              <p>Zon 22/09</p>
            </label>

          </div>
          <input type="submit" name="action" value="Zoek" class="submitFilterForm">
        </section>
      </div>
      </fieldset>
    </form>
</section>


  <section class="events">
    <?php foreach($events as $event): ?>
      <article class="eventArticle">
        <header><h1 class="eventTitle"><?php echo $event['title']; ?></h1></header>
        <a href="index.php?page=detail&amp;id=<?php echo $event['id'];?>">
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
    <?php endforeach;?>
  </section>
</main>
