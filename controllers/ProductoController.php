<?php
require_once 'models/Producto.php';
require_once 'models/Categoria.php';
require_once 'models/Comentario.php';

class productoController{

    public function __construct(){
    }

    public function index(){
        $categories = (new Categoria())->findAllCategoriesAndSubcategories() ;
        if (isset($_GET['id'])){
            $products = (new Producto())->findProductBySubcategoryId(base64_decode($_GET['id']));
        }else{
            $products = (new Producto())->findAllProducts();
            error_log(print_r($products, true));
        }

        require_once 'views/productoIndex.php';
    }

    public function create(){
        $test = $this->fetchDetails('POST', 'https://api.mercadolibre.com/sites/MLA/search?q=antivirus',['Bearer APP_USR-8277320465459955-090512-6445e6fa3abc93ea29d62e56ed5d6da2-163670432']);
        $test  = json_decode(json_encode($test), true);
        $test = json_decode($test);
        $producto = new Producto();
        $producto->setSubcategoryId(1871);

        if(!empty($test->results)){
            foreach ($test->results as $key => $item){
                if($key <= 10){
                    $producto->setModelo(addslashes($item->title));
                    $producto->setPrecio($item->price * 0.14);
                    $producto->setUrlImage($item->thumbnail);
                    $producto->setVendidos(rand(1, 10000));

                    error_log(print_r($producto, true));

                    foreach ($item->attributes as $atributos){
                        $producto->setEspecificaciones($atributos->value_name);
                    }
                    echo $producto->save();
                }
            }
        }
    }

    public function show(){
        if(isset($_GET['id'])){
            $product_content = (new Producto())->findProductById(base64_decode($_GET['id']));
            if($product_content){
                $categories = (new Categoria())->findAllCategoriesAndSubcategories() ;
                $products = (new Producto())->findAllProducts();
                $comments = (new Comentario())->findCommentByProductId(base64_decode($_GET['id']));
                error_log(print_r($comments, true));
                require_once 'views/productoShow.php';

            }
        }
    }


    private function fetchDetails($method, $url, $arguments = []) {

        $curl = curl_init();

        $header = array();
        $header[] = 'Content-type: application/json';
        $header = array_merge($header, $arguments);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER,$header);

        $contenido = curl_exec($curl);

        var_dump($curl);

        $errorCode = 0;
        $errorMessage = "";

        if (curl_errno($curl)) {
            $errorCode = curl_errno($curl);
            $errorMessage = curl_error($curl);
        }

        curl_close($curl);

        if ($errorCode) {
            error_log($errorCode . $errorMessage);
            return false;
        }

        return $contenido;
    }
}
