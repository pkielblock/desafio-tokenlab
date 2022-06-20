<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Evento;
$eventos = Evento::listarEventos();

include __DIR__ . '/Includes/header.php';
include __DIR__ . '/Includes/list.php';
include __DIR__ . '/Includes/footer.php';