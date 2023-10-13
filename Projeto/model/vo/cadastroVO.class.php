<?php

class usuarioVO{
    private $id;
    private $nome;
    private $email;
    private $data_nasc;
    private $senha;
    private $adm;
    private $eh_professor;
    private $ensino;
    private $formacao;

    // GET
    public function getId() {
        return $id;
    }
    public function getNome() {
        return $nome;
    }
    public function getEmail() {
        return $email;
    }
    public function getDataNasc() {
        return $data_nasc;
    }
    public function getSenha() {
        return $senha;
    }
    public function getAdm() {
        return $adm;
    }
    public function getEhProfessor() {
        return $eh_professor;
    }
    public function getEnsino() {
        return $ensino;
    }
    public function getFormacao() {
        return $formacao;
    }

    //SET
    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setDataNasc($data_nasc) {
        $this->data_nasc = $data_nasc;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function setAdm($adm) {
        $this->adm = $adm;
    }
    public function setEhProfeessor($eh_professor) {
        $this->eh_professor = $eh_professor;
    }
    public function setEnsino($ensino) {
        $this->ensino = $ensino;
    }
    public function setFormacao($formacao) {
        $this->formacao = $formacao;
    }
}

?>