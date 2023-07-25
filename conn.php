<?php 

require_once 'discord.php';
require_once 'localfunctions.php';

mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);

$database1 = readFromJson('config.json');
$database = $database1['database'];
try {
    $conn = mysqli_connect($database['host'], $database['username'], $database['password'], $database['databaseName'], $database['port']);
} catch (mysqli_sql_exception $e) {
    // Handle the connection error
    echo "Failed to connect: " . $e->getMessage();
    exit;
} 



?>