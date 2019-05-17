<?php
namespace XTC\Model\Navigation;

class Model
{
  public $template;
  public $data = array();
  public $categories_url;
  public $categories_results;

  public function __construct(){
    global $xtc;

    $this->token = $xtc->jwt->get_token();

    $this->categories_url = $xtc->api_call . '/api/v1alpha1/resources/product-category?access_token=' . $this->token;
    $this->categories_results = $xtc->jwt->query($this->categories_url);

    $this->data = array('categories' => $this->categories_results['data']['data']);
    $this->template = 'navigation.html.twig';

  }
}

?>
