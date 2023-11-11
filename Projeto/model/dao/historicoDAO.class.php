<?php

include_once "../model/vo/historicoVO.class.php";
// include_once "../model/vo/historicoDAO.class.php";

class HistoricoDAO {
    public function __construct() {
    }

   

    public function insertHistorico($conn, $id_desenho, $id_usuario) {
        date_default_timezone_set('America/Sao_Paulo');
        $currentDate = date("Y-m-d H:i:s");

        $sql = "INSERT INTO historico (id_desenho, id_usuario, data_hora_acesso) VALUES (".$id_desenho.",". $id_usuario.", '". $currentDate ."')";
        $result = $conn->query($sql);
        
        if ($result !== TRUE) {
            throw new Exception("Erro na inserção");
        }
    }
    
    public function deleteAllHistorico($conn, $id_usuario) {
        $sql = "DELETE FROM historico WHERE id_usuario = $id_usuario";
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro na inserção");
        }
    }

    public function deleteItemHistorico($conn, $id_historico) {
        $sql = "DELETE FROM historico WHERE id = ".$id_historico.";";
        $result = $conn->query($sql);
        if ($result !== TRUE) {
            throw new Exception("Erro na inserção");
        }
    }

    public function pesquisarHistorico($conn, $nome, $id_usuario) {
        
        $sql = "SELECT desenho.nome, desenho.id, desenho.imagem, historico.data_hora_acesso, historico.id as historicoId FROM historico, desenho WHERE historico.id_usuario = ".$id_usuario." AND historico.id_desenho = desenho.id AND desenho.nome LIKE '%" . $nome . "%' ORDER BY historico.id DESC";
        $result = $conn->query($sql);
        
        if ($result === false) {
            throw new Exception("Erro na conexão");
        }
        $list = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }
        
        return $list;
    }

    public function displayHistorico($conn, $id_usuario) {
        $displayHistorico = [];
        $sql = "SELECT desenho.nome, desenho.id, desenho.imagem, historico.data_hora_acesso, historico.id as historicoId FROM historico, desenho WHERE historico.id_usuario = ".$id_usuario." AND historico.id_desenho = desenho.id ORDER BY historico.id DESC";
        $result = $conn->query($sql);
        
        if ($result === false) {
            throw new Exception("Erro na conexão");
        }

        
        $list = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }
        // var_dump($displayFavoritos);
        return $list;

    }

}
?>