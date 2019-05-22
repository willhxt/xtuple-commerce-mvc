<?php
namespace XTC\Model\Header;

class Model
{
  public $template;
  public $data = array();

  public function __construct(){
    global $xtc;
    $this->data = array(
      'site_url' => $xtc->site_url
    );
    $this->template = 'header.html.twig';

  }
}

?>
