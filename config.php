<?php

/**
 * Configurações da sua conexão com o banco
 * @param DB_HOST url para a base de dados
 * @param DB_USER usuário de acesso ao banco
 * @param DB_password senha do usuario de acesso ao banco
 * @param DB_database banco padrão para acesso da conexão
 * @param DB_PORT porta de acesso para o banco
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_password', '');
define('DB_database', 'db_empresa');
define('DB_PORT', 3306);

$databaseConn = mysqli_connect(DB_HOST, DB_USER, DB_password, DB_database, DB_PORT);

if (!$databaseConn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
