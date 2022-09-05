<?php
require_once 'models/Producto.php';
require_once 'models/Categoria.php';

class productoController{

    public function __construct(){
    }

    public function index(){
        $categories = (new Categoria())->findAllCategoriesAndSubcategories() ;
        require_once 'views/productoView.php';
    }

    public function save(){
        $producto = new Producto();
        $producto->setModelo('hp 23 2TB SSD');
        $producto->setEspecificaciones('color gris');
        $producto->setPrecio(12599.00);

        echo $producto->save();
    }
}
