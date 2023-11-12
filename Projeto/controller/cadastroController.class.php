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
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
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

    // public function actionUpdate() {
    //     try {
    //         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //         $obj = $this->getCadastroBean();

    //         $cadastroDAO = new cadastroDAO();
    //         $cadastroDAO->update($conn, $id);

    //         $conn = null;

    //         echo "Sucesso";
    //         exit;
    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //         exit;
    //     }
    // }

    public function taLogado($email,$conn){
        $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if($conn->connect_error){
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

            
            
            $conn->close();

            exit;
    }

    public function login($item){
        try {
            $arr = array();
            parse_str($item, $arr);

            $email = $arr["email"];
            $senha = $arr["senha"];

            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);

            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }
            if (empty($senha)) {
                throw new Exception("Senha obrigatória!");
            }
            if (empty($email)) {
                throw new Exception("E-mail obrigatório!");
            }

            
            $cadastroDAO = new cadastroDAO();
            $usuario = $cadastroDAO->login($email, $senha, $conn);
            
            if (empty($usuario)) {
                throw new Exception("E-mail ou senha incorretos!");
            } else {
                if (password_verify($senha, $usuario["senha"])) {
                    echo "Logado";
                } else {
                    throw new Exception("E-mail ou senha incorretos!");
                }
            }
            

            $list = [];
            $cadastroDAO = new cadastroDAO();
            $list = $cadastroDAO->taLogado($email,$conn);
            $conn = null;

            session_start();
            $_SESSION["id"] = $list[0]["id"];
            $_SESSION["nome"] = $list[0]["nome"];
            $_SESSION["email"] = $list[0]["email"];
            $_SESSION["adm"] = $list[0]["adm"];
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            http_response_code(500);
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