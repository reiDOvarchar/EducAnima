<?php

class categoriaVO {
    private $id_desenho;
    private $id_categoria;

    // GET
    public function getId_desenho() {
        return $this->id_desenho;
    }

    public function getId_categoria() {
        return $this->id_categoria;
    }

    // SET
    public function setId_desenho($id_desenho) {
        $this->id_desenho = $id_desenho;
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }
}