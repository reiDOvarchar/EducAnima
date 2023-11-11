<?php

class historicoVO {
    private $id;
    private $id_usuario;
    private $id_desenho;
    private $data_hora_acesso;
    
    // GET
    public function getId() {
        return $this->id;
    }
    public function getId_Usuario() {
        return $this->id_usuario;
    }
    public function getId_Desenho() {
        return $this->id_desenho;
    }
    public function getData_Hora_Acesso() {
        return $this->data_hora_acesso;
    }


    // SET
    public function setId($id) {
        $this->id = $id;
    }
    public function setId_Usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    public function setId_Desenho($id_desenho) {
        $this->id_desenho = $id_desenho;
    }
    public function setData_Hora_Acesso($data_hora_acesso) {
        $this->data_hora_acesso = $data_hora_acesso;
    }

}