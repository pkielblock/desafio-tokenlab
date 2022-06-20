<?php
require __DIR__ . '/vendor/autoload.php';
use App\Entity\Usuario;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body class="bg-dark text-light">
<div class="container">
    <h2 class="mt-3">Cadastrar Novo Usuário</h2>
    <form action="cadastroUsuarios.php" method="post">
        <div class="form-group">
            <label>Usuário: </label>
            <input type="text" class="form-control" name="usuario">
        </div>
        <div class="form-group">
            <label>Senha: </label>
            <input type="password" class="form-control" name="senha">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success mt-3">
                Cadastrar
            </button>
            <a href="index.php" class="btn btn-primary mt-3">Voltar</a>
        </div>
    </form>
</div>
<?php
$newUser = new Usuario();

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $newUser->usuario = $_POST['usuario'];
    $newUser->senha = $_POST['senha'];
    $newUser->cadastrarUsuario();

    header('Location: index.php');
    exit;
}
?>
</body>
</html>