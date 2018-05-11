<?php 
session_start();
define("DIR", dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR);

use App\Model\Product\ProductRepositoryPDO;
use App\Model\Shopping\CartSession;
use App\Controller\Cart;
use App\Controller\Home;
use App\Loader;

include_once DIR.DS.'App'.DS.'Loader.php';

$loader = new Loader();
$loader->register();

$pdo = new \PDO('mysql:host=localhost; dbname=shop', 'root', '');
$productRepository = new ProductRepositoryPDO($pdo);

//testa se o page e o action tem parametros, e retorna.
$page 	= isset($_GET['page']) ? $_GET['page'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';


switch ($page) {
	case 'cart':
	    //instancia
        $sessionCart = new CartSession();
		$cart = new Cart($productRepository, $sessionCart);
		call_user_func_array(array($cart, $action), array());
		break;
	
	default:
        //instancia
		$home = new Home($productRepository);
		call_user_func_array(array($home, $action), array());
		break;
}