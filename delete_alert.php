<?php
if (empty(trim($_GET["id"]))) {
    //Verifica se a url tem o id, se n tem redireciona para pagina de erro
    header("location: error.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Apagar Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="./styles/delete.css" rel="stylesheet" />
    <link href="./styles/globalStyles.css" rel="stylesheet" />

</head>

<body>
    <div id="main-container">
        <div class="container">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mt-5 mb-3">Apagar Registro</h2>
                            <form action="delete.php" method="post">
                                <div class="alert alert-danger">
                                    <input type="hidden" name="id" value="<?php
                                    //pega o id da url para enviar para a pagina que ira deletar o registro
                                     echo trim($_GET["id"]);
                                      ?>" />
                                    <p>Tem certeza que deseja apagar esse funcionario?</p>
                                    <p>
                                        <input type="submit" value="Sim" class="btn btn-danger">
                                        <a href="index.php" class="btn btn-secondary">Não</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>