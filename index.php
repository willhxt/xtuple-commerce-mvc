<?php
// Load JWT token
require_once('core/jwt.php');

// Load main controller
require_once('core/xtc.php');

// Load website configuration
require_once('config/config.php');

// Initiate core XTC object
$xtc = new XTC\Core();

// Initiate JWT tokens
$xtc->jwt = new XTC\Core\JWT_Token($JWT_Private, $JWT_Public);

// Catalog routes
$xtc->router->addRoute("/(catalog)", array("controller"), "GET");
$xtc->router->addRoute("/(catalog)/(view)/([0-9]{1,6})", array("controller", "action", "id"), "GET");

// Categories routes
$xtc->router->addRoute("/(categories)/(view)/(all)", array("controller", "action", "id"), "GET");
$xtc->router->addRoute("/(categories)/(view)/([0-9]{1,6})", array("controller", "action", "id"), "GET");

// Page route
$xtc->router->addRoute("/(.*)", array("page"), "GET");

$route = $xtc->router->parse($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

reset($route);
if (key($route) == 'page') { 
  $xtc->header($route);
  $xtc->navigation($route);
  $xtc->page($route); 
}
elseif (key($route) == 'controller') { 
  $xtc->header($route);
  $xtc->navigation($route);
  $xtc->controller($route); 
}
?>