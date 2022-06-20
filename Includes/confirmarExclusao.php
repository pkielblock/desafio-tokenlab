<main>
    <div class="container">
        <h2 class="mt-3">Excluir Vaga</h2>
        <form method="post">
            <div class="form-group">
                <p>Vocẽ realmente deseja excluir a vaga <strong><?=$newEvento->title?></strong></p>
            <div class="form-group">
                <a href="index.php">
                    <button type="button" class="btn btn-primary">Cancelar</button>
                </a>
                <button type="submit" name="excluir" class="btn btn-danger">
                    Excluir
                </button>
            </div>
        </form>
    </div>
</main>
