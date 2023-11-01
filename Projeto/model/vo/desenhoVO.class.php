<?php

class desenhoVO {
    private $id;
    private $nome;
    private $qtd_temp;
    private $qtd_episodios;
    private $video_trailer;
    private $criador_desenho;
    private $nota;
    private $classificacao_indicativa;
    private $sinopse;
    private $ano_lancamento;
    private $imagem;
    private $tempo_medio;

    // GET
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getQtd_temp() {
        return $this->qtd_temp;
    }
    public function getQtd_episodios() {
        return $this->qtd_episodios;
    }
    public function getVideo_trailer() {
        return $this->video_trailer;
    }
    public function getCriador_desenho() {
        return $this->criador_desenho;
    }
    public function getClassificacao_indicativa() {
        return $this->classificacao_indicativa;
    }
    public function getSinopse() {
        return $this->sinopse;
    }
    public function getAno_lancamento() {
        return $this->ano_lancamento;
    }
    public function getImagem() {
        return $this->imagem;
    }
    public function getTempo_medio() {
        return $this->tempo_medio;
    }
    

    // SET
    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setQtd_temp($qtd_temp) {
        $this->qtd_temp = $qtd_temp;
    }
    public function setQtd_episodios($qtd_episodios) {
        $this->qtd_episodios = $qtd_episodios;
    }
    public function setVideo_trailer($video_trailer) {
        $this->video_trailer = $video_trailer;
    }
    public function setCriador_desenho($criador_desenho) {
        $this->criador_desenho = $criador_desenho;
    }
    public function setClassificacao_indicativa($classificacao_indicativa) {
        $this->classificacao_indicativa = $classificacao_indicativa;
    }
    public function setSinopse($sinopse) {
        $this->sinopse = $sinopse;
    }
    public function setAno_lancamento($ano_lancamento) {
        $this->ano_lancamento = $ano_lancamento;
    }
    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
    public function setTempo_medio($tempo_medio) {
        $this->tempo_medio = $tempo_medio;
    }
}