<?php
namespace XTC\Model\Page;

class Model
{
  public $template;
  public $data = array();

  public function __construct($route){
    global $xtc;

    if ($route['page'] == '') {
      $this->template = "homepage.html.twig";
      $this->data = array('name' => 'John Doe');
    }
    else { 
      // Set browser header
      header("HTTP/1.0 404 Not Found");

      // Determine template and referer
      $this->template = "404.html.twig";
      $this->data = array('referer' => (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $xtc->get_site_url()));
    }
  }
}

?>
