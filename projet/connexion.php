
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
    <title>Mon Site</title>
<!--[if IE]>
<style type="text/css">
html pre
{
width: 636px ;
}
</style>
<![endif]-->

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
  
  </head>
  
  <body>
  <div id="conteneur">    
    <h1 id="header"><a href="#" title="Colored Design - Accueil"><span>Colored Design</span></a></h1>
	
	
</ul></br></html>
<?php  

include_once 'idents.php';

if(isset($_POST['login'], $_POST['mdp'])) # Si le formulaire est soumis
{
 if (!empty($_POST['login']) && !empty($_POST['mdp']))
 {

 $login = $_POST['login']; # Protection des Injection SQL ect...
 $mdp = sha1($_POST['mdp']);
 
 $login_q = $bdd->prepare("SELECT * FROM users WHERE login = :login AND pass = :mdp AND valid = '1'");
 $login_q->execute(array( 
	'login' => $login, 
	'mdp' => $mdp
 ));
 
 if($login_q->fetchColumn() > 0) # Si login pass et valid ok
 {
	 $login_q->execute(array(‘login’ => $login, ‘mdp’ => $mdp));
 $user = $login_q->fetch(PDO::FETCH_OBJ); 
 
 $token = sha1(uniqid().$user->id.sha1(uniqid()));
 setcookie('token', $token, time()+3600); # Création des cookies
 $user_id = $user->id;
 $setToken_q = $bdd->prepare("UPDATE users SET token = :token, token_date = NOW() WHERE id = :user_id");
 $setToken_q->execute(array( 
	'token' => $token, 
	'user_id' => $user_id
 ));
 $token = null;
 $_SESSION['login'] = $user->login; # Création des sessions
 
 header('Location: ta.php'); # Redirection
 
 exit();
 }
 else # Sinon
 {
 # Login ou Mot de passe incorrect
 }
 }
}
 
?>

 <body>
 
 <!--[if IE]><div id="fond_ie"><! [endif]-->
 
 
 
 <div>
 
 
 
 <section id="connexion">
 <form method="post" action="connexion.php">
 <label for="id">Identifiant</label>
 <input id="login" name="login" type="text" required /> <!-- Remplir ce champ est requis -->
 <br/>
 <label for="mdp">Mot de passe</label>
 <input id="mdp" name="mdp" type="password" required /> <!-- Remplir ce champ est requis -->
 
 <input type="submit" value="Connexion">
 </form>
 </section>
 
 
 </div>

 </body>
</html>