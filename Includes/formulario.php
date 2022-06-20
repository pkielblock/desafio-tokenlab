<main>
    <section class="container">
        <a href="principal.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>
    <div class="container">
        <h2 class="mt-3"><?=TITLE?></h2>
        <form method="post">
            <div class="form-group">
                <label>Titulo: </label>
                <input type="text" class="form-control" name="titulo" value="<?=$newEvento->title?>">
            </div>
            <div class="form-group">
                <label>Descrição: </label>
                <textarea name="descricao" class="form-control" cols="30" rows="5"><?=$newEvento->description?></textarea>
            </div>
            <div class="form-group">
                <label>Começo do Evento: </label>
                <input class="mt-2" type="datetime-local"  value="<?=$newEvento->startsAt?>" name="comecaEm" min="2022-06-19T23:59" max="2022-12-31T23:59">
                <label>Término do Evento: </label>
                <input class="mt-2" type="datetime-local" value="<?=$newEvento->endsAt?>" name="terminaEm" min="2022-06-19T23:59" max="2022-12-31T23:59">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mt-3">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</main>
