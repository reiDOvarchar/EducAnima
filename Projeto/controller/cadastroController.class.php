<?php
$servername = "localhost";
$username = "seu_usuario";
$password = "senai";
$database = "seu_banco_de_dados";

include "cadastroVO.class.php";
include "cadastroDAO.class.php";

class cadastroController {
    public function __construct() {
        parent::__construct();
    }

    public function actionInsert() {
        try {
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

            $obj = $this->getcadastroBean();
            $dao = new cadastroDAO();
            $dao->insert($conn, $obj);

            $conn->close();

            echo "Cadastro criado com sucesso";
            exit;
        } catch(Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function actionDelete() {
        try {
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

            $id = $_GET["id"];
            $cadastroDAO = new cadastroDAO();
            $cadastroDAO->delete($conn, $id);

            $conn->close();

            echo "Sucesso";
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function actionUpdate() {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $obj = $this->getCadastroBean();

            $cadastroDAO = new cadastroDAO();
            $cadastroDAO->update($conn, $id);

            $conn = null;

            echo "Sucesso";
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    private function getCadastroBean() {
        $cadastroObj = new cadastroVO();

        $cadastroDAO->setNome($_POST["nome"]);
        $cadastroDAO->setEmail($_POST["email"]);
        $cadastroDAO->setDataNasc($_POST["data_nasc"]);
        $cadastroDAO->setSenha($_POST["senha"]);
        $cadastroDAO->setAdm($_POST["adm"]);
        $cadastroDAO->setEhProfeessor($_POST["eh_professor"]);
        $cadastroDAO->setEnsino($_POST["ensino"]);
        $cadastroDAO->setFormacao($_POST["formacao"]);

        return $cadastroObj;
    }

}