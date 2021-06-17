<?php

require_once "config.php";

$name = $department = $salary = "";
$name_err = $department_err = $salary_err = "";


if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } else {
        $name = $input_name;
    }

    // Validate address address
    $input_department = trim($_POST["department"]);
    if (empty($input_department)) {
        $department_err = "Please enter an department.";
    } else {
        $department = $input_department;
    }

    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary)) {
        $salary_err = "Please enter the salary amount.";
    } else {
        $salary = $input_salary;
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($department_err) && empty($salary_err)) {
        // Prepare an update statement
        $sql = "UPDATE FUNCIONARIOS SET nome=?, departamento=?, salario=? WHERE id=?";

        if ($stmt = mysqli_prepare($databaseConn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_department, $param_salary, $param_id);

            // Set parameters
            $param_name = $name;
            $param_department = $department;
            $param_salary = $salary;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "<h1>Oops! Something went wrong. Please try again later.</h1>";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($databaseConn);
}
