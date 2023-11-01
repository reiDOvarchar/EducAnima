<?php

include_once "../model/vo/desenhoVO.class.php";

class desenhoDAO {
    public function __construct(){
        
    }

    public function insert($conn, $obj) {
        $sql = "INSERT INTO desenho(nome, qtd_temp, qtd_episodios, video_trailer, criador_desenho, classificacao_indicativa, sinopse, ano_lancamento, imagem, tempo_medio) VALUES ('{$obj->getNome()}', {$obj->getQtd_temp()}, {$obj->getQtd_episodios()}, '{$obj->getVideo_trailer()}', '{$obj->getCriador_desenho()}', '{$obj->getClassificacao_indicativa()}', '{$obj->getSinopse()}', {$obj->getAno_lancamento()}, '{$obj->getImagem()}', '{$obj->getTempo_medio()}')";
        
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao inserir!");
        }
    }

    public function insertCategoria($conn, $obj) {
        $sql = "INSERT INTO categoria() VALUES ()";
        
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao inserir!");
        }
    }

    public function insertPlataforma($conn, $obj) {
        $sql = "INSERT INTO plataforma() VALUES ()";

        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao inserir!");
        }
    }

    public function delete($conn, $id) {
        $sql = `DELETE FROM desenho WHERE id =` . $id;
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao deletar!");
        }
    }

    public function update($conn, $obj) {
        $sql = "UPDATE desenho 
                SET nome = '{$obj->getNome()}', 
                qtd_temp = {$obj->getQtd_temp()}, 
                qtd_episodios = {$obj->getQtd_episodios()}, 
                video_trailer = '{$obj->getVideo_trailer()}', 
                criador_desenho = '{$obj->getCriador_desenho()}', 
                classificacao_indicativa = '{$obj->getClassificacao_indicativa()}', 
                sinopse = '{$obj->getSinopse()}', 
                ano_lancamento = {$obj->getAno_lancamento()}, 
                imagem = '{$obj->getImagem()}', 
                tempo_medio = '{$obj->getTempo_medio()}' 
                WHERE id = {$obj->getId()}";

        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao inserir!");
        }
    }

    public function filter($conn, $obj) {
        $sql = "SELECT * FROM desenho";
        $first = true;

        if (!empty($obj->getId())) {
            if ($first) {
                $sql .= "WHERE id = {$obj->getId()}";
                $first = false;
            } else {
                $sql .= ", id = {$obj->getId()}";
            }
        }
        if (!empty($obj->getNome())) {
            if ($first) {
                $sql .= "WHERE nome = {$obj->getNome()}";
                $first = false;
            } else {
                $sql .= ", nome = {$obj->getNome()}";
            }
        }
        if (!empty($obj->getQtd_temp())) {
            if ($first) {
                $sql .= "WHERE qtd_temp = {$obj->getQtd_temp()}";
                $first = false;
            } else {
                $sql .= ", qtd_temp = {$obj->getQtd_temp()}";
            }
        }
        if (!empty($obj->getQtd_episodios())) {
            if ($first) {
                $sql .= "WHERE qtd_episodios = {$obj->getQtd_episodios()}";
                $first = false;
            } else {
                $sql .= ", qtd_episodios = {$obj->getQtd_episodios()}";
            }
        }
        if (!empty($obj->getVideo_trailer())) {
            if ($first) {
                $sql .= "WHERE video_trailer = {$obj->getVideo_trailer()}";
                $first = false;
            } else {
                $sql .= ", video_trailer = {$obj->getVideo_trailer()}";
            }
        }
        if (!empty($obj->getCriador_desenho())) {
            if ($first) {
                $sql .= "WHERE criador_desenho = {$obj->getCriador_desenho()}";
                $first = false;
            } else {
                $sql .= ", criador_desenho = {$obj->getCriador_desenho()}";
            }
        }
        if (!empty($obj->getClassificacao_indicativa())) {
            if ($first) {
                $sql .= "WHERE classificacao_indicativa = {$obj->getClassificacao_indicativa()}";
                $first = false;
            } else {
                $sql .= ", classificacao_indicativa = {$obj->getClassificacao_indicativa()}";
            }
        }
        if (!empty($obj->getSinopse())) {
            if ($first) {
                $sql .= "WHERE sinopse = {$obj->getSinopse()}";
                $first = false;
            } else {
                $sql .= ", sinopse = {$obj->getSinopse()}";
            }
        }
        if (!empty($obj->getAno_lancamento())) {
            if ($first) {
                $sql .= "WHERE ano_lancamento = {$obj->getAno_lancamento()}";
                $first = false;
            } else {
                $sql .= ", ano_lancamento = {$obj->getAno_lancamento()}";
            }
        }
        if (!empty($obj->getImagem())) {
            if ($first) {
                $sql .= "WHERE imagem = {$obj->getImagem()}";
                $first = false;
            } else {
                $sql .= ", imagem = {$obj->getImagem()}";
            }
        }
        if (!empty($obj->getTempo_medio())) {
            if ($first) {
                $sql .= "WHERE tempo_medio = {$obj->getTempo_medio()}";
                $first = false;
            } else {
                $sql .= ", tempo_medio = {$obj->getTempo_medio()}";
            }
        }

        $result = $conn->query($sql);

        $arr = [];
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    public function searchCartoon($conn, $search) {
        $sql = "SELECT * FROM desenho WHERE nome LIKE '%" . $search . "%'";

        $result = $conn->query($sql);

        $arr = [];
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }
}
?>