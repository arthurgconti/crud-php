<?php
// pegando as configs
require_once "config.php";

// Definindo as variáveis e iniciando elas vazias
$name = $department = $salary = "";
$name_err = $department_err = $salary_err = "";

//Processando os dados que ficar no formulário
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Pegando o id da url
    $id =  trim($_GET["id"]);

    //Preparando o statement e a query de select
    $sql = "SELECT * FROM FUNCIONARIOS WHERE id = ?";
    if ($stmt = mysqli_prepare($databaseConn, $sql)) {
        //Vinculando variáveis e parametros
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Setando os parametros
        $param_id = $id;

        // Tentando executar a seleção dos dados
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                 /*Basicamente o resultset que vem do banco é transformado em um array com os valores
                o MYSQLI_ASSOC, faz com que os index possam ser acessado pelo nome da coluna, 
                fazemos isso pois como só retornamos um valor, não precisamos usar o while*/
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Pegando os valores dos campos
                $name = $row["nome"];
                $department = $row["departamento"];
                $salary = $row["salario"];
            } else {
                // Se o valor do id da url não for válido vamos para pagina de erro
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Fecha o statement
    mysqli_stmt_close($stmt);

    // Fecha a conexão
    mysqli_close($databaseConn);
} else {
    // Se o valor do id da url não for válido vamos para pagina de erro
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Atualizar Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="./styles/update.css" rel="stylesheet" />
    <link href="./styles/globalStyles.css" rel="stylesheet" />

</head>

<body>
    <div id="main-container">
        <div class="container">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mt-5">Atualizar Registro</h2>
                            <p>Edite os valores dos campos para alterar no banco</p>
                            <form action="update_funcionario.php" method="post">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Departamento</label>
                                    <input type="text" name="department" class="form-control" value="<?php echo $department; ?>">
                                    <span class="invalid-feedback"><?php echo $department_err; ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Salário</label>
                                    <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                                    <span class="invalid-feedback"><?php echo $salary_err; ?></span>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                <input type="submit" class="btn btn-primary" value="Atualizar">
                                <a href="index.php" class="btn btn-secondary ml-2">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>