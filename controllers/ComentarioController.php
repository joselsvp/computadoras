<?php
require_once 'models/Categoria.php';
require_once 'models/Producto.php';
require_once 'models/Comentario.php';

class ComentarioController
{

    public function __construct(){
    }

    public function create(){
        $products = (new Producto())->findAllProducts();

        foreach ($products as $product){
            $comentario = new Comentario();
            $comentario->setNombre($product['modelo']);
            $comentario->setTexto("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
            $comentario->setCalificacion(rand(1, 5));
            $comentario->setProductoId($product['id']);
            $comentario->save();

            error_log(print_r($comentario, true));

        }


    }



}