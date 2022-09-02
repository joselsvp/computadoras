<?php

use database\Connection;

class Producto {
    private $modelo;
    private $especificaciones;
    private $precio;

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getEspecificaciones()
    {
        return $this->especificaciones;
    }

    /**
     * @param mixed $especificaciones
     */
    public function setEspecificaciones($especificaciones)
    {
        $this->especificaciones = $especificaciones;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function save(){
        echo 'modelo de guardado';

        $sql = "INSERT INTO productos Values(NULL, 'laptop', 'ryzen 7 8gb ram + 2TB SSD', 33500.99) ";

        $statement = Connection::getConnection()->prepare($sql);

        $statement->execute();

        return "se ha guardado el producto";
    }
}
