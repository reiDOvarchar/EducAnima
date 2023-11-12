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
        $sql = "INSERT INTO desenho_categoria(id_desenho, id_categoria) VALUES ({$obj->getId_desenho()}, {$obj->getId_categoria()})";
        
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao inserir!");
        }
    }

    public function insertPlataforma($conn, $obj) {
        $sql = "INSERT INTO desenho_streams(id_desenho, id_plataforma) VALUES ({$obj->getId_desenho()}, {$obj->getId_plataforma()})";

        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao inserir!");
        }
    }

    public function getLastDesenhoId($conn) {
        $sql = "SELECT * FROM desenho order by id desc limit 1";

        $result = $conn->query($sql);

        $arr = [];
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    public function delete($conn, $id) {
        $sql = 'DELETE FROM desenho_categoria WHERE id_desenho = ' . $id;
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao deletar categoria!");
        }

        $sql = 'DELETE FROM desenho_streams WHERE id_desenho = ' . $id;
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao deletar plataforma!");
        }

        $sql = 'DELETE FROM historico WHERE id_desenho = ' . $id;
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao deletar plataforma!");
        }

        $sql = 'DELETE FROM favoritos WHERE id_desenho = ' . $id;
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao deletar plataforma!");
        }

        $sql = 'DELETE FROM desenho WHERE id = ' . $id;
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao deletar desenho!");
        }
    }

    public function deletePlataformaANdDesenho($conn, $id) {
        $sql = 'DELETE FROM desenho_categoria WHERE id_desenho = ' . $id;
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao deletar categoria!");
        }

        $sql = 'DELETE FROM desenho_streams WHERE id_desenho = ' . $id;
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro ao deletar plataforma!");
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
        $sql = "SELECT id FROM categoria WHERE nome LIKE '%" . $search . "%'";
        $result = $conn->query($sql);

        $arr2 = [];
        while($row = $result->fetch_assoc()) {
            $arr2[] = $row;
        }
        
        $arr3 = [];
        foreach ($arr2 as $item) {
            $arr3[] = $item["id"];
        }

        $stringCategoria = implode(",", $arr3);
        
        if ($stringCategoria) {
            $sql = "SELECT distinct d.* FROM desenho as d INNER JOIN desenho_categoria as dc ON dc.id_desenho = d.id INNER JOIN categoria as c ON c.id = dc.id_categoria WHERE d.nome LIKE '%" . $search . "%' OR dc.id_categoria IN (" . $stringCategoria . ")";
        } else {
            $sql = "SELECT * FROM desenho as d WHERE d.nome LIKE '%" . $search . "%'";
        }
        
        $result = $conn->query($sql);

        $arr = [];
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        
        return $arr;
    }

    public function mostrarTudo($conn){
        $sql = "SELECT * FROM desenho";

        $result = $conn->query($sql);

        $arr = [];
        while($row = $result->fetch_assoc()){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getDesenho($conn, $id) {
        $sql = "SELECT * from desenho as d WHERE d.id = ".$id;

        $result = $conn->query($sql);

        $arr = [];
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    public function getCategorias($conn, $id) {
        $sql = "SELECT c.* from categoria as c INNER JOIN desenho_categoria as dc ON c.id = dc.id_categoria INNER JOIN desenho as d ON d.id = dc.id_desenho WHERE d.id = ".$id;

        $result = $conn->query($sql);

        $arr = [];
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    public function getPlataformas($conn, $id) {
        $sql = "SELECT p.* from plataformas_stream as p INNER JOIN desenho_streams as ds ON p.id = ds.id_plataforma INNER JOIN desenho as d ON d.id = ds.id_desenho WHERE d.id = ".$id;

        $result = $conn->query($sql);

        $arr = [];
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }
}
?>