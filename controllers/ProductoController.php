<?php
require_once 'models/Producto.php';

class productoController{

    public function __construct(){
    }

    public function index(){
        echo 'controlador de productos';
    }

    public function save(){

        echo 'metodo de guardado';

        $producto = new Producto();


        $mensaje = $producto->save();

        echo $mensaje;
    }
}
