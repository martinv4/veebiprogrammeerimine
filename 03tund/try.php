<?php
  $userName="Martin Vare";
  $fullTimeNow=date("d/m/Y H:i:s");
  $hourNow=date("H");
  $partOfDay="hägune aeg";
  if($hourNow < 8) {
	$partOfDay="varane hommik";
  }
  if($hourNow == 12) {
	$partOfDay="lõuna";
  }
  if($hourNow == 0 ) {
	$partOfDay="kesköö";
  }
  
?>

<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title> 
  <?php echo $userName; ?>
  Veebiproge
  </title>
</head>
<body>
  <?php echo "<h1>" . $userName . " koolitöö leht</h1>"; ?>
  
  <p>See leht on loodud koolitöö raames ja ei sisalda tõsiseltvõetavat sisu</p>
  <p> siin on uus ja v2rkse tekst</p>
  <hr>
  <p>Lehe avamise hetkel oli aeg:
  <?php echo $fullTimeNow; ?>. </p>
  <?php echo "Lehe avamise hetkel oli " .$partOfDay ?>.
  <hr>
  <p>https://martinv4@github.com/martinv4/veebiprogrammeerimine.git 
  martinv4@users.noreply.github.com </p>
</body>
</html>

