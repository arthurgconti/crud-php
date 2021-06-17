<?php

/**
 * Configurações da sua conexão com o banco
 * @param DB_HOST url para a base de dados
 * @param DB_USER usuário de acesso ao banco
 * @param DB_PASSWORD senha do usuario de acesso ao banco
 * @param DB_DATABASE banco padrão para acesso da conexão
 * @param DB_PORT porta de acesso para o banco
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'db_empresa');
define('DB_PORT', 3306);

$databaseConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

if (!$databaseConn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
