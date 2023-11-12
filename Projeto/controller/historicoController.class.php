<?php

include_once "../model/vo/historicoVO.class.php";
include_once "../model/dao/historicoDAO.class.php";

$servername = "localhost";
$username = "root";
$password = "senai";
$database = "educanima";

class historicoController {
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

    public function insertHistorico($id) {
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados");
            }
        
        $historicoDAO = new HistoricoDAO();
        session_start();
        $id_usuario = $_SESSION["id"];
        $historicoDAO->insertHistorico($conn, $id, $id_usuario);
        // } else if(!empty($list)) {
        //     $historicoDAO->deleteItemHistorico($conn, $id, $id_usuario);
        // } else {
        //     $historicoDAO->deleteAllHistorico($conn, $id, $id_usuario);
        // }

        $conn=null;

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

    public function pesquisarHistorico($item){
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados");
            }

            session_start();
            $historicoDAO = new HistoricoDAO();
            $list = $historicoDAO->pesquisarHistorico($conn, $item, $_SESSION["id"]);

            $conn = null;

            http_response_code(200);
            echo json_encode($list);
            exit;
        } catch(Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function deleteItemHistorico($id) {
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados");
            }
            session_start();
            $historicoDAO = new HistoricoDAO();
            $historicoDAO->deleteItemHistorico($conn, $id, $_SESSION["id"]);
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteAllHistorico() {
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados");
            }
            session_start();
            $historicoDAO = new HistoricoDAO();
            $historicoDAO->deleteAllHistorico($conn, $_SESSION["id"]);
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function displayHistorico() {
        try {
            session_start();
            $historicoDAO = new HistoricoDAO();
            $list = $historicoDAO->displayHistorico($this->conn,$_SESSION["id"]);

            $this->conn->close();

            http_response_code(200);
            echo json_encode($list);
            exit;
        } catch (Exception $e) {
            http_response_code(500);
            echo $e->getMessage();
            exit;
        }
    }
}
?>