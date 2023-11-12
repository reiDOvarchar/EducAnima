<?php

include_once "../model/vo/notaVO.class.php";
include_once "../model/dao/notaDAO.class.php";

$servername = "localhost";
$username = "root";
$password = "senai";
$database = "educanima";    

class notaController {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($this->conn->connect_error) {
                throw new Exception("Não foi possível se co nectar com o banco de dados");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insertNota($nota){
        try{
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }
            session_start();
            if(empty($_SESSION["id"])){
                throw new Exception("Você não está logado.");
            }
            else{
                $id_usuario = $_SESSION["id"];
                $dao = new notaDAO();
                $id_desenho = $dao->getIdDesenho($conn, $id_usuario);
                $dao->insertNota($conn, $nota, $id_usuario, $id_desenho);
                $conn->close();

                http_response_code(200);
                echo "Cadastro criado com sucesso";
                exit;
            }
            
        }catch(Exception $e) {
            http_response_code(500);
            echo $e->getMessage();
            exit;
        }
    }

    public function mostrarNotaDesenho($id){
        try{
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }
            $dao = new notaDAO();
            $nota = $dao->mostrarNotaDesenho($conn, $id);
            $conn->close();
            echo json_encode($nota);
            http_response_code(200);
            exit;
        } catch(Exception $e) {
            http_response_code(500);
            echo $e->getMessage();
            exit;
        }
    }

    public function getIdDesenho(){
        try{
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }
            session_start();
            $id = $_SESSION["id"];
            $dao = new notaDAO();
            $id_desenho = $dao->getIdDesenho($conn, $id);
            $conn->close();
            echo json_encode($id_desenho);
            http_response_code(200);
            exit;
        } catch(Exception $e) {
            http_response_code(500);
            echo $e->getMessage();
            exit;
        }
    }
}

?>