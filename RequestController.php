<?php
class RequestController
{
  private $response = array();
  public function header() {
    $this->response[] = 'header';
  }

  public function footer() {
    $this->response[] = 'footer';
  }

  public function action1() {
    $this->response[] = 'action1';
  }

  public function action2() {
    $this->response[] = 'action2';
  }

  public function action3() {
    $this->response[] = 'action3';
  }

  public function action4() {
    $this->response[] = 'action4';
  }

  public function pageNotFound() {
    $this->response[] = 'Page not found';
  }

  public function getResponse() {
    return $this->response;
  }
}