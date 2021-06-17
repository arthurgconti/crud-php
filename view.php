<?php
// Verifca se tem o id na url antes de processar
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Pegando as configs
    require_once "config.php";

    // Preparando a query e o select pro banco
    $sql = "SELECT * FROM FUNCIONARIOS WHERE id = ?";

    if ($stmt = mysqli_prepare($databaseConn, $sql)) {
        // Vinculando as variaveis ao parâmetro do statement
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Setando os parametros
        $param_id = trim($_GET["id"]);

        // Tentando executar o statement, ou, consulta
        if (mysqli_stmt_execute($stmt)) {
            //armazenando o resultado em um array
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /*Basicamente o resultset que vem do banco é transformado em um array com os valores
                o MYSQLI_ASSOC, faz com que os index possam ser acessado pelo nome da coluna, 
                fazemos isso pois como só retornamos um valor, não precisamos usar o while*/
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $name = $row["nome"];
                $address = $row["departamento"];
                $salary = $row["salario"];
            } else {
                // Se a url n tiver o id vai para a pag de erro
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($databaseConn);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ver Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="./styles/view.css" rel="stylesheet" />
    <link href="./styles/globalStyles.css" rel="stylesheet" />
</head>

<body>
    <div id="main-container">
        <div class="container">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="mt-5 mb-3">Ver Registro</h1>
                            <div class="form-group">
                                <label>Nome</label>
                                <p><b><?php echo $row["nome"]; ?></b></p>
                            </div>
                            <div class="form-group">
                                <label>Departamento</label>
                                <p><b><?php echo $row["departamento"]; ?></b></p>
                            </div>
                            <div class="form-group">
                                <label>Salário</label>
                                <p><b><?php echo $row["salario"]; ?></b></p>
                            </div>
                            <p><a href="index.php" class="btn btn-primary">Voltar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>