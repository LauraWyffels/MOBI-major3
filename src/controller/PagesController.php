<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/EventDAO.php';

class PagesController extends Controller {

  public function index() {
    $this->set('title', 'Home');
    $this->set('currentPage', 'home');
  }

  public function activiteiten() {
    $this->set('title', 'activiteiten');
    $this->set('currentPage', 'activiteiten');

    $EventDAO = new EventDAO();
    $products = $EventDAO->selectAll();
    $this->set('events',$events);
  }






}
