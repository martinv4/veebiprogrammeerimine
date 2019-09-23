<?php
  $userName="Martin Vare";
  $photoDir = "../Pildid/";
  $picFileTypes = ["image/jpeg", "image/png"];
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
  
  $weekDaysET = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
  $monthsET = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
  
  //info semestri kulgemise kohta
  $semesterStart = new DateTime("2019-9-2");
  $semesterEnd = new DateTime("2019-12-13");
  $semesterDuration = $semesterStart->diff($semesterEnd);
  $today = new DateTime ("now");
  $fromSemesterStart = $semesterStart->diff($today);
  //var_dump($fromSemesterStart);
  $semesterInfoHTML = "<p> siin peaks olema info semestri kohta </p>";
  $elapsedValue = $fromSemesterStart->format("%r%a");
  $durationValue = $semesterDuration->format("%r%a");
  //echo $testValue
  //<meter min="0" max="155" value="33">Väärtus</meter>
  if($elapsedValue > 0) {
    $semesterInfoHTML = "<p>Semester on täies hoos: ";
    $semesterInfoHTML .= '<meter min="0" max="'.$durationValue .'"';
    $semesterInfoHTML .= 'value="'.$elapsedValue .'">';
    $semesterInfoHTML .= round($elapsedValue / $durationValue * 100, 1)."%";
    $semesterInfoHTML .= "</meter>";
    $semesterInfoHTML .= "</p>";
  }
  if($elapsedValue < 0) {
	$semesterInfoHTML = "<p>Semester pole hakanud ";
	$semesterInfoHTML .= "</p>";
  }
 
  //foto lisamine lehele
  $allPhotos = [];
  $dirContent = array_slice(scandir($photoDir), 2);
  //var_dump($dirContent);
  foreach($dirContent as $file){
    $fileInfo = getImagesize($photoDir .$file);
    //var_dump($fileInfo);
    if(in_array($fileInfo["mime"], $picFileTypes) == true) {
      array_push($allPhotos, $file);
    }
  }
  
  //var_dump($allPhotos);
  $picCount = count($allPhotos);
  $picNum = mt_rand(0, ($picCount - 1));
  //echo $allPhotos[$picNum];
  $photoFile = $photoDir .$allPhotos[$picNum];
  $randomImgHTML = '<img src="' .$photoFile .'" alt="TLÜ Terra õppehoone">';
  
  //lisame lehe päise
  require("header.php");
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
  
  <?php
   echo $semesterInfoHTML
  ?>

  <p> siin on uus ja v2rkse tekst</p>
  <hr>
  <p>Lehe avamise hetkel oli aeg:
  
  <?php echo $fullTimeNow; ?>. </p>
  <?php echo "Lehe avamise hetkel oli " .$partOfDay ?>.
 
  <?php
  //nädalapäev ja kuu puudu;
  //echo 
  //?>
  
  <hr>
  
  <?php
  echo $randomImgHTML;
  ?>
  
  <p>https://martinv4@github.com/martinv4/veebiprogrammeerimine.git </p>
  <p>martinv4@users.noreply.github.com </p>
</body>
</html>