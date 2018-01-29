{

  const $events = document.getElementById(`events`),
    // $searchForm = document.getElementById(`searchForm`),
    $inputSearch = document.getElementById(`search`),
    $inputPostal = document.querySelector(`[name="postal"]`),
    $inputCity = document.querySelector(`[name="city"]`),
    $inputDate = document.querySelector(`[name="date"]`);

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

    if ($inputDate) {
      $inputDate.addEventListener(`input`, handleFilter);
    }
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
    const postal = $inputPostal.value.trim();
    const city = $inputCity.value.trim();
    const date = $inputDate.value;

    fetch(`index.php?page=activiteiten&date=${date}&postal=${postal}&city=${city}`, {
      headers: new Headers({
        Accept: `application/json`,
      }),
    })
      .then(r => r.json())
      .then(data => handleLoadEvents(data));


    const handleLoadEvents = data => {
      $events.innerHTML = data
        .map(event => createEvent(event))
        .join(``);
    };
  };

  const createEvent = event => {
    if (event.startFormatted === event.endFormatted){
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
            <p>${event.address}
            <br>${event.postal} ${event.city}</p>
          </section>
          <section>
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
              <p>${event.address}
              <br>${event.postal} ${event.city}</p>
            </section>
            <section>
              <p class="eventsDatum">${event.startFormatted} september 2018</p>
              <br>tot <${event.endFormatted} september 2018</p>
            </section>
          </div>
        </article>`;
    }
  };


  init();
}
