<?php
namespace XTC\Model\Header;

class Model
{
  public $template;
  public $data = array();

  public function __construct(){
    global $xtc;
    $this->template = 'header.html.twig';

  }
}

?>
