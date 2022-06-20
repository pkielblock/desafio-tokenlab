<?php

require __DIR__ . '/vendor/autoload.php';


use \App\Entity\Evento;

//valida id
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: principal.php?status=error');
    exit;
}

//consultar evento
$newEvento = Evento::getEvento($_GET['id']);

//validando o evento
if(!$newEvento instanceof Evento) {
    header('Location: principal.php?status=error');
    exit;
}

//valida post
if(isset($_POST['excluir'])) {
    $newEvento->deletarEvento();

    header('location: principal.php?status=success');
    exit;
}


include __DIR__ . '/Includes/header.php';
include __DIR__ . '/Includes/confirmarExclusao.php';
include __DIR__ . '/Includes/footer.php';