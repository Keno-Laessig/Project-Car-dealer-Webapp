<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>

<body>

<?php
$servername = "localhost";
$username = "admin";
$password = "Gruppe8";
$dbname = "dfgdg";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("alarm!!!!1" . $conn->connect_error);
}

$auftragsid = $_POST["auftragsid"];
$annahmedatum = $_POST["annahmedatum"];
$auftragsbeschreibung = $_POST["descr"];
$kategorie = $_POST["category"];

$insert_auftrag = "INSERT INTO testdb (auftragsid, annahmedatum, kategorie, auftragsbeschreibung) VALUES ('$auftragsid','$annahmedatum','$kategorie','$auftragsbeschreibung')";

mysqli_begin_transaction($conn);

mysqli_query($conn, $insert_auftrag);
if (mysqli_affected_rows($conn) < 1){
    mysqli_rollback($conn);
    die("insert contract error");
}

mysqli_comit($conn);

mysqli_close($conn);
?>
    
</body>
</html>
