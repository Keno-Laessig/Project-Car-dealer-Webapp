<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  

    </head>

<body>
    <section>
        <div>

  <div class="imgcontainer">
  </div>
 <form action="login.php" method = "post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="text"  name="psw" required>
       
    <input type="submit" value="Login"></input>
     </form>
  </div>

  <div class="container" style="background-color:#f1f1f1">
  
    <button type="button" class="cancelbtn">Cancel</button>
   
  </div>


<?php
$user = $_POST["unme"];
$passwort = $_POST["psw"];

        $servername = "localhost";
        $username = "admin";
        $password = "Gruppe8";
        $dbname = "autohaus";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if($conn->connect_error){
		die("alarm!!!!1" . $conn->connect_error);
		}
		
    $sql= "SELECT * FROM login WHERE benutzer = '$user' AND passwort ='$passwort";
		$result = $conn->query($sql);

 

if($conn->query($result) === TRUE) {
    echo "Neuer Kunde wurde angelegt";
   // header('location: auftrag.php');
}else{
    echo "error: " . $result. "<br>" . $conn->error;

}

?>
</body>
</html>
