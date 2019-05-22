<?php
namespace XTC\Model\Navigation;

class Model
{
  public $template;
  public $data = array();

  public function __construct($route){
    global $xtc;
    $token = $xtc->jwt->get_token();

    $categories_url = $xtc->api_call . '/api/v1alpha1/resources/product-category?access_token=' . $token;
    $categories_results = $xtc->jwt->query($categories_url);
    
    $current_page = (isset($route['controller']) ? $route['controller'] : ($route['page'] == '' ? 'home' : $route['page']));

    $this->data = array(
      'categories' => $categories_results['data']['data'],
      'site_url' => $xtc->site_url,
      'current_page' => $current_page,
      'cart_enabled' => $xtc->cart_enabled
    );

    if ($current_page == 'categories') { $this->data += ['category' => $route['id']]; }

    $this->template = 'navigation.html.twig';

  }
}

?>
