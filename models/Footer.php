<?php
namespace XTC\Model\Footer;

class Model
{
  public $template;
  public $data = array();

  public function __construct(){
    global $xtc;
    $this->template = 'footer.html.twig';

  }
}

?>
