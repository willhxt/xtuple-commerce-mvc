<?php
namespace XTC;

// Load composer packages
require_once('assets/vendor/autoload.php');

// Set up twig
use Twig_Environment;
use Twig_Loader_Filesystem;

// Load router
require_once('router.php');

class Core
{
  public $router;
  public $loader;
  public $twig;
  public $options;
  public $api_url;
  public $erp_db;
  public $site_domain;
  public $ssl_enabled;
  public $cart_enabled;
  public $current_page;
  public $site_url;
  public $api_call;

  public function __construct() {

    // Globals
    $this->api_url = constant('API_URL');
    $this->erp_db = constant('ERP_DATABASE');
    $this->site_domain = constant('SITE_DOMAIN');
    $this->ssl_enabled = constant('USE_SSL');
    $this->cart_enabled = constant('USE_CART');
    $this->current_page = basename($_SERVER['PHP_SELF']);
    $this->site_url = ($this->ssl_enabled == true ? 'https://' : 'http://') . $this->site_domain;
    $this->api_call = $this->api_url . '/' . $this->erp_db;

    // Initiate routing object
    $this->router = new Core\Router();
    $this->options = array(
      'strict_variables' => false,
      'debug' => false,
      'cache'=> false
    );
    // Set up twig templating
    $this->loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
    $this->twig = new Twig_Environment($this->loader, $this->options);
  }

  public function header($route) {

    // Load required MVC frameworks
    require_once('models/Header.php');
    require_once('views/Header.php');
    require_once('controllers/Header.php');

    // Initiate MVC objects
    $model = new Model\Header\Model($route);
    $controller = new Controller\Header\Controller($model);
    $view = new View\Header\View($controller, $model);

    // Display page
    $view->render();

  }
  public function navigation($route) {

    // Load required MVC frameworks
    require_once('models/Navigation.php');
    require_once('views/Navigation.php');
    require_once('controllers/Navigation.php');

    // Initiate MVC objects
    $model = new Model\Navigation\Model($route);
    $controller = new Controller\Navigation\Controller($model);
    $view = new View\Navigation\View($controller, $model);

    // Display page
    $view->render();

  }
  
  public function page($route) {

    // Load required MVC frameworks
    require_once('models/Page.php');
    require_once('views/Page.php');
    require_once('controllers/Page.php');

    // Initiate MVC objects
    $model = new Model\Page\Model($route);
    $controller = new Controller\Page\Controller($model);
    $view = new View\Page\View($controller, $model);

    // Display page
    $view->render();

  }
  public function controller($route) {
    if ($route['controller'] == 'categories') { $class = "Categories"; }
    
    // Load required MVC frameworks
    require_once('models/'. $class . '.php');
    require_once('views/'. $class . '.php');
    require_once('controllers/'. $class .'.php');

    // Initiate MVC objects
    $model_name = 'XTC\Model\\' . $class .'\Model';
    $model = new $model_name($route);
    
    $controller_name = 'XTC\Controller\\' . $class .'\Controller';
    $controller = new $controller_name($model);

    $view_name = 'XTC\View\\' . $class .'\View';
    $view = new $view_name($controller, $model);

    // Display page
    $view->render();
  
  }

  public function get_site_url() { 
    if (defined('SITE_DOMAIN')) { 
      return (constant('USE_SSL') == true ? 'https://' : 'http://') . constant('SITE_DOMAIN');
    }
    else { return 'http://' . $_SERVER['HTTP_HOST']; }
  }
}

?>