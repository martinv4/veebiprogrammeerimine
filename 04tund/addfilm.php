<?php
  require("../../../configvp2019.php");
  
  $userName="Martin Vare";
  $database = "if19_klaus_va_1";
  
  require("functions_film.php");
  //var_dump($_POST);
  //kui on nuppu vajutatud
  if(isset($_POST["submitFilm"])){
    //if(!empty($_POST["filmTitle"])){
	savefilminfo($_POST["filmTitle"], $_POST["filmYear"], $_POST["filmDuration"], $_POST["filmGenre"], $_POST["filmCompany"], $_POST["filmDirector"]);
  }
  
  require("header.php");
?>

<!DOCTYPE html>
<html lang="et">

<body>
  <?php echo "<h1>" . $userName . " koolitöö leht</h1>"; ?>
  
  <p>See leht on loodud koolitöö raames ja ei sisalda tõsiseltvõetavat sisu</p>

  <h2>Eesti filmid, lisame uue</h2>
  <p>Täida kõik failid ja lisa film andmebaasi</p>
  <form method="POST">
  <label>Sisesta pealkiri: </label><input Type="text" name="filmTitle">
  <br>
  <label>Filmi tootmisaasta: </label><input type="number" min="1912" max="2019" value="2019" name="filmYear">
  <br>
  <label>Filmi kestus (min): </label><input type="number" min="1" max="300" value="80" name="filmDuration">
  <br>
  <label>Filmi žanr: </label><input Type="text" name="filmGenre">
  <br>
  <label>Filmi tootja: </label><input Type="text" value="<?php echo $filmCompanyInserted; ?>" name="filmCompany">
  <br>
  <label>Filmi lavastaja: </label><input Type="text" name="filmDirector">
  <br>
  <input Type="submit" value="Salvesta filmi info" name="submitFilm">
  </form>
<?php
  //echo "Server: " .$serverHost.". kasutaja: " .$serverUsername;
?>
  
</body>
</html>