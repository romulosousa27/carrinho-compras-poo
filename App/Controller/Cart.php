<?php 
 
 namespace App\Controller;

 use App\Model\Shopping\Cart as InterfaceCart;
 use App\Model\Product\ProductRepository;
use App\Model\Shopping\CartItem;
use App\MVC\Controller;

 class Cart extends Controller{
    private $product, $cart;

    public function __construct(ProductRepository $productRepository, InterfaceCart $cart){
        parent::__construct();
        $this->product = $productRepository;
        $this->cart = $cart;
    }

     public function index(){
        $this->view->set('carTotal', $this->cart->getTotal());
        $this->view->set('cartItems', $this->cart->getCartItems());
 		$this->view->render('view');
 	}

 	public function add(){
        if (isset($_POST['id']) && preg_match("/^[0-9]+/", $_POST['id'])){
            $product = $this->product->getProduct($_POST['id']);
            $carItem = new CartItem($product, 1);
            $this->cart->add($carItem);
        }
        header("Location: index.php?page=cart");
    }

    public function update(){
        if (isset($_POST['id']) && preg_match("/^[0-9]+/", $_POST['id'])){
            $product = $this->product->getProduct($_POST['id']);
            $carItem = new CartItem($product, $_POST['quantity']);
            $this->cart->update($carItem);
        }
        header("Location: index.php?page=cart");
    }

    public function delete(){
        if (isset($_GET['id']) && preg_match("/^[0-9]+/", $_GET['id'])){
            $this->cart->delete($_GET['id']);
        }
        header("Location: index.php?page=cart");
    }

 }