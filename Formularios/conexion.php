<?php
try {
    $host = "database-2.c9uyk88m8l8i.us-east-2.rds.amazonaws.com";
    $dbname = "postgres";
    $user = "postgres";
    $password = "JadSoftware123456789.";
    $port = "5432";

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $myPDO = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo "❌ Error al conectar: " . $e->getMessage();
    exit();
}
?>