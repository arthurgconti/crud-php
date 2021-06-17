<!DOCTYPE html>
<html lang="en">

<head>
    <!--Uma porrada de coisa que peguei da net mas basicamente bootstrap -->
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/consulta.css">
    <link href="./styles/globalStyles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="main-container">
        <div class="container">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-5 mb-3 clearfix">
                                <h2>Detalhe dos funcionario</h2>
                            </div>
                            <?php
                            // Puxando as configurações
                            require_once "config.php";

                            // criando a query para o bd e tentando pegar os resultados
                            //se tiver resultado ele preenche um array
                            $sql = "SELECT * FROM funcionarios";
                            if ($result = mysqli_query($databaseConn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Nome</th>";
                                    echo "<th>Departamento</th>";
                                    echo "<th>Salário</th>";
                                    echo "<th>Ação</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    //e pra cada elemento do array ele gera uma linha na tabela
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nome'] . "</td>";
                                        echo "<td>" . $row['departamento'] . "</td>";
                                        echo "<td>" . $row['salario'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="view.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="delete_alert.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                    // Aqui ele libera o array
                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            } else {
                                echo "Oops! Something went wrong. Please try again later.";
                            }

                            // E por fim fecha a conexão com o bd
                            mysqli_close($databaseConn);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>