<?php

$servername = "localhost";
$username = "root";
$password = "senai";
$database = "educanima";

class historicoController {

    private $conn;

    public function __construct() {
        try {
            $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
            if ($conn->connect_error) {
                throw new Exception("Não foi possível se conectar com o banco de dados");
            }
    }

    public function displayHistory() {

            $historicoDAO = new historicoDao();
            $historicoData = historicoDAO->getHistorico($conn);

            $conn->close();

            echo '<div class="container-lista">'

            foreach ($historicoDAO as $historico) {
                echo '<div class="historico-desenho">';
                echo '<img src="' . $historico->getImagem() . '" class="desenho">';
                echo '<img src="img/circulo.png" alt="" class="excluir">';
                echo '<div class="informacoes-historico">';
                echo '<p class="titulo-desenho">' . $historico->getTitulo() . '</p><br>';
                echo '<p class="dia-acesso">Último acesso em: ' . $historico->getDiaAcesso() . '</p><br>';
                echo '<p class="data_acesso">' . $historico->getDataAcesso() . '</p>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>