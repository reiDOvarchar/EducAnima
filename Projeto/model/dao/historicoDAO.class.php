<?php

include_once "../model/dao/historicoDAO.class.php";

class HistoricoDAO {
    public function __construct() {
    }

    public function getHistorico($conn) {
        $historicoData = array();
        $sql = "SELECT id, id_usuario, id_desenho, data_hora_acesso FROM historico";
        $result = $conn->query($sql);

        if ($result === false) {
            throw new Exception("Erro na conexão");
        }

        while ($row = $result->fetch_assoc()) {
            $historico = new HistoricoVO();
            $historico->setId($row["id"]);
            $historico->setIdUsuario($row["id_usuario"]);
            $historico->setIdDesenho($row["id_desenho"]);
            $historico->setDataHoraAcesso($row["data_hora_acesso"]);
            $historicoData[] = $historico;
        }
        return $historicoData;
    }

    public function insertHistorico($conn, $historicoData) {
        $id_usuario = $historicoData['id_usuario'];
        $id_desenho = $historicoData['id_desenho'];
        $data_hora_acesso = $historicoData['data_hora_acesso'];

        $sql = "INSERT INTO historico (id_usuario, id_desenho, data_hora_acesso) VALUES ({$id_usuario}, {$id_desenho}, {$data_hora_acesso})";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Erro na consulta");
        }

        $stmt->bind_param("iis", $id_usuario, $id_desenho, $data_hora_acesso);

        if (!$stmt->execute()) {
            throw new Exception("Erro ao inserir histrico");
        }

        $stmt->close();
    }

    public function updateHistorico($conn, $historicoData) {
        $id = $historicoData['id'];
        $id_usuario = $historicoData['id_usuario'];
        $id_desenho = $historicoData['id_desenho'];
        $data_hora_acesso = $historicoData['data_hora_acesso'];

        $sql = "UPDATE historico SET id_usuario = {$id_usuario}, id_desenho = {$id_desenho}, data_hora_acesso = {$data_hora_acesso} WHERE id = {$id}";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Erro na consulta");
        }

        $stmt->bind_param("iisi", $id_usuario, $id_desenho, $data_hora_acesso, $id);

        if (!$stmt->execute()) {
            throw new Exception("Erro ao atualizar histórico");
        }

        $stmt->close();
    }

    public function deleteHistorico($conn, $historicoId) {
        $sql = "DELETE FROM historico WHERE id = {$id}";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Erro na consulta");
        }

        $stmt->bind_param("i", $historicoId);

        if (!$stmt->execute()) {
            throw new Exception("Erro ao excluir registro");
        }

        $stmt->close();
    }
}
?>