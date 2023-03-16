<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>

<body>
	<div>		<?php
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
		$sql = "SELECT auftragtabelle.annahmedatum, auftragtabelle.auftragsid, kundetabelle.kundenname, fahrzeugtabelle.kennzeichen 
        FROM auftragtabelle
        JOIN fahrzeugtabelle ON auftragtabelle.fahrzeugid = fahrzeugtabelle.fahrzeugid
        JOIN kundetabelle ON auftragtabelle.kundennummer = kundetabelle.kundennummer";

		$result = $conn->query($sql);
		?>
		<ul>
		<?php
			if($result->num_rows>0){
				while($row = $result->fetch_assoc()){
					echo "Annahmedatum: ".$row["annahmedatum"]." | Kundenname: ".$row["kundenname"]." | Kennzeichen: ".$row["kennzeichen"]."<span style='float:right'; margin-left='2px'><a href='details.php?id=". $row["auftragsid"] . "'><img src='' alt='Mehr Details' width='20' height='20'></a></span><br>";
					//echo <form action = "details.php?id="'.$row["auftragsid"].'  <label for = "auftragsid" >Details</label>;
					
					
					
					/*?>
					<form method="post" action="details.php"><input type="number" name"auftragsid" value="'.$row["auftragsid"].'"><input type="submit" value="mehr Details"></form>
					<?php*/
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
