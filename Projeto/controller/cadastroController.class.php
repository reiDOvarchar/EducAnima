<?php
include_once "../model/vo/cadastroVO.class.php";
include_once "../model/dao/cadastroDAO.class.php";

$servername = "localhost";
$username = "root";
$password = "senai";
$database = "educanima";

class cadastroController {
    public function __construct() {
        
    }

    public function actionInsert($item) {
        try {
            $arr = array();
            parse_str($item, $arr);

            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

            $obj = $this->getcadastroBean($arr);
            $this->verificarCadastro($obj);
            $dao = new cadastroDAO();
            $dao->insert($conn, $obj);

            $conn->close();
            http_response_code(200);
            echo "Cadastro criado com sucesso";
            exit;
        } catch(Exception $e) {
            http_response_code(500);
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

    public function login(){
        try {
            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }
            if (empty($_POST['senha'])) {
                throw new Exception("Senha obrigatória!");
            }
            if (empty($_POST['email'])) {
                throw new Exception("E-mail obrigatório!");
            }

            $senha = $_POST['senha'];
            $email = $_POST['email'];

            $cadastroDAO = new cadastroDAO();
            $cadastroDAO->login($email, $senha, $conn);

            $conn = null;
            echo "Sucesso";
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    private function getCadastroBean($item) {
        $cadastroObj = new cadastroVO();

        $cadastroObj->setNome($item["form-nome"]);
        $cadastroObj->setEmail($item["form-email"]);
        $cadastroObj->setDataNasc($item["form-date-nasc"]);
        $cadastroObj->setSenha($item["form-senha"]);
        // $cadastroDAO->setAdm($_POST["adm"]);
        $cadastroObj->setEhProfeessor($item["form-professor"]);
        if (!empty($item["form-professor"])) {
            $cadastroObj->setFormacao($item["form-formacao"]);
            $cadastroObj->setEnsino($item["form-ensino"]);
        }
        $cadastroObj->setSub($item["senha-google"]);

        return $cadastroObj;
    }

    private function verificarCadastro($obj){
        if (empty($obj->getNome())){
            throw new Exception("Nome obrigatório!");
        }
        if (empty($obj->getEmail())){
            throw new Exception("E-mail obrigatório!");
        }
        if (empty($obj->getSenha())){
            if (empty($obj->getSub())){
                throw new Exception("Senha obrigatória!");
            }
        }
        if (empty($obj->getDataNasc())){
            throw new Exception("Data de nascimento obrigatório!");
        }
        if (empty($obj->getEhProfessor())) {
            $obj->setEhProfeessor(0);
        }
        if (!empty($obj->getEhProfessor())) {
            if(empty($obj->getEnsino())){
                throw new Exception("Ensino obrigatório!");
            }
            if(empty($obj->getFormacao())){
                throw new Exception("Formação obrigatória!");
            }
        }
    }
}