<?php

include "cadastroController.class.php";
include "desenhoController.class.php";
include "favoritosController.class.php";
include "historicoController.class.php";

$cadastroController = new cadastroController();
$desenhoController = new desenhoController();
$favoritosController = new favoritosController();
$historicoController = new historicoController();

$action = filter_input(INPUT_POST, 'action');

if($action == 'loginUser') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $cadastroController->login($item);
}

if ($action == 'insertUser') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $cadastroController->actionInsert($item);
}

if ($action == 'insertDesenho') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $desenhoController->actionInsert($item);
}

if ($action == 'deleteDesenho') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $desenhoController->actionDelete($item);
}

if ($action == 'updateDesenho') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $desenhoController->actionUpdate($item);
}

if ($action == 'searchDesenho') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $desenhoController->actionGetCartoonsList($item);
}

if ($action == 'insertCategoria') {
    $item = filter_input(INPUT_POST, "item", FILTER_SANITIZE_STRING, FILTER_FORCE_ARRAY);
    $ret = $desenhoController->actionInsertCategoria($item);
}

if ($action == 'updateCategoria') {
    $item = filter_input(INPUT_POST, "item", FILTER_SANITIZE_STRING, FILTER_FORCE_ARRAY);
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING, FILTER_FORCE_ARRAY);
    
    $ret = $desenhoController->actionInsertCategoria($item, $id);
}

if ($action == 'insertPlataforma') {
    $item = filter_input(INPUT_POST, "item", FILTER_SANITIZE_STRING, FILTER_FORCE_ARRAY);
    $ret = $desenhoController->actionInsertPlataforma($item);
}

if ($action == 'updatePlataforma') {
    $item = filter_input(INPUT_POST, "item", FILTER_SANITIZE_STRING, FILTER_FORCE_ARRAY);
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING, FILTER_FORCE_ARRAY);
    
    $ret = $desenhoController->actionInsertPlataforma($item, $id);
}

if ($action == 'mostrarTudo') {
    $ret = $desenhoController->actionMostrarTudo();
}

if ($action == 'desenho') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $desenhoController->actionDesenho($item);
}

if ($action == 'insertFavorito') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $favoritosController->insertFavorito($item);
}

if ($action == 'getPlataformasAndCategorias') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $desenhoController->actionDesenho($item);
}

if ($action == 'deletePlataformaANdDesenho') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $desenhoController->actionDeletePlataformaANdDesenho($item);
}

if ($action == 'displayFavoritos') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $favoritosController->displayFavoritos($item);
}

if ($action == 'deleteFavoritos') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $favoritosController->deleteFavoritos($item);
}

if ($action == 'insertHistorico') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $historicoController->insertHistorico($item);
}

if ($action == 'displayHistorico') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $historicoController->displayHistorico($item);
}

if ($action == 'deleteItemHistorico') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $historicoController->deleteItemHistorico($item);
}

if ($action == 'deleteAllHistorico') {
    $ret = $historicoController->deleteAllHistorico();
}

if ($action == 'pesquisarHistorico') {
    $item = filter_input(INPUT_POST, 'item');
    $ret = $historicoController->pesquisarHistorico($item);
}

?>