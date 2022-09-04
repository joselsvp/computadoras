<?php

use database\Connection;

class Categoria{
    private $id;
    private $nombre;
    private $categoria_hija;

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
    public function getCategoriaHija()
    {
        return $this->categoria_hija;
    }

    /**
     * @param mixed $categoria_hija
     */
    public function setCategoriaHija($categoria_hija)
    {
        $this->categoria_hija = $categoria_hija;
    }



    public function save(){
        $sql = "INSERT INTO categorias Values(NULL, '{$this->getNombre()}', '{$this->getCategoriaHija()}') ";

        $statement = Connection::getConnection()->prepare($sql);

        $statement->execute();
        $this->setId(Connection::getConnection()->lastInsertId());

        return "Se ha guardado la categorias";
    }

    public function findCategoriesAndSubcategoriesByName($name, $isCategory = true){
        $sql = 'select id from categorias where nombre = :name';

        if($isCategory){
            $sql.=" and categoria_hija = 0";
        } else{
            $sql.=" and categoria_hija != 0";
        }

        $statement = Connection::getConnection()->prepare($sql);
        $statement->bindParam(":name", $name);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        $statement->execute();
        return $statement->fetch();
    }
}
