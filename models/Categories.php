<?php
namespace XTC\Model\Categories;

class Model
{
  public $template;
  public $data = array();

  public function __construct($route){
    global $xtc;

    $page = $route['page'];
    $category = $route['id'];

    $token = $xtc->jwt->get_token();

    $categories_url = $xtc->api_call . '/api/v1alpha1/resources/product-category?access_token=' . $token;
    $categories_results = $xtc->jwt->query($categories_url);
    $products_category_label = '';

    if ($category != 'all') {
      $products_category = $categories_results['data']['data'][($category - 1)]['code'];
      $products_category_label = ucwords(strtolower(str_replace("-", " ", $products_category)));
    }

    $products_count = $xtc->api_call . '/api/v1alpha1/resources/xd-product?count=true' . ($category != 'all' ? '&query[productCategory][EQUALS]=' . $products_category : '') . '&access_token=' . $token;
    $products_total = $xtc->jwt->query($products_count)['data']['data']['0']['count'];
    $products_per_page = $xtc->products_per_page;
    
    $pages = ceil($products_total / $products_per_page);

    // used in the rest api call as an offset
    $products_filter = $page - 1; 

    $products_url = $xtc->api_call . '/api/v1alpha1/resources/xd-product?orderby[product_id]=ASC&maxResults=' . $products_per_page . '&pageToken=' . $products_filter . (isset($category) && $category != 'all' ? '&query[productCategory][EQUALS]=' . $products_category : '') . '&access_token=' . $token;
    $products_results = $xtc->jwt->query($products_url);

    $products_empty = false;
    if (!$products_results['data']) { $products_empty = true; }

    $this->data = array(
      'categories' => $categories_results['data']['data'],
      'products_empty' => $products_empty,
      'products_total' => $products_total,
      'category' => $category,
      'page' => $page,
      'pages' => $pages,
      'category_label' => $products_category_label,
      'cart_enabled' => $xtc->cart_enabled,
      'site_url' => $xtc->site_url,
    );
    if (isset($products_results['data']['data'])) { $this->data += ['products_results' => $products_results['data']['data']]; }
    $this->template = 'categories.html.twig';

  }
}

?>
