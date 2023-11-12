<?php

include_once "../model/vo/notaVO.class.php";

class notaDAO{

    public function insertNota($conn, $nota, $id_usuario, $id_desenho) {
        $dao = new notaDAO();
        $ha_nota = $dao->verificarNota($conn,$id_usuario, $id_desenho);
        if(empty($ha_nota)){
            $sql = "INSERT INTO nota(id_usuario, id_desenho, nota) VALUES (".(int)$id_usuario.", ".(int)$id_desenho.", ".(int)$nota.")";
            $result = $conn->query($sql);
            
            if ($result !== TRUE) {
                throw new Exception("Erro ao inserir!");
            }
        }else {
            $id_usuario = $ha_nota["id_usuario"];
            $id_desenho = $ha_nota["id_desenho"];
            $sql = "UPDATE nota SET nota = ".$nota." WHERE id_usuario = ".$id_usuario." AND id_desenho = ".$id_desenho.";";
            $result = $conn->query($sql);
            if ($result !== TRUE) {
                throw new Exception("Erro ao inserir!");
            }
        }
        
    }

    public function verificarNota($conn ,$id_usuario, $id_desenho) {
        $sql = "SELECT * FROM nota WHERE id_usuario = ".$id_usuario." AND id_desenho = ".$id_desenho.";";
        $result = $conn->query($sql);
        
        $resposta = $result->fetch_assoc();
        return $resposta;
    }

    public function mostrarNotaDesenho($conn, $id_desenho){
        
        $sql = "SELECT avg(nota) FROM nota WHERE id_desenho = ".$id_desenho.";";
        $result = $conn->query($sql);
        $resposta = $result->fetch_assoc();
        return $resposta;
    }

    public function getIdDesenho($conn, $id_usuario){
        
        $sql = "SELECT id_desenho FROM historico WHERE id_usuario = ".$id_usuario." ORDER BY id DESC LIMIT 1;";
        $result = $conn->query($sql);
        
        $resposta = $result->fetch_assoc();
        if($resposta != NULL){
            //var_dump($resposta["id_desenho"]);
        }
        
        return $resposta["id_desenho"];
    }

}

?>