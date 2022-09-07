<?php

use database\Connection;

class Producto {
    private $modelo;
    private $especificaciones;
    private $precio;
    private $subcategory_id;
    private $url_image;

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

    /**
     * @return mixed
     */
    public function getSubcategoryId()
    {
        return $this->subcategory_id;
    }

    /**
     * @param mixed $subcategory_id
     */
    public function setSubcategoryId($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;
    }

    /**
     * @return mixed
     */
    public function getUrlImage()
    {
        return $this->url_image;
    }

    /**
     * @param mixed $url_image
     */
    public function setUrlImage($url_image)
    {
        $this->url_image = $url_image;
    }


    public function save(){
        $sql = "INSERT INTO productos Values(NULL, '{$this->getModelo()}', '{$this->getEspecificaciones()}', '{$this->getPrecio()}','{$this->getSubcategoryId()}', '{$this->getUrlImage()}' ) ";

        $statement = Connection::getConnection()->prepare($sql);

        $statement->execute();

        return "Se ha guardado el producto";
    }

    public function findAllProducts(){
        $sql = 'SELECT p.id, p.modelo, p.especificaciones, p.precio, p.url_image, c.nombre as categoria FROM productos p
                inner join categorias c on c.id = p.subcategory_id';

        $statement = Connection::getConnection()->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        $statement->execute();
        return $statement->fetchAll();
    }

    public function findProductById($product_id){
        $sql = 'SELECT p.id, p.modelo, p.especificaciones, p.precio, p.url_image, c.nombre as categoria FROM productos p
                inner join categorias c on c.id = p.subcategory_id where p.id = :id';

        $statement = Connection::getConnection()->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindParam(':id', $product_id);

        $statement->execute();
        return $statement->fetch();
    }

    public function findProductBySubcategoryId($subcategory_id){
        $sql = 'SELECT p.id, p.modelo, p.especificaciones, p.precio, p.url_image, c.nombre as categoria FROM productos p
                inner join categorias c on c.id = p.subcategory_id where c.id = :id';

        $statement = Connection::getConnection()->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindParam(':id', $subcategory_id);

        $statement->execute();
        return $statement->fetchAll();
    }
}
