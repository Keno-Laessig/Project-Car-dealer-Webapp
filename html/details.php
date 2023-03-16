<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>

<body>
	<div>		
		<?php
		    session_start();
		?>
		<?php

        $servername = "localhost";
        $username = "admin";
        $password = "Gruppe8";
        $dbname = "autohaus";
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if($conn->connect_error){
		die("alarm!!!!1" . $conn->connect_error);
		}
		$auftragsid = $_GET['id'];
		
		$sql = "SELECT * 
        FROM auftragtabelle
        JOIN fahrzeugtabelle ON auftragtabelle.fahrzeugid = fahrzeugtabelle.fahrzeugid
        JOIN kundetabelle ON auftragtabelle.kundennummer = kundetabelle.kundennummer
        WHERE auftragsid =$auftragsid";

		$result = $conn->query($sql);
		?>
		<ul>
		<?php
			if($result->num_rows>0){
				while($row = $result->fetch_assoc()){
					echo "Annahmedatum: ".$row["annahmedatum"]." | Kundenname: ".$row["kundenname"]." | Kennzeichen: ".$row["kennzeichen"]."<br>";
					echo "kundennummer: ".$row["kundennummer"]." | geburtsdatum: ".$row["geburtsdatum"]." | TelNum: ".$row["TelNum"]."<br>";
					echo "mailadresse: ".$row["mailadresse:"]."  | adresse: ".$row["adresse"]." | kilometerstand: ".$row["kilometerstand"]."<br>";
					echo "fahrgestell: ".$row["fahrgestell"]." | modell: ".$row["modell"]." | marke: ".$row["marke"]."";
					echo "auftragsbeschreibung: ".$row["auftragsbeschreibung"]."" ;
					
				}
			}
			else{
				echo "keine AUfträge vorhanden";
			}
		$conn->close();
		?>
		</ul>
    </div>
</body>
</html>
