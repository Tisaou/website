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
	
	 <ul id="menu"><!--
	
	--><li><a href="index.html">Accueil</a></li><!--
	--><li><a href="taches.html">Mes Taches</a></li><!--
	--><li><a href="Services.html">Les Services</a></li><!--
	--><li><a href="contact1.html">Contact</a></li>
<body> 

<div id="header"> 
<div id="headerleft"> 
</div> 
<div id="headerrightsup"> 
</div> 
<div id="headerrightinf"> 


</div> 
<div id="contenu"> 
<div id="contactsup"> 
<h1>Contactez-nous</h1> 
</div> 
<div id="contactleft"> 
<br /> 
<h2>Formulaire</h2> 
<br /> 
<?php
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = derouikram @gmail.com;
 
// copie ? (envoie une copie au visiteur)
$copie = 'oui'; // 'oui' ou 'non'
 
// Messages de confirmation du mail
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
 
// Messages d'erreur du formulaire
$message_erreur_formulaire = "Vous devez d'abord <a href=\"contact.html\">envoyer le formulaire</a>.";
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";
 
/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/
 
// on teste si le formulaire a été soumis
if (!isset($_POST['envoi']))
{
	// formulaire non envoyé
	echo '<p>'.$message_erreur_formulaire.'</p>'."\n";
}
else
{
	/*
	 * cette fonction sert à nettoyer et enregistrer un texte
	 */
	function Rec($text)
	{
		$text = htmlspecialchars(trim($text), ENT_QUOTES);
		if (1 === get_magic_quotes_gpc())
		{
			$text = stripslashes($text);
		}
 
		$text = nl2br($text);
		return $text;
	};
 
	/*
	 * Cette fonction sert à vérifier la syntaxe d'un email
	 */
	function IsEmail($email)
	{
		$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
		return (($value === 0) || ($value === false)) ? false : true;
	}
 
	// formulaire envoyé, on récupère tous les champs.
	$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
	$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
	$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
	$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
 
	// On va vérifier les variables et l'email ...
	$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
 
	if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
	{
		// les 4 variables sont remplies, on génère puis envoie le mail
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'From:'.$nom.' <'.$email.'>' . "\r\n" .
				'Reply-To:'.$email. "\r\n" .
				'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
				'Content-Disposition: inline'. "\r\n" .
				'Content-Transfer-Encoding: 7bit'." \r\n" .
				'X-Mailer:PHP/'.phpversion();
	
		// envoyer une copie au visiteur ?
		if ($copie == 'oui')
		{
			$cible = $destinataire.','.$email;
		}
		else
		{
			$cible = $destinataire;
		};
 
		// Remplacement de certains caractères spéciaux
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('<br>','',$message);
		$message = str_replace('<br />','',$message);
		$message = str_replace("&lt;","<",$message);
		$message = str_replace("&gt;",">",$message);
		$message = str_replace("&amp;","&",$message);
 
		// Envoi du mail
		if (mail($cible, $objet, $message, $headers))
		{
			echo '<p>'.$message_envoye.'</p>'."\n";
		}
		else
		{
			echo '<p>'.$message_non_envoye.'</p>'."\n";
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		echo '<p>'.$message_formulaire_invalide.' <a href="contact.html">Retour au formulaire</a></p>'."\n";
	};
}; // fin du if (!isset($_POST['envoi']))
?>
Améliorations

Ceci est un exemple simple, mais fonctionnel. Vous pouvez toujours l'améliorer en rajoutant des champs (lisez les articles sur les formulaires et leur traitement pour plus de détails sur les champs et leur récupération). Vous pouvez également effectuer le formulaire et son traitement dans la même page, afin qu'en cas d'erreur, le visiteur n'ait pas à tout resaisir.

Exemple du même formulaire, en une seule page nommée contact.php :

<?php
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = 'moi@fournisseur.tld';
 
// copie ? (envoie une copie au visiteur)
$copie = 'oui';
 
// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
$form_action = '';
 
// Messages de confirmation du mail
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
 
// Message d'erreur du formulaire
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";
 
/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/
 
/*
 * cette fonction sert à nettoyer et enregistrer un texte
 */
function Rec($text)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}
 
	$text = nl2br($text);
	return $text;
};
 
/*
 * Cette fonction sert à vérifier la syntaxe d'un email
 */
function IsEmail($email)
{
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}
 
// formulaire envoyé, on récupère tous les champs.
$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
 
// On va vérifier les variables et l'email ...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin
 
if (isset($_POST['envoi']))
{
	if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
	{
		// les 4 variables sont remplies, on génère puis envoie le mail
		$headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
		//$headers .= 'Reply-To: '.$email. "\r\n" ;
		//$headers .= 'X-Mailer:PHP/'.phpversion();
 
		// envoyer une copie au visiteur ?
		if ($copie == 'oui')
		{
			$cible = $destinataire.','.$email;
		}
		else
		{
			$cible = $destinataire;
		};
 
		// Remplacement de certains caractères spéciaux
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('&lt;br&gt;','',$message);
		$message = str_replace('&lt;br /&gt;','',$message);
		$message = str_replace("&lt;","&lt;",$message);
		$message = str_replace("&gt;","&gt;",$message);
		$message = str_replace("&amp;","&",$message);
 
		// Envoi du mail
		if (mail($cible, $objet, $message, $headers))
		{
			echo '<p>'.$message_envoye.'</p>';
		}
		else
		{
			echo '<p>'.$message_non_envoye.'</p>';
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		echo '<p>'.$message_formulaire_invalide.'</p>';
		$err_formulaire = true;
	};
}; // fin du if (!isset($_POST['envoi']))
 
if (($err_formulaire) || (!isset($_POST['envoi'])))
{
	// afficher le formulaire
	echo '
	<form id="contact" method="post" action="'.$form_action.'">
	<fieldset><legend>Vos coordonnées</legend>
		<p><label for="nom">Nom :</label><input type="text" id="nom" name="nom" value="'.stripslashes($nom).'" tabindex="1" /></p>
		<p><label for="email">Email :</label><input type="text" id="email" name="email" value="'.stripslashes($email).'" tabindex="2" /></p>
	</fieldset>
 
	<fieldset><legend>Votre message :</legend>
		<p><label for="objet">Objet :</label><input type="text" id="objet" name="objet" value="'.stripslashes($objet).'" tabindex="3" /></p>
		<p><label for="message">Message :</label><textarea id="message" name="message" tabindex="4" cols="30" rows="8">'.stripslashes($message).'</textarea></p>
	</fieldset>
 
	<div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer le formulaire !" /></div>
	</form>';
};
?>
<form action="envoi.php" method="post">
    <p>
        <label for="civilite">Civilité :</label>
        <select id="civilite" name="civilite">
            <option value="mr" selected="selected">Monsieur</option>
            <option value="mme">Madame</option>
            <option value="mlle">Mademoiselle</option>
        </select>
    </p>
    <p>
        <label for="nom">Nom/Prénom :</label>
        <input type="text" id="nom" name="nom" />  
    </p>  
    <p>  
        <label for="email">E-mail :</label>  
        <input type="text" id="email" name="email" />  
    </p>
    <p>  
        <label for="sujet">Sujet :</label>  
        <input type="text" id="sujet" name="sujet" />  
    </p>  
    <p>  
        <label for="message">Message :</label>  
        <textarea id="message" name="message" cols="40" rows="4"></textarea>  
    </p>
    <p>
        <input type="submit" name="envoye" value="Envoyer" />
    </p> 
</form>

</div> 

</body> 