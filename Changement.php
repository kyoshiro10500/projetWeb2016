<?php
	session_start();
  	include("miseEnPage.php"); 
    include("affichelogin.php") ;
  	enTete() ;
    print"<header>\n" ;
    print"<img id=\"baniere\" src=\"banière.jpg\" alt=\"banière twich\" >\n" ;
    affichelogin() ;
    print"<ul id=\"onglets\">\n" ;
    print"<li>\n" ;
	print"<a href=\"accueil.php\"> Accueil </a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
	print"<a href=\"forum.php\"> Forum </a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
    print"<a href=\"programmation.php\">Programmation</a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
	print"<a href=\"contact.php\">Contact</a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
    print"<a href=\"profil.php\">Profil</a>\n" ;
    print"</li>\n" ;
    print"</ul>\n" ;
    print"</header>\n" ;
    $base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $nom_user = $_SESSION['login'] ;
    if(isset($_POST['newnom']) && !empty($_POST['newnom']))
    {
    	$newnom = $_POST['newnom'] ;
    	$requete="SELECT * FROM profil WHERE nom_user='$newnom' ;";
		$reponse =pg_query($base,$requete) ;
		if(pg_num_rows($reponse)==0)
		{
			$requete="UPDATE profil SET nom_user = '$newnom' WHERE nom_user = '$nom_user';";
			pg_query($base,$requete) ;
			$nom_user = $newnom ;
			$_SESSION['login'] = $newnom ;
		}
		else
		{
			$erreur1 = "Erreur : ce nom d'utilisateur existe déjà" ;
		}
    }
    if(isset($_POST['newmail']) && !empty($_POST['newmail']))
    {
    	$newmail = $_POST['newmail'] ;
    	$requete="SELECT * FROM profil WHERE mail_user='$newmail' ;";
		$reponse =pg_query($base,$requete) ;
		if(pg_num_rows($reponse)==0)
		{
			$requete="UPDATE profil SET mail_user = '$newmail' WHERE nom_user = '$nom_user';";
			pg_query($base,$requete) ;
		}
		else
		{
			$erreur2 = "Erreur : ce mail est déjà pris" ;
		}
    }
    if(isset($_POST['newmdp']) && !empty($_POST['newmdp']) && isset($_POST['mdp']) && !empty($_POST['mdp']) && isset($_POST['newmdpverif']) && !empty($_POST['newmdpverif']) )
    {
    	$mdp = $_POST['mdp'] ;
    	$newmdp = $_POST['newmdp'] ;
    	$newmdpverif = $_POST['newmdpverif'] ;
    	if($newmdp == $newmdp)
    	{
    		$requete="SELECT * FROM profil WHERE nom_user = '$nom_user' AND password_user = '$mdp' ;";
   			$reqt=pg_query($base,$requete) ;
   			$nb_tuples=pg_num_rows($reqt) ;
      		if($nb_tuples ==1)
         	{
           		$requete="UPDATE profil SET password_user = '$newmdp' WHERE nom_user = '$nom_user' AND password_user = '$mdp' ;";
				pg_query($base,$requete) ;
         	}
      		else
         	{
            	$erreur3 = "Erreur : Le mot de passe du compte est érronné";
         	}
    	}
    	else
    	{
    		$erreur3 = "Erreur : les deux mots de passe sont différents" ;
    	}
    }
    if(!empty($erreur1) || !empty($erreur2) || !empty($erreur3))
    {
    	if(!empty($erreur1))
    	{
    		print"<span>$erreur1</span>" ;
    		print"<br/>";
    	}
    	if(!empty($erreur2))
    	{
    		print"<span>$erreur2</span>" ;
    		print"<br/>";
    	}
    	if(!empty($erreur3))
    	{
    		print"<span>$erreur3</span>" ;
    		print"<br/>";
    	}
    	print"<a href=\"profil.php\">Retour au profil</a>\n" ;
    }
    else
    {
    	header('Location: profil.php');
    }
    
?>