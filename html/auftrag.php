<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <form action="/Autohaus/about.php">
		<input type = "submit" value="Zur Kundenseite"/>
    </form>
    <form action="../liste.php">
		<input type = "submit" value="Alle Aufträge"/>
    </form>
    </head>

<body>
    <section>
        <div>
            <form action="auftrag.php" method="post">
            <p><h1>Auftragsdaten:</h1></p>
            <p>
        <label for="kname">Kundenname: </label>
        <input type="text"name="kname"><br>
        <label for="knum">Kundennummer: </label>
        <input type="number"name="knum"><br><br><br>
        <label for="adresse">Adresse: </label>
        <textarea type="text"name="adresse"></textarea><br><br><br>
        <label for="geburtstag">Geburtstag: </label>
        <input type="date"name="geburtstag"><br><br><br>
        <label for="TelNum">Telefon: </label>
        <input type="text"name="TelNum"><br><br><br>
        <label for="mail">e-mail: </label>
        <input type="text"name="mail"><br><br><br>

        <label for="fid">Fahzeugid: </label>
        <input type="number"name="fid"><br><br><br>
        <label for="plate">Kennzeichen: </label>
        <input type="text"name="plate"><br><br><br>
        <label for="fgnum">Fahrgestellnummer: </label>
        <input type="text"name="fgnum"><br><br><br>
        <label for="model">Modellbezeichnung: </label>
        <input type="text"name="model"><br><br><br>
        <label for="marke">Hersteller: </label>
        <input type="text"name="marke"><br><br><br>
        <label for="kilom">Kilometerstand: </label>
        <input type="number"name="kilom"><br><br><br>

        <label for="auftragsid">AuftragsID: </label>
        <input type="number"name="auftragsid"><br><br><br>
        <label for="annahmedatum">Annahmedatum: </label>
        <input type="date"name="annahmedatum"><br><br><br>
        <label for="descr">Auftragsbeschreibung: </label>
        <textarea type="text"name="descr"></textarea><br><br><br>
        <label for="category">Auftragskategorie: </label>
        <select name="category">
            <option value="maintain">Wartung</option>
            <option value="repair">Reparatur</option>
            <option value="test">TÜV</option>
        </select>
	    <br>
        <br>
        <br>
        <br>
        <input type="submit" value="Auftrag anlegen">
                </p>
            </form>
        </div>
    </section>

<?php
$servername = "localhost";
$username = "admin";
$password = "Gruppe8";
$dbname = "autohaus";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("alarm!!!!1" . $conn->connect_error);
}

$kundenname = $_POST["kname"];
$kundennummer = $_POST["knum"];
$adresse = $_POST["adresse"];
$geburtsdatum = $_POST["geburtstag"];
$telnum = $_POST["TelNum"];
$mailadresse = $_POST["mail"];
$fahrzeugid = $_POST["fid"];
$kennzeichen = $_POST["plate"];
$fahrgestell = $_POST["fgnum"];
$marke = $_POST["marke"];
$modell = $_POST["model"];
$kilometerstand = $_POST["kilom"];
$auftragsid = $_POST["auftragsid"];
$annahmedatum = $_POST["annahmedatum"];
$auftragsbeschreibung = $_POST["descr"];
$kategorie = $_POST["category"];

$insert_kunde = "INSERT INTO kundetabelle (kundennummer, kundenname, geburtsdatum, telnum, mailadresse, adresse) 
VALUES ('$kundennummer','$kundenname','$geburtsdatum','$telnum','$mailadresse','$adresse')";

$insert_fahrzeug = "INSERT INTO fahrzeugtabelle (fahrzeugid, kilometerstand, fahrgestell, kennzeichen, marke, modell) 
VALUES ('$fahrzeugid','$kilometerstand','$fahrgestell','$kennzeichen','$marke','$modell')";

$insert_auftrag = "INSERT INTO auftragtabelle (auftragsid, kundennummer, fahrzeugid, annahmedatum, kategorie, auftragsbeschreibung) 
VALUES ('$auftragsid','$kundennummer','$fahrzeugid','$annahmedatum','$kategorie','$auftragsbeschreibung')";


if($conn->query($insert_kunde) === TRUE) {
    echo "Neuer Kunde wurde angelegt";
}else{
    echo "error: " . $insert_kunde . "<br>" . $conn->error;
}
if($conn->query($insert_fahrzeug) === TRUE) {
    echo "Neues Fahrzeug wurde angelegt";
}else{
    echo "error: " . $insert_fahrzeug . "<br>" . $conn->error;
}
if($conn->query($insert_auftrag) === TRUE) {
    echo "Neuer Auftrag wurde angelegt";
}else{
    echo "error: " . $insert_auftrag . "<br>" . $conn->error;
}

$conn->close();
?>
    
</body>
</html>
