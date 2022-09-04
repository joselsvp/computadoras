<?php
require_once 'models/Categoria.php';

class CategoriaController
{

    public function __construct(){
    }

    public function create(){
        $categoriasArray =
            array(
                'computadoras' => array('laptops', 'escritorio', 'tables', 'portátiles'),
                'audio' => array('audifonos', 'micrófonos', 'bocinas', 'manos libres'),
                'monitores' => array('monitores', 'ultrawide', 'proyectores'),
                'almacenamiento' => array('tarjetas de memorias', 'discos HDD', 'SSD', 'discos duros externos'),
                'componentes' => array('tarjetas madre', 'procesadores', 'gabinetes', 'fuentes de alimentación'),
                'software' => array('sistemas operativos', 'ofimática', 'antivirus')
            );
        $categoria = new Categoria();
        $categoriaHija = new Categoria();


        foreach ($categoriasArray as $keyCategorias => $categorias){
            //validar sino existen categorias con el mismo nombre
            if(empty($categoria->findCategoriesAndSubcategoriesByName($keyCategorias))){
                $categoria->setNombre($keyCategorias);
                $categoria->setCategoriaHija(null);
                $categoria->save();

                error_log( print_r("Creación de la categoría " . $keyCategorias ,  TRUE));
            }
            foreach ($categorias as $categoriasHijas){
                //validar sino existen subcategorias con el mismo nombre
                if(empty($categoria->findCategoriesAndSubcategoriesByName($categoriasHijas, false))){
                    $categoriaHija->setNombre($categoriasHijas);
                    $categoriaHija->setCategoriaHija($categoria->findCategoriesAndSubcategoriesByName($keyCategorias)["id"]);
                    $categoriaHija->save();
                    error_log( print_r("Creación de la subcategoría " . $categoriasHijas,  TRUE));
                }
            }
        }
    }
}