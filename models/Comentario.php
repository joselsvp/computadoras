<?php

use database\Connection;

class Comentario{
    private $id;
    private $texto;
    private $nombre;
    private $calificacion;
    private $producto_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param mixed $texto
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * @param mixed $calificacion
     */
    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;
    }

    /**
     * @return mixed
     */
    public function getProductoId()
    {
        return $this->producto_id;
    }

    /**
     * @param mixed $producto_id
     */
    public function setProductoId($producto_id)
    {
        $this->producto_id = $producto_id;
    }

    public function save(){
        $sql = "INSERT INTO comentarios Values(NULL,'{$this->getTexto()}', '{$this->getNombre()}', '{$this->getCalificacion()}', '{$this->getProductoId()}') ";

        $statement = Connection::getConnection()->prepare($sql);

        $statement->execute();
        $this->setId(Connection::getConnection()->lastInsertId());

        return "Se ha guardado la categorias";
    }

    public function findCommentByProductId($product_id){
        $sql = 'SELECT id, texto, nombre, calificacion from comentarios where producto_id = :product_id order by calificacion desc';

        $statement = Connection::getConnection()->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindParam(':product_id', $product_id);

        $statement->execute();
        return $statement->fetchAll();
    }

    public function findCommentBestRatingByProductId($product_id){
        $sql = 'SELECT  id, texto, nombre, calificacion from comentarios where producto_id = :product_id order by calificacion desc limit 1';

        $statement = Connection::getConnection()->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindParam(':product_id', $product_id);

        $statement->execute();
        return $statement->fetch();
    }


}
