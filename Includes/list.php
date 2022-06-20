<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="container alert alert-success">Ação executada com <strong>sucesso</strong></div';
            break;
        case 'error':
            $mensagem = '<div class="container alert alert-danger"><strong>Erro</strong> ao executar ação</div>';
            break;
    }
}

$resultados = '';
    foreach ($eventos as $evento)   {
        $resultados .= '<tr>
                            <td>' . $evento->id . '</td>
                            <td>' . $evento->title . '</td>
                            <td>' . $evento->description . '</td>
                            <td>' . $evento->startsAt . '</td>
                            <td>' . $evento->endsAt . '</td>
                            <td>
                                <a href="editar.php?id=' . $evento->id . '"><button type="button" class="btn btn-primary">Editar</button></a>
                                <a href="excluir.php?id=' . $evento->id . '"><button type="button"  class="btn btn-danger">Excluir</button></a>
                            </td>
                         </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr><td colspan="6" class="text-center">Nenhum registro de evento encontrado</td></tr>';

?>

<main>
    <?=$mensagem?>
    <section class="container">
        <a href="cadastrar.php">
            <button class="btn btn-success">Novo Evento</button>
        </a>
        <a href="index.php">
            <button class="btn btn-danger">Sair</button>
        </a>
    </section>
    <section class="container mt-3">
        <table class="table text-light">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Começa em</th>
                    <th>Termina em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>
</main>