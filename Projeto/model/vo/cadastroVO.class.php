<?php

class cadastroVO {
    private $id;
    private $nome;
    private $email;
    private $data_nasc;
    private $senha;
    private $adm;
    private $eh_professor;
    private $ensino;
    private $formacao;
    private $sub;

    // GET
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getDataNasc() {
        return $this->data_nasc;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function getAdm() {
        return $this->adm;
    }
    public function getEhProfessor() {
        return $this->eh_professor;
    }
    public function getEnsino() {
        return $this->ensino;
    }
    public function getFormacao() {
        return $this->formacao;
    }
    public function getSub(){
        return $this->sub;
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
    public function setSub($sub){
        $this->sub = $sub;
    }
}

?>