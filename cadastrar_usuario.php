<?php
//pegando arquivo de config
require_once "config.php";

//Definindo variáveis e iniciando elas vazias
$name = $department = $salary = "";
$name_err = $department_err = $salary_err = "";

//Processando o que veio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // pegando dados do nome
    $input_name = trim($_POST["name"]);
    if (empty($input_name))
        $name_err = "Please enter a name.";
    else
        $name = $input_name;


    // pegando dados do departamento
    $input_department = trim($_POST["department"]);
    if (empty($input_department))
        $department_err = "Please enter an department.";
    else
        $department = $input_department;


    // pegando dados do salario
    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary))
        $salary_err = "Please enter the salary amount.";
    else
        $salary = $input_salary;


    // checando se não ouve erro
    if (empty($name_err) && empty($department_err) && empty($salary_err)) {
        //montando a query para o banco
        $sql = "INSERT INTO FUNCIONARIOS (nome, departamento, salario) VALUES (?, ?, ?)";
        
        // preparando um statement de inserção
        if ($stmt = mysqli_prepare($databaseConn, $sql)) {
            // vinculando variáveis aos tipos dos parametros do statement
            mysqli_stmt_bind_param($stmt,"ssd", $param_name, $param_department, $param_salary);

            // Setando os parametros
            $param_name = $name;
            $param_department = $department;
            $param_salary = $salary;

            // rodando o stmt, ou seja, a inserção no bacno
            if (mysqli_stmt_execute($stmt)) {
                // Se deu tudo certo redireciona para o index.php
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // fechando o statements
        mysqli_stmt_close($stmt);
    }

    // fechando a conexão
    mysqli_close($databaseConn);
}
