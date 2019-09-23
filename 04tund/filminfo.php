<?php
  require("../../../configvp2019.php");
  $userName="Martin Vare";
  $database = "if19_klaus_va_1";
  
  function readAllFilms() {
  //loeme andmebaasist ja loome ühenduse
  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
  //valmistame päringu
  $stmt = $conn->prepare("SELECT pealkiri FROM film");
  //seome saadava tulemuse muutujaga
  $stmt->bind_result($filmTitle);
  //käivitame sql päringu
  $stmt->execute();
  $filmInfoHTML = null;
  while($stmt->fetch()) {
    $filmInfoHTML .= "<h3>" .$filmTitle ."</h3>";
	//echo $filmTitle;
  }
  
  //sulgeme ühenduse
  $stmt->close();
  $conn->close();
  //väljastan väärtuse
  return $filmInfoHTML;
  }
  
  $filmInfoHTML = readAllFilms();
  
  require("header.php");
?>

<!DOCTYPE html>
<html lang="et">

<body>
  <?php echo "<h1>" . $userName . " koolitöö leht</h1>"; ?>
  
  <p>See leht on loodud koolitöö raames ja ei sisalda tõsiseltvõetavat sisu</p>

  <h2>Eesti filmid</h2>
  <p>Praegu on andmebaasis järgmised filmid:</p>
<?php
  //echo "Server: " .$serverHost.". kasutaja: " .$serverUsername;
  echo $filmInfoHTML;
?>
  
</body>
</html>