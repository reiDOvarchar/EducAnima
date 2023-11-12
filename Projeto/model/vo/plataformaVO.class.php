<?php

class plataformaVO {
    private $id_desenho;
    private $id_plataforma;

    // GET
    public function getId_desenho() {
        return $this->id_desenho;
    }

    public function getId_plataforma() {
        return $this->id_plataforma;
    }

    // SET
    public function setId_desenho($id_desenho) {
        $this->id_desenho = $id_desenho;
    }

    public function setId_plataforma($id_plataforma) {
        $this->id_plataforma = $id_plataforma;
    }
}