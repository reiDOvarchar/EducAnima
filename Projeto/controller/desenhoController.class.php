<?php
$servername = "localhost";
$username = "seu_usuario";
$password = "senai";
$database = "seu_banco_de_dados";

include "desenhoVO.class.php";
include "desenhoDAO.class.php";

class desenhoController {
    public function __construct() {

    }

    public function actionInsert() {
        try {
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados.");
            }

            $obj = $this->getDesenhoBean();
            $dao = new desennhoDAO();
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

    public function actionUpdate() {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $obj = $this->getDesenhoBean();

            $desenhoDAO = new desenhoDAO();
            $desenhoDAO->update($conn, $id);

            $conn = null;

            echo "Sucesso";
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function actionGetArrayList() {
        try {
            $conn = new mysqli($servername, $username, $password, $dbname);
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

    private function getDesenhoBean() {
        $desenhoObj = new desenhoVO();

        $desenhoDAO->setId($_POST["id"]);
        $desenhoDAO->setNome($_POST["nome"]);
        $desenhoDAO->setQtd_temp($_POST["qtd_temp"]);
        $desenhoDAO->setQtd_episodios($_POST["qtd_episodios"]);
        $desenhoDAO->setVideo_trailer($_POST["video_trailer"]);
        $desenhoDAO->setCriador_desenho($_POST["criador_desenho"]);
        $desenhoDAO->setNota($_POST["nota"]);
        $desenhoDAO->setClassificacao_indicativa($_POST["classificacao_indicativa"]);
        $desenhoDAO->sinopse($_POST["sinopse"]);
        $desenhoDAO->setAno_lancamento($_POST["ano_lancamento"]);
        $desenhoDAO->setImagem($_POST["imagem"]);
        $desenhoDAO->setTempo_medio($_POST["tempo_medio"]);

        return $desenhoObj;
    }

    private function getFilterDesenhoBean() {
        $desenhoObj = new desenhoVO();

        if (!empty($_POST["filter-id"])) {
            $desenhoDAO->setId($_POST["filter-id"]);
        }
        if (!empty($_POST["filter-nome"])) {
            $desenhoDAO->setNome($_POST["filter-nome"]);
        }
        if (!empty($_POST["filter-qtd_temp"])) {
            $desenhoDAO->setQtd_temp($_POST["filter-qtd_temp"]);
        }
        if (!empty($_POST["filter-qtd_episodios"])) {
            $desenhoDAO->setQtd_episodios($_POST["filter-qtd_episodios"]);
        }
        if (!empty($_POST["filter-video_trailer"])) {
            $desenhoDAO->setVideo_trailer($_POST["filter-video_trailer"]);
        }
        if (!empty($_POST["filter-criador_desenho"])) {
            $desenhoDAO->setCriador_desenho($_POST["filter-criador_desenho"]);
        }
        if (!empty($_POST["filter-nota"])) {
            $desenhoDAO->setNota($_POST["filter-nota"]);
        }
        if (!empty($_POST["filter-classificacao_indicativa"])) {
            $desenhoDAO->setClassificacao_indicativa($_POST["filter-classificacao_indicativa"]);
        }
        if (!empty($_POST["filter-sinopse"])) {
            $desenhoDAO->sinopse($_POST["filter-sinopse"]);
        }
        if (!empty($_POST["filter-ano_lancamento"])) {
            $desenhoDAO->setAno_lancamento($_POST["filter-ano_lancamento"]);
        }
        if (!empty($_POST["filter-imagem"])) {
            $desenhoDAO->setImagem($_POST["filter-imagem"]);
        }
        if (!empty($_POST["filter-tempo_medio"])) {
            $desenhoDAO->setTempo_medio($_POST["filter-tempo_medio"]);
        }

        return $desenhoObj;
    }
}