<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';

class EventsController extends Controller {

  private $eventDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
  }

  public function activiteiten() {
    $conditions = array();

    //search op title
    if (isset($_GET['query'])) {
      $conditions[] = array(
        'field' => 'title',
        'comparator' => 'like',
        'value' => $_GET['query']
      );
    }
    //search op postcode
    if (isset($_GET['postal'])) {
      $conditions[] = array(
        'field' => 'postal',
        'comparator' => 'like',
        'value' => $_GET['postal']
      );
    }

    //search op stad
    if (isset($_GET['city'])) {
      $conditions[] = array(
        'field' => 'city',
        'comparator' => 'like',
        'value' => $_GET['city']
      );
    }

    //search op datum
    if (isset($_GET['select'])) {
      $conditions[] = array(
        'field' => 'start',
        'comparator' => '<=',
        'value' => $_GET['select'] . ' 23:59:59'
      );
      $conditions[] = array(
        'field' => 'end',
        'comparator' => '>=',
        'value' => $_GET['select'] . ' 00:00:00'
      );
    }

    //search op tags
    if (isset($_GET['tag'])) {
      $conditions[] = array(
        'field' => 'tag',
        'comparator' => '=',
        'value' => $_GET['tag']
      );
    }


    $this->set('title', 'activiteiten');
    $this->set('currentPage', 'activiteiten');

    $events = $this->eventDAO->search($conditions);
    // $this->set('events',$events);

    // JS

    foreach ($events as &$event) {
      $event['startFormatted'] = date('d/m', strtotime($event['start']));
      $event['endFormatted'] = date('d/m', strtotime($event['end']));
      $event['startTimeFormatted'] = date('H:i', strtotime($event['start']));
      $event['endTimeFormatted'] = date('d/m', strtotime($event['end']));
    }

    // if (!empty($_GET['query'])) {
      // $events = $this->eventDAO->search($_GET['query']);
      // }
      $this->set('events', $events);

    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      header('Content-Type: application/json');
      echo json_encode($events);
      exit();
    }
  }

  public function detail() {
    $this->set('currentPage', 'detail');

    $event = $this->eventDAO->selectTags($_GET['id']);
    $this->set('event', $event);
  }


  public function index() {
    $conditions = array();

    //example: search on title
    // $conditions[] = array(
    //   'field' => 'title',
    //   'comparator' => 'like',
    //   'value' => 'leie'
    // );

    //example: search on organiser_id
    // $conditions[] = array(
    //   'field' => 'organiser_id',
    //   'comparator' => '=',
    //   'value' => 8
    // );

    //example: search on organiser name
    // $conditions[] = array(
    //   'field' => 'organiser',
    //   'comparator' => 'like',
    //   'value' => 'brussel'
    // );

    //example: search on tag name
    // $conditions[] = array(
    //   'field' => 'tag',
    //   'comparator' => '=',
    //   'value' => 'e-bike'
    // );

    //example: 1-day events on september 17
    // $conditions[] = array(
    //   'field' => 'start',
    //   'comparator' => '>=',
    //   'value' => '2018-09-17 00:00:00'
    // );
    // $conditions[] = array(
    //   'field' => 'end',
    //   'comparator' => '<=',
    //   'value' => '2018-09-17 23:59:59'
    // );

    //example: events on september 17 (includes multi-day events)
    // $conditions[] = array(
    //   'field' => 'start',
    //   'comparator' => '<=',
    //   'value' => '2018-09-17 23:59:59'
    // );
    // $conditions[] = array(
    //   'field' => 'end',
    //   'comparator' => '>=',
    //   'value' => '2018-09-17 00:00:00'
    // );

    //example: search on organiser, with certain end date + time
    $conditions[] = array(
      'field' => 'organiser',
      'comparator' => 'like',
      'value' => 'brussel'
    );
    $conditions[] = array(
      'field' => 'end',
      'comparator' => '=',
      'value' => '2018-09-16 18:00:00'
    );

    $events = $this->eventDAO->search($conditions);
    $this->set('events', $events);
  }

}
