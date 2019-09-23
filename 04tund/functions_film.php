<?php
  require("../../../configvp2019.php");
  $userName="Martin Vare";
  $database = "if19_klaus_va_1";
  
  function readAllFilms() {
  //loeme andmebaasist ja loome ühenduse
  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
  //valmistame päringu
  $stmt = $conn->prepare("SELECT pealkiri, aasta FROM film");
  //seome saadava tulemuse muutujaga
  $stmt->bind_result($filmTitle, $filmYear);
  //käivitame sql päringu
  $stmt->execute();
  $filmInfoHTML = "";
  while($stmt->fetch()) {
    $filmInfoHTML .= "<h3>" .$filmTitle ."</h3>";
	$filmInfoHTML .= "<p>tootmisaasta: " .$filmYear ."</p>";
	//echo $filmTitle;
  }
  
  //sulgeme ühenduse
  $stmt->close();
  $conn->close();
  //väljastan väärtuse
  return $filmInfoHTML;
  }
  
  function savefilminfo($filmTitle, $filmYear, $filmDuration, $filmGenre, $filmCompany, $filmDirector){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO film(pealkiri, aasta, kestus, zanr, tootja, lavastaja) VALUES(?,?,?,?,?,?)");
	echo $conn->error;
	//s - string i - integer d - decimal
	$stmt->bind_param("siisss", $filmTitle, $filmYear, $filmDuration, $filmGenre, $filmCompany, $filmDirector);
	$stmt->execute();
	$stmt->close();
    $conn->close();
  }
?>
