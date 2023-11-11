<?php
include_once "../model/vo/favoritosVO.class.php";
include_once "../model/dao/favoritosDAO.class.php";

$servername = "localhost";
$username = "root";
$password = "senai";
$database = "educanima";

class FavoritosController {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($this->conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insertFavorito($id) {
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados");
            }

            $dao = new favoritosDAO();
            session_start();
            if(!empty($_SERVER["id"])){
                $idUser = $_SESSION["id"];
                $list = $dao->searchFavorito($conn, $id, $idUser);
                
                if (empty($list)) {
                    $dao->insertFavorito($conn, $id, $idUser);
                } else {
                    $dao->deleteFavorito($conn, $id, $idUser);
                }

                $conn=null;
                http_response_code(200);
            } else {
                throw new Exception("Você não está logado!");
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo $e->getMessage();
            exit;
        }
    }

    public function deleteFavoritos($id) {
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados");
            }
            session_start();
            $favoritosDAO = new FavoritosDAO();
            $favoritosDAO->deleteFavorito($conn, $id,  $_SESSION["id"]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function displayFavoritos() {
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados");
            }
            session_start();
            if(!empty($_SESSION["id"])){
                $favoritosDAO = new FavoritosDAO();
                $list = $favoritosDAO->displayFavoritos($conn,$_SESSION["id"]);
                $this->conn->close();
                http_response_code(200);
                echo json_encode($list);
                exit;
            }
            
        } catch (Exception $e) {
            http_response_code(500);
            echo $e->getMessage();
            exit;
        }
    }
}  
?>
