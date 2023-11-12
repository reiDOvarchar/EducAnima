<?php

class notaVO {
    private $id_desenho;
    private $nota;
    private $id_usuario;

    // GET
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getIdDesenho() {
        return $this->id_desenho;
    }

    public function getNota() {
        return $this->nota;
    }

    // SET
    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setIdDesenho($id_desenho) {
        $this->id_desenho = $id_desenho;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }
}

?>