<?php

class FavoritosVO {
    private $id;
    private $id_usuario;
    private $id_desenho;
    private $nome;
    private $imagem;

    // GET
    public function getId() {
        return $this->id;
    }

    public function getIdUser() {
        return $this->id_usuario;
    }

    
    public function getNome() {
        return $this->nome;
    }

    public function getImagem() {
        return $this->imagem;
    }

    // SET
    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
}
?>
