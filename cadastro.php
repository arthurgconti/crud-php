<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de funcionario</title>
    <link href="./styles/cadastro.css" rel="stylesheet" />
    <link href="./styles/globalStyles.css" rel="stylesheet" />
</head>

<body>

    <div id="main-container">
        <div class="container">
            <form action="cadastrar_usuario.php" method="post">
                <h1>insira os dados</h1>
                <hr />
                <div class="container-field">
                    <fieldset>
                        <label for="name">Nome:</label>
                        <input type="text" name="name" id="name" />
                    </fieldset>
                    <fieldset>
                        <label for="department">Departamento:</label>
                        <input type="text" name="department" id="department" />
                    </fieldset>
                    <fieldset>
                        <label for="salary">Salário:</label>
                        <input type="text" name="salary" id="salary" />
                    </fieldset>
                </div>

                <button type="submit">Cadastrar</button>

            </form>

        </div>
    </div>

</body>

</html>