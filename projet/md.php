<?php
session_start();
require("auth.class.php");
if(Auth::Connect()){
	
}
else{
header('Location:../index.php');
}
if{isset($_POST["contenu"])}{
	
	$fichier = "../contenu/".$_POST['file'];
	$file = fopen($fichier,"w");
	fwrite($file,stripslashes{$_POST["contenu"]));
	fclose($file);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
		<title>l'administration</title>
		</head>
  
  <body>
  <div id="content">  
  <h1><center>Ajouter des tâches</center></h1>
  <hr />
  <?php
  $dir =opendir("../contenu");
  while($file = readdir($dir)){
	  if($file!="." && $file!=".."){
	  echo '<a class="info" href="?f='.$file.'" ><img src="../page.gif"/>';
	  echo '<span>'.$file.'</span>';
	  echo'</a>';
  }
  }
  if(isset($_Get["f"])){
	  $fichier="../contenu/".$_GET["f"];
	  $contenu=file_get_contents($fichier);
	  
	  
  }
  ?>
  <div id="tâches">
  <form method="post" action="md.php">
  
	<input style="margin-left:1px" type="text" name="titre" />
	<textarea rows="4" cols="50" placeholder="Contenu.." name="contenu"></textarea>
    <input type="hidden" name="file" value="<?php echo $_GET["f"]; ?>" />
	<input type="submit" value="Envoyer" />
	</form>
  </div>
  <div id="déconnection"><p><a href="logout.php">Se deconnecter</a></p></div>
  </div>
  </body>
  </html>
