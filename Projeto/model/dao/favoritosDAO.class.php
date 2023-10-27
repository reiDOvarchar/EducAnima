<?php

class favoritosDAO {
    public function __construct() {

    }

    public function getDoritos($conn) {
        $desenhoData = array();
        $sql = $sql = "SELECT id, nome, imagem FROM favoritos";
        $result = $conn->query($sql);

        if ($result === false) {
            throw new Exception("Erro na conexão");
        }

        while ($row = $result->fetch_assoc()) {
            $desenho = new desenhoVO();
            $desenho->setId($row["id"]);
            $desenho->setIdUsuario($row["nome"]);
            $desenho->setIdDesenho($row["imagem"]);
            $desenho[] = $desenho;
        }
        return $desenhoData;
    }

}

?>