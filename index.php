<?php 

define("DIR", dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR);

include_once DIR.DS.'App'.DS.'Loader.php';

$loader = new \App\Loader();
$loader->register();

//testa se o page e o action tem parametros, e retorna.
$page 	= isset($_GET['page']) ? $_GET['page'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';


switch ($page) {
	case 'cart':
		$cart = new App\Controller\Cart();
		call_user_func_array(array($cart, $action), array());
		break;
	
	default:
		$home = new App\Controller\Home();
		call_user_func_array(array($home, $action), array());
		break;
}