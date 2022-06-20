<?php

require __DIR__ . '/vendor/autoload.php';

const TITLE = 'Editar Evento';

use \App\Entity\Evento;

//valida id
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
    exit;
}

//consultar evento
$newEvento = Evento::getEvento($_GET['id']);

//validando o evento
if(!$newEvento instanceof Evento) {
    header('Location: index.php?status=error');
    exit;
}

//valida post
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['comecaEm'], $_POST['terminaEm'])) {
    $newEvento->titulo = $_POST['titulo'];
    $newEvento->descricao = $_POST['descricao'];
    $newEvento->comecaEm = $_POST['comecaEm'];
    $newEvento->terminaEm = $_POST['terminaEm'];
    $newEvento->atualizarEvento();

    header('location: index.php?status=success');
    exit;
}


include __DIR__ . '/Includes/header.php';
include __DIR__ . '/Includes/formulario.php';
include __DIR__ . '/Includes/footer.php';