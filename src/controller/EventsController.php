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
    if (isset($_POST['query'])) {
      $conditions[] = array(
        'field' => 'title',
        'comparator' => 'like',
        'value' => $_POST['query']
      );
    }
    //search op postcode
    if (isset($_POST['postal'])) {
      $conditions[] = array(
        'field' => 'postal',
        'comparator' => 'like',
        'value' => $_POST['postal']
      );
    }

    //search op stad
    if (isset($_POST['city'])) {
      $conditions[] = array(
        'field' => 'city',
        'comparator' => 'like',
        'value' => $_POST['city']
      );
    }

    $this->set('title', 'activiteiten');
    $this->set('currentPage', 'activiteiten');

    $events = $this->eventDAO->search($conditions);
    $this->set('events',$events);
  }

  public function detail() {
    // $events = $this->eventDAO->selectById($_GET['id']);
    // $this->set('events', $events);

    $conditions = array();
    $this->set('title', 'detail');
    $this->set('currentPage', 'detail');

    if(empty($_GET['id']) || !$event = $this->eventDAO->selectById($_GET['id'])) {
      $_SESSION['error'] = 'Invalid event';
      header('Location: index.php');
    }

    $events = $this->eventDAO->search($conditions);
    $this->set('event',$event);


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
