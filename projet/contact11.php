<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
    <title>Mon Site</title>
  
  </head>
  
  <body>
  <div id="conteneur">    
    <h1 id="header"><a href="#" title="Colored Design - Accueil"><span>Colored Design</span></a></h1>
	
	 <ul id="menu"><!--
	
	--><li><a href="index.html">Accueil</a></li><!--
	--><li><a href="administration/contenu/taches.html">Mes Taches</a></li><!--
	--><li><a href="Services.html">Les Services</a></li><!--
	--><li><a href="contact11.php">Contact</a></li>
<body> 

<div id="header"> 

<div id="contenu"> 
<div id="contactsup"> 
<h1>Contactez-nous</h1> 
</div> 
<br /> 

           

<br /> 
<fieldset>

                  
<div class="contact_section">
           
              <p>Nous sommes toujours heureux de recevoir vos commentaires.<br />
Voici comment nous joindre :</p>

<h2>Adresse</h2>
<img src="Capture.jpg" alt="" width="825"  />
<p>Rue tantan (en face d'école Oued Eddahab), 
Essaouira-Maroc<br />
</p>
<p><em> Téléphone </em>: <strong>+212(0)633690369 </strong><br />
<p><em>Fix </em>: <strong>+212 (0)5 24 78 32 23</strong></p>

<p>Nos bureaux sont ouverts du lundi au samedi, de 9 h 00 à 18 h 00.</p>


           </div>

<?php
 
function valide_email($email)
{
    $syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
    if(!preg_match($syntaxe,$email))
    {
        return true;
    }
    else
    {
        return false;
    }
}
 
header('Content-type: text/html; charset=UTF-8');
 
if (isset($_POST['submitform']))
{
    // je verifie que les champs sont remplies et j'envoie le mail ou j'affiche une erreurs.
    if (isset($_POST['nom'], $_POST['email'], $_POST['message']))
    {
        $nom = htmlentities(trim($_POST['nom']));
        $email = htmlentities(trim($_POST['email']));
        $message = htmlentities(trim($_POST['message']));
 
        if (empty($nom))
        {
            echo '<b><font style="color: #ff0000;" >le champ nom est vide</font></b>';
        }
        else if(empty($email))
        {
            echo '<b><font style="color: #ff0000;" >le champ email est vide</font></b>';
        }
        else if(empty($message))
        {
            echo '<b><font style="color: #ff0000;" >le champ message est vide</font></b>';
        }
        else
        {
                      
            // je vérifie que l'email est valide.
            if (!valide_email($email))
            {
          
                    // je j'envoie l'email si aucune erreur est affiché
                    $adresse_dest = "derouikram@gmail.com";
                     
                    $boundary = hash('sha256', uniqid(rand()));
                     
                    $sujet = "Contact ikram";
                     
                    $contenu_message = "";
                    $contenu_message .= "\n--".$boundary."\nContent-Type: text/html;";
                    $contenu_message .= "charset=\"ISO-8859-1\"\n\n";
                    $contenu_message .= "<p align='left'>
                                        <b>Nom client : </b>" .$nom."
                                        <br /><b>Email client : </b>" .$email."
                                        <br /> <b>Message du client :</b><br />" .$message. "</p>";
                                         
                    $adresse_exp = "";
                    $adresse_exp .= "MIME-Version: 1.0\n";
                    $adresse_exp .= "Content-Type: multipart/alternative;";
                    $adresse_exp .= "boundary=".$boundary."\n";
                    $adresse_exp .= "From: derouikram@gmail.com";
 
                        $succes = mail(html_entity_decode($adresse_dest), html_entity_decode($sujet), html_entity_decode($contenu_message), html_entity_decode($adresse_exp));
                        if($succes)// Si le mail a été correctement envoyé.
                        {
                            echo '<b>l\'email &agrave; bien &eacute;t&eacute; envoy&eacute; merci</b>';
                            header('Refresh: 1;url=index.html');
                        }
                        else
                        {
                            echo '<font style="color: #ff0000;" >Une erreur est survenue lors de l\'envoi du mail</font>';
                           
                        }
                             
            //je renvoie une erreur si l'email est incorrect.
            }
            else
            {
                echo '<font style="color: #ff0000;" >l\'email suivant : '.$email.' est invalide</font>';
            }
        }
    }  
}
?>
<h2>Formulaire</h2> 
<form action="" method="post">
    <label>Votre Nom :</label><br />
        <input type="text" name="nom" size="38" value="<?php if (isset($_POST['nom'])) echo htmlentities($_POST['nom']); ?>" /><br />
    <label>Votre email :</label>
        <br /><input type="text" name="email" size="38" value="<?php if (isset($_POST['email'])) echo htmlentities($_POST['email']); ?>" /><br />
    <label>Votre message :</label><br />
        <textarea name="message" rows="15" cols="30"><?php if (isset($_POST['message'])) echo htmlentities($_POST['message']); ?></textarea><br />
    <br />
<input type="submit" value="      Envoyer votre message       " name="submitform" />
</form>
</fieldset>
</div> 

<nav class="nav-footer">
	<ul>
    	<ul id="menu"><!--
	
	--><li><a href="index.html">Accueil</a></li><!--
	--><li><a href="administration/contenu/taches.html">Mes Taches</a></li><!--
	--><li><a href="Services.html">Les Services</a></li>
	
</ul>       
    </ul>
</nav>

				
				
			
<footer id="footer">
      <div class="container clearfix">
		  <div class="left">
			  					  ©2015@IkramDeroui			  		  </div>
		  
      </div>
    </footer><!-- footer -->

  </body>
</html>
