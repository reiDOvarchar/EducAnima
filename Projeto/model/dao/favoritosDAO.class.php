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

    public function adicionarFavorito($conn, $idUsuario, $idDesenho) {
        $sql = "INSERT INTO favoritos (nome, imagem) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt === false) {
            throw new Exception("Erro na preparação");
        }
        
        $stmt->bind_param("ss", $idUsuario, $idDesenho);
        
        if ($stmt->execute() === false) {
            throw new Exception("Erro na inserção");
        }
    }

    public function removerFavorito($conn, $idFav) {
        $sql = "DELETE FROM favoritos WHERE id = ?";
        $smt = $conn ->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Erro na preparação");
        }
        
        $stmt->bind_param("i", $idUsuario, $idFav);
        
        if ($stmt->execute() === false) {
            throw new Exception("Erro na inserção");
        }

    }

    public function removerFavorito($conn, $idFav) {
        $sql = "UPDATE favoritos SET nome = ?, imagem = ?, WHERE id = ?";
        $smt = $conn ->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Erro na preparação");
        }
        
        $stmt->bind_param("ssi", $novoNome, $novaImagm, $idFav);
        
        if ($stmt->execute() === false) {
            throw new Exception("Erro na inserção");
        }
    }
    
}

?>