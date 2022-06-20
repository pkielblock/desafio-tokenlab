<?php

require __DIR__ . '/vendor/autoload.php';
const TITLE = 'Cadastrar Evento';


use \App\Entity\Evento;
$newEvento = new Evento;

if(isset($_POST['titulo'], $_POST['descricao'], $_POST['comecaEm'], $_POST['terminaEm'])) {

    $newEvento->titulo = $_POST['titulo'];
    $newEvento->descricao = $_POST['descricao'];
    $newEvento->comecaEm = $_POST['comecaEm'];
    $newEvento->terminaEm = $_POST['terminaEm'];
    $newEvento->cadastrarEvento();

    header('location: principal.php?status=success');
    exit;
}


include __DIR__ . '/Includes/header.php';
include __DIR__ . '/Includes/formulario.php';
include __DIR__ . '/Includes/footer.php';