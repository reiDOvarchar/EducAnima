<?php

include "cadastroVO.class.php";

class cadastroDAO {
    public function __construct(){
        parent::__construct();
    }

    public function insert($conn, $obj) {
        $sql = "INSERT INTO usuario(nome, qtd_temp, qtd_episodios, video_trailer, criador_cadastro, classificacao_indicativa, sinopse, ano_lancamento, imagem, tempo_medio) VALUES ({$obj->getNome()}, {$obj->getQtd_temp()}, {$obj->getQtd_episodios()}, {$obj->getVideo_trailer()}, {$obj->getCriador_cadastro()}, {$obj->getClassificacao_indicativa()}, {$obj->getSinopse()}, {$obj->getAno_lancamento()}, {$obj->getImagem()}, {$obj->getTempo_medio()})";

        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao inserir!");
        }
    }

    public function delete($conn, $id) {
        $sql = `DELETE FROM cadastro WHERE` . $id;
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao deletar!");
        }
    }

    public function update($conn, $obj) {
        $sql = "UPDATE usuario 
                SET nome = {$obj->getNome()}, 
                email = {$obj->getEmail()}, 
                data_nasc = {$obj->getDataNasc()}, 
                senha = {$obj->getSenha()}, 
                adm = {$obj->getAdm()}, 
                eh_professor ={$obj->getEhProfeessor()}, 
                ensino = {$obj->getEnsino()}, 
                formacao = {$obj->getFormacao()}  
                WHERE id = {$obj->getId()}";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    public function filter($conn, $obj) {
        $sql = "SELECT * FROM cadastro";
        $first = true;

        if (!empty($obj->getNome())) {
            if ($first) {
                $$sql .= "WHERE nome = {$obj->getNome()}";
                $first = false;
            } else {
                $sql .= ", nome = {$obj->getNome()}";
            }
        }
        if (!empty($obj->getEmail())) {
            if ($first) {
                $$sql .= "WHERE qtd_temp = {$obj->getEmail()}";
                $first = false;
            } else {
                $sql .= ", qtd_temp = {$obj->getEmail()}";
            }
        }
        if (!empty($obj->getDataNasc())) {
            if ($first) {
                $$sql .= "WHERE qtd_episodios = {$obj->getDataNasc()}";
                $first = false;
            } else {
                $sql .= ", qtd_episodios = {$obj->getDataNasc()}";
            }
        }
        if (!empty($obj->getSenha())) {
            if ($first) {
                $$sql .= "WHERE video_trailer = {$obj->getSenha()}";
                $first = false;
            } else {
                $sql .= ", video_trailer = {$obj->getSenha()}";
            }
        }
        if (!empty($obj->getAdm())) {
            if ($first) {
                $$sql .= "WHERE criador_cadastro = {$obj->getAdm()}";
                $first = false;
            } else {
                $sql .= ", criador_cadastro = {$obj->getAdm()}";
            }
        }
        if (!empty($obj->getEhProfessor())) {
            if ($first) {
                $$sql .= "WHERE classificacao_indicativa = {$obj->getEhProfessor()}";
                $first = false;
            } else {
                $sql .= ", classificacao_indicativa = {$obj->getEhProfessor()}";
            }
        }
        if (!empty($obj->getEnsino())) {
            if ($first) {
                $$sql .= "WHERE sinopse = {$obj->getEnsino()}";
                $first = false;
            } else {
                $sql .= ", sinopse = {$obj->getEnsino()}";
            }
        }
        if (!empty($obj->getFormacao())) {
            if ($first) {
                $$sql .= "WHERE ano_lancamento = {$obj->getFormacao()}";
                $first = false;
            } else {
                $sql .= ", ano_lancamento = {$obj->getFormacao()}";
            }
        }+

        $result = $conn->query($sql);

        $arr = [];
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }
}
?>