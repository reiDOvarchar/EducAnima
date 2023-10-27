<?php
include_once "../model/vo/desenhoVO.class.php";
include_once "../model/dao/desenhoDAO.class.php";

$servername = "localhost";
$username = "root";
$password = "senai";
$database = "educanima";

class desenhoController {
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
            
            $obj = $this->getDesenhoBean($arr);
            $this->validateDesenhoBean($obj);
            $dao = new desenhoDAO();
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

    public function actionInsertCategoria($item) {
        try {
            echo "<pre>";print_r($item);exit;

            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

             /**N sei se vai funcionar */
             $last_id = $conn->insert_id;

            http_response_code(200);
            echo "Sucesso!";
            exit;
        } catch (Exception $e) {
            http_response_code(500);
            echo $e->getMessage();
            exit;
        }
    }

    public function actionInsertPlataforma($item) {
        try {
            echo "<pre>";print_r($item);exit;

            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

             /**N sei se vai funcionar */
             $last_id = $conn->insert_id;

            http_response_code(200);
            echo "Sucesso!";
            exit;
        } catch (Exception $e) {
            http_response_code(500);
            echo $e->getMessage();
            exit;
        }
    }

    public function actionDelete($id) {
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

            $id = $_POST["id"];
            $desenhoDAO = new desenhoDAO();
            $desenhoDAO->delete($conn, $id);

            $conn->close();

            echo "Sucesso";
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function actionUpdate($item) {
        try {
            $arr = array();
            parse_str($item, $arr);

            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);

            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

            $obj = $this->getDesenhoBean($arr);
            $this->validateDesenhoBean($obj);
            $desenhoDAO = new desenhoDAO();
            $desenhoDAO->update($conn, $id);

            $conn->close();

            echo "Sucesso";
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function actionGetCartoonsList($search) {
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

            if (empty($search)) {
                throw new Exception("Campo vazio!");
            }

            $desenhoDAO = new desenhoDAO();
            $list = $desenhoDAO->searchCartoon($conn, $search);

            $conn->close();

            http_response_code(200);
            echo json_encode($list);
            exit;
        } catch (Exception $e) {
            http_response_code(500);
            echo $e->getMessage();
            exit;
        }
    }

    public function actionGetArrayList() {
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

            $obj = $this->getFilterDesenhoBean();

            $desenhoDAO = new desenhoDAO();
            $list = $desenhoDAO->filter($conn, $obj);

            $conn->close();

            echo json_encode($list);
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    private function getDesenhoBean($item) {
        $desenhoObj = new desenhoVO();
        
        $desenhoObj->setNome($item["nomeDesenho"]);
        $desenhoObj->setQtd_temp($item["quantidadeTemporadas"]);
        $desenhoObj->setQtd_episodios($item["quatidadeEp"]);
        $desenhoObj->setVideo_trailer($item["videoURL"]);
        $desenhoObj->setCriador_desenho($item["nomeCriador"]);
        $desenhoObj->setClassificacao_indicativa($item["classificacao"]);
        $desenhoObj->setSinopse($item["sinopse"]);
        $desenhoObj->setAno_lancamento($item["lancamento"]);
        $desenhoObj->setImagem($item["imagemURL"]);
        $desenhoObj->setTempo_medio($item["duracaoMedia"]);
        
        return $desenhoObj;
    }

    private function validateDesenhoBean($obj) {
        if (empty($obj->getNome())){
            throw new Exception("Nome obrigatório!");
        }
        if (empty($obj->getClassificacao_indicativa())){
            throw new Exception("Classificação indicativa obrigatória!");
        }
        if (empty($obj->getSinopse())){
            throw new Exception("Sinopse obrigatória!");
        }
        if (empty($obj->getAno_lancamento())){
            throw new Exception("Ano de lançamento obrigatório!");
        }
        if (empty($obj->getImagem())) {
            throw new Exception("URL da imagem é obrigatório!");
        }

        if (empty($obj->getQtd_temp())) {
            $obj->setQtd_temp(0);
        }
        if (empty($obj->getQtd_episodios())) {
            $obj->setQtd_episodios(0);
        }
        if (empty($obj->getVideo_trailer())) {
            $obj->setVideo_trailer(0);
        }
        if (empty($obj->getCriador_desenho())) {
            $obj->setCriador_desenho(0);
        }
        if (empty($obj->getTempo_medio())) {
            $obj->setTempo_medio(0);
        }
    }

    private function getFilterDesenhoBean() {
        $desenhoObj = new desenhoVO();

        if (!empty($_POST["filter-id"])) {
            $desenhoObj->setId($_POST["filter-id"]);
        }
        if (!empty($_POST["filter-nome"])) {
            $desenhoObj->setNome($_POST["filter-nome"]);
        }
        if (!empty($_POST["filter-qtd_temp"])) {
            $desenhoObj->setQtd_temp($_POST["filter-qtd_temp"]);
        }
        if (!empty($_POST["filter-qtd_episodios"])) {
            $desenhoObj->setQtd_episodios($_POST["filter-qtd_episodios"]);
        }
        if (!empty($_POST["filter-video_trailer"])) {
            $desenhoObj->setVideo_trailer($_POST["filter-video_trailer"]);
        }
        if (!empty($_POST["filter-criador_desenho"])) {
            $desenhoObj->setCriador_desenho($_POST["filter-criador_desenho"]);
        }
        if (!empty($_POST["filter-nota"])) {
            $desenhoObj->setNota($_POST["filter-nota"]);
        }
        if (!empty($_POST["filter-classificacao_indicativa"])) {
            $desenhoObj->setClassificacao_indicativa($_POST["filter-classificacao_indicativa"]);
        }
        if (!empty($_POST["filter-sinopse"])) {
            $desenhoObj->sinopse($_POST["filter-sinopse"]);
        }
        if (!empty($_POST["filter-ano_lancamento"])) {
            $desenhoObj->setAno_lancamento($_POST["filter-ano_lancamento"]);
        }
        if (!empty($_POST["filter-imagem"])) {
            $desenhoObj->setImagem($_POST["filter-imagem"]);
        }
        if (!empty($_POST["filter-tempo_medio"])) {
            $desenhoObj->setTempo_medio($_POST["filter-tempo_medio"]);
        }

        return $desenhoObj;
    }
}