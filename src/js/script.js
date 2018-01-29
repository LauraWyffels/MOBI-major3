{

  const $events = document.getElementById(`events`),
    $inputSearch = document.getElementById(`search`),
    $inputPostal = document.querySelector(`.inputPostcode`),
    $inputCity = document.querySelector(`.inputplaatsStad`);
    // $clickDate = document.querySelectorAll(`[name="select"]`);

  const init = () => {
    if ($inputSearch) {
      $inputSearch.addEventListener(`input`, handleInputSearch);
    }

    if ($inputPostal) {
      $inputPostal.addEventListener(`input`, handleFilter);
    }

    if ($inputCity) {
      $inputCity.addEventListener(`input`, handleFilter);
    }

    // if ($clickDate) {
    //   $clickDate.addEventListener(`click`, handleFilter);
    // }
  };

  const handleInputSearch = () => {
    const input = $inputSearch.value.trim();

    fetch(`index.php?query=${input}&page=activiteiten`, {
      headers: new Headers({
        Accept: `application/json`,
      }),
    })
      .then(r => r.json())
      .then(data => parse(data));

    const parse = results => {
      $events.innerHTML = results
        .map(event => createEvent(event))
        .join(``);
    };
  };

  const handleFilter = () => {
    // console.log(date);
    const postal = $inputPostal.value.trim();
    const city = $inputCity.value.trim();
    // const date = $clickDate.value;

    fetch(`index.php?page=activiteiten&city=${city}&postal=${postal}`, {
      headers: new Headers({
        Accept: `application/json`,
      }),
    })
      .then(r => r.json())
      .then(data => handleLoadEvents(data));


    const handleLoadEvents = results => {
      $events.innerHTML = results
        .map(event => createEvent(event))
        .join(``);
    };
  };

  const createEvent = event => {
    if (event.startFormatted === event.endFormatted){
      return `
    <article class="eventArticle">
        <h2 class="eventTitle">${event.title}</h2>
        <a href="index.php?page=detail&amp;id=<?php echo $event['id'];?>">
        <div class="eventsDriehoek"></div>
        <img src="assets/images/events/${event.code}.jpg" alt="" width="500" height="360" class="eventsImage">
        <div class="eventTimeDiv">
          <h3 class="eventTimeTitle">Time</h3>
          <p class="eventTime">start: ${event.startTimeFormatted} uur
            <br>end: ${event.endTimeFormatted} uur
          </p>
        </div></a>

        <div class="eventInfo">
          <section class="eventsAdres">
            <h3 class="hide">adress</h3>
            <p>${event.address}
            <br>${event.postal} ${event.city}</p>
          </section>
          <section>
            <h3 class="hide">datum</h3>
            <p class="eventsDatum">${event.startFormatted} september 2018</p>
          </section>
        </div>
      </article>`;
    }else{
      return `
      <article class="eventArticle">
          <header><h1 class="eventTitle">${event.title}</h1></header>
          <a href="index.php?page=detail&amp;id=<?php echo $event['id'];?>">
          <div class="eventsDriehoek"></div>
          <img src="assets/images/events/${event.code}.jpg" alt="" width="500" height="360" class="eventsImage">
          <div class="eventTimeDiv">
            <h3 class="eventTimeTitle">Time</h3>
            <p class="eventTime">start: ${event.startTimeFormatted} uur
              <br>end: ${event.endTimeFormatted} uur
            </p>
          </div></a>

          <div class="eventInfo">
            <section class="eventsAdres">
              <h3 class="hide">adress</h3>
              <p>${event.address}
              <br>${event.postal} ${event.city}</p>
            </section>
            <section>
              <h3 class="hide">datum</h3>
              <p class="eventsDatum">${event.startFormatted} september 2018
              <br>tot ${event.endFormatted} september 2018</p>
            </section>
          </div>
        </article>`;
    }
  };


  init();
}
