
<?php
session_start();
require("auth.class.php");
if(Auth::Connect()){
	
}
else{
header('Location:../index.php');
}
?>

<?php

if(isset($_POST["contenu"])){
	
	$fichier = "../contenu/".$_POST["titre"];
	$file = fopen($fichier,"w");
	fwrite($file,stripslashes($_POST["contenu"]));
	fclose($file);

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
		<title>l'administration</title>
		</head>
  
  <body>
  	
<style type="text/css">
body
{
	margin: 10px 0 ;
	padding: 0 ;
	text-align: center ;
	font: 0.8em "Trebuchet MS", helvetica, sans-serif ;
	background: #dea ;
}

div#conteneur
{
	width: 1000px ;
	margin: 0 auto ;
	text-align: left ;
	border: 2px solid #ab4 ;
	background: #fff ;
}

h1#header
{
	height: 210px ;
	margin: 0 ;
	background: url(stagière.jpeg) no-repeat left top ;
}

h1#header a
{
	width: 400px ;
	height: 70px ;
	display: block ;
	background: url(97.jpg) no-repeat ;
	position: relative ;
	left: 350px ;
	top: 15px ;
	text-indent: -5000px ;
}



		
ul#menu li
{
	float: left ;
	text-align: center ;
}

ul#menu li a
{
	width: 180px ;
	line-height: 25px ;
	font-size: 2em ;
	font-weight: bold ;
	letter-spacing: 2px ;
	color: #fff ;
	display: block ;
	text-decoration: none ;
	border-right: 2px solid #dea ;
}

ul#menu li a:hover
{
	background: url(MenuItemBgLast.gif) repeat-x 0 0 ;
}

div#contenu
{
	padding: 0 25px 0 100px ;
	background: url(bg_page.gif) no-repeat 15px 15px ;
}

div#contenu h2
{
	padding-left: 25px ;
	line-height: 25px ;
	font-size: 1.4em ;
	background: url(little_apple.gif) no-repeat left bottom ;
	color: #9b2 ;
	border-bottom: 1px solid #9b2 ;
}

div#contenu h3
{
	margin-left: 15px ;
	padding-left: 5px ;
	border-bottom: 1px solid #9b2 ;
	border-left: 3px solid #9b2 ;
	color: #9b2 ;
}

div#contenu p
{
	text-align: justify ;
	text-indent: 2em ;
	line-height: 1.7em ;
}

div#contenu a
{
	color: #8a0 ;
}

div#contenu a:hover
{
	color: #9b2 ;
}

p#footer
{
	margin: 0 ;
	padding-right: 10px ;
	line-height: 30px ;
	text-align: right ;
	color: #8a0 ;
}

pre
{
	overflow: auto ;
	background: #dea ;
	border: 2px solid #9b2 ;
	padding: 5px 0 0 5px ;
	font-size: 1.2em ;
}

* html pre
{
	width: 636px ;
}

pre span
{
	color: #560 ;
}

pre span.comment
{
	color: #b30000 ;
}
</style>
  
  <div id="content">  
  <h1><center>Ajouter une page</center></h1>
  <hr />
<?php
if(!empty($_POST['titre'])&& preg_match("/[a-zA-Z].+[h][t][m][l]/",$_POST['titre'])){
	$f = fopen("..contenu/".$_POST["titre"], "a+");
fclose($f);}
else{

	
}
?>
<div id= "article">
<form method="post" action="page.php">
<input style="margin-left:1px;" type="name" name="titre" placeholder="le titre .." />
<textarea rows="4" cols="50" placeholder="ecrire.." name="contenu"></textarea>
<input type="submit" value="ENVOYER" />
</form>
</div>
<div id="deconnextion"><p><a href="index.php">Retour</a> | <a href="logout.php">Se deconnecter</a></p></div>
</body>
</html>