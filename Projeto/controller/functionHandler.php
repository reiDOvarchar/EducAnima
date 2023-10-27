<?php

include "cadastroController.class.php";
include "desenhoController.class.php";

$cadastroController = new cadastroController();
$desenhoController = new desenhoController();

$action = filter_input(INPUT_POST, 'action');

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

if ($action == 'insertPlataforma') {
    $item = filter_input(INPUT_POST, "item", FILTER_SANITIZE_STRING, FILTER_FORCE_ARRAY);
    $ret = $desenhoController->actionInsertPlataforma($item);
}

?>