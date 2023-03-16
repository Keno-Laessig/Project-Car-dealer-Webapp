<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	
	<title>Autohaus Alset GbR - Kontakt</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="default.php">Autohaus Alset GbR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="produkte.php">Produkte</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="dienstleistungen.php">Dienstleistungen</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="about.php">Über uns</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="login.php">Login</a>
        </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="kontakt.php">Kontakt</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="impressum.php">Impressum</a>
        </li>
  </ul>
    </div>
  </div>
</nav>

<br>
<br>
<br>
<div class="container">
    <h2>Nehmen Sie Kontakt zu uns auf </h2>
            <form role="form" class="well" method="post">
            <div class="form-group">
                <label>Name / Vorname*</label>
                <input class="form-control" type="text" name="name" value="">
            </div>
            <div class="form-group">
                <label>Email*</label>
                <input class="form-control" type="text" name="email" value="">
            </div>
          
            <div class="form-group">
                <label>Betreff</label>
                <input class="form-control" type="text" name="betreff" value="">
            </div>
            <div class="form-group">
                <label>Ihre Mitteilung*</label>
                <textarea class="form-control" rows="5" name="text"></textarea>
            </div>
            <br>
            <div class="form-group">
           <a href="danke.php">
            <button type="button" name="abschicken" class="btn btn-dark">Nachricht abschicken  
            </button>
            </a>  
              
        </form>
</div>
<?php

$empfaenger="";
$betreff="";
$text="";
$from="";
$mail="";

if(isset($_POST['name'])) {
    $name = filter_var($_POST['name']);
}

if(isset($_POST['betreff'])) {
    $betreff = filter_var($_POST['betreff']);
}

if(isset($_POST['text'])) {
    $text = filter_var($_POST['text']);
}

if(isset($_POST['mail'])) {
    $mail = filter_var($_POST['mail']);
}

if(isset($_POST['submit'])){
    $empfaenger = "kontakt@SchoenesGlas.optik";

$from = $mail;
 
mail($empfaenger, $betreff, $text, $from);

}



?>


	<!-- Optional JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>