<?php
namespace XTC\Model\Categories;

class Model
{
  public $template;
  public $data = array();

  public function __construct(){
    global $xtc;
    $this->template = 'categories.html.twig';

  }
}

?>
