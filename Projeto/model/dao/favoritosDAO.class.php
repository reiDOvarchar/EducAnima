<?php
include_once "../model/vo/favoritosVO.class.php";

class FavoritosDAO {
    public function __construct() {
    }

    public function getFavoritos($conn, $list) {
        $favoritosData = array();
        

        foreach($list as $item){
            $sql = "SELECT id, nome, imagem FROM desenho WHERE id = ".$item["id_desenho"];
            $result = $conn->query($sql);
            if ($result === false) {
                throw new Exception("Erro na conexão");
            }
            while ($row = $result->fetch_assoc()) {
                $favoritosData[] = $row;
            }
        }
        // var_dump($favoritosData);
        return $favoritosData;
    }

    public function insertFavorito($conn, $idFav, $idUser) {
        $sql = "INSERT INTO favoritos (id_desenho, id_usuario) VALUES ($idFav, $idUser)";
        $result = $conn->query($sql);
        
        if ($result !== TRUE) {
            throw new Exception("Erro na inserção");
        }
    }

    public function deleteFavorito($conn, $idFav, $idUser) {
        $sql = "DELETE from favoritos as f WHERE f.id_desenho = ".$idFav." AND f.id_usuario =".$idUser;

        $result = $conn->query($sql);
        if ($result === false) {
            throw new Exception("Erro na conexão");
        }
        
    }

    public function searchFavorito($conn, $idFav, $idUser) {
        $sql = "SELECT * from favoritos as f WHERE f.id_desenho = ".$idFav." AND f.id_usuario =".$idUser;

        $result = $conn->query($sql);
        
        $arr = [];
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

        public function displayFavoritos($conn, $idUser) {
            
            $displayFavoritos = array();
            $sql = "SELECT id_desenho FROM Favoritos WHERE id_usuario = ".$idUser;
            $result = $conn->query($sql);
    
            if ($result === false) {
                throw new Exception("Erro na conexão");
            }
            
            $list = [];
            while ($row = $result->fetch_assoc()) {
                $list[] = $row;
            }
        
        $favoritos = new FavoritosDAO();
        $displayFavoritos = $favoritos->getFavoritos($conn, $list);
        // var_dump($displayFavoritos);
        return $displayFavoritos;
    }
}
?>
