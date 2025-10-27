<?php
$host = 'localhost';
$db   = '123456_PROGRAM1';
$user = 'jouw_mysql_user';
$pass = 'jouw_mysql_wachtwoord';
$charset = 'utf8mb4';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset($charset);
} catch (mysqli_sql_exception $e) {
    echo "Databaseverbinding mislukt: " . $e->getMessage();
    exit;
}
?>