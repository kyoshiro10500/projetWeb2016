<?php
	function getpanel($user)
	{
		include("getnews.php") ;
		$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
		$requete="SELECT lvl_user FROM profil WHERE nom_user='$user' ;";
		$reponse =pg_query($base,$requete) ;
    	if($reponse)
	   	{
			$nbTuples = pg_num_rows($reponse);
			if($nbTuples>0)
			{
				$tupleCourant = pg_fetch_assoc($reponse) ;
				print"<section>\n" ;
				print"<h1>Changement des informations du compte</h1>\n" ;
				print"<form action=\"Changement.php\" method=\"post\" onsubmit=\"return verifForm3(this)\">\n";
    			print"<p>Changement de nom d'utilisateur : (6 caractères minimum)</p>\n" ;
    			print"<input type=\"text\" name=\"newnom\" onblur=\"verifPseudo(this)\"><br/>\n" ;
    			print"<p>Changement d'adresse mail :</p>\n" ;
    			print"<input type=\"text\" name=\"newmail\" onblur=\"verifMail(this)\"><br/>\n" ;
    			print"<p>Changement de mot de passe :\n" ;
    			print"<br/>\n" ;
    			print"<span>Mot de passe actuel :</span>\n" ;
    			print"<br/>\n" ;
    			print"<input type=\"password\" name=\"mdp\" onblur=\"verifmdp(this)\"><br/>\n" ;
    			print"<br/>\n" ;
    			print"<span>Nouveau mot de passe : (6 caractères minimum)</span>\n" ;
    			print"<br/>\n" ;
    			print"<input type=\"password\" name=\"newmdp\" onblur=\"verifmdp(this)\"><br/>\n" ;
    			print"<br/>\n";
    			print"<span>Confirmation du mot de passe:</span>\n" ;
    			print"<br/>\n" ;
    			print"<input type=\"password\" name=\"newmdpverif\" onblur=\"verifmdp(this)\"><br/></p>\n" ;
    			print"<input type=\"submit\" value=\"Changer\" name=\"bouton1\"/>\n";
    			print"</form>\n";
    			print"</section>\n" ;
				if($tupleCourant['lvl_user']>=1)
				{
					//panel des moderateurs (l'admin est aussi modo)
					print"<section>\n" ;
					print"<h1>Gestion des utilisateurs</h1>\n" ;
    				print"</section>\n" ;
				}
				if($tupleCourant['lvl_user']==2)
				{
					//panel admin 
					include("getemission.php") ;
					print"<section>\n" ;
					print"<h1>Gestion des émissions (au maximum 20)</h1>\n" ;
					getemission() ;
					script2() ;
					print"<p>Création d'émission\n" ;
					print"<form action=\"CreerEmission.php\" method=\"post\" onsubmit=\"return verifForm4(this)\">\n";
    				print"<span>Nom de l'émission : (6 caractères minimum)</span><br/>\n" ;
    				print"<input type=\"text\" name=\"nomEmission\" onblur=\"verifSujet(this)\"><br/>\n" ;
    				print"<span>Description de l'émission : (250 caractères maximum)</span><br/>\n" ;
    				print"<input type=\"text\" name=\"description\" onblur=\"verifDescription(this)\"><br/>\n" ;
    				print"<input type=\"submit\" value=\"Creer\" name=\"bouton1\"/>\n";
    				print"</form>\n";
    				print"</p>" ;
    				print"<p>Suppression d'émission\n" ;
    				print"<form action=\"SupprimerEmission.php\" method=\"post\" onsubmit=\"return verifForm5(this)\">\n";
    				print"<span>Nom de l'émission :</span><br/>" ;
    				print"<input type=\"text\" name=\"nomEmission\" onblur=\"verifSujet(this)\">\n" ;
    				print"<input type=\"submit\" value=\"Supprimer\" name=\"bouton1\"/>\n";
    				print"</form>\n";
    				print"</p>" ;
    				print"</section>\n" ;
    				print"<section>\n" ;
					print"<h1>Gestion du programme</h1>\n" ;
    				print"</section>\n" ;
    				print"<section>\n" ;
					print"<h1>Gestion des news</h1>\n" ;
					getnews() ;
					print"<p>Création de news (10 max : supprimera la plus ancienne)\n" ;
					print"<form action=\"creernews.php\" method=\"post\" onsubmit=\"return verifForm4(this)\">\n";
    				print"<span>Nom de la news : (6 caractères minimum)</span><br/>\n" ;
    				print"<input type=\"text\" name=\"nomnews\" onblur=\"verifSujet(this)\"><br/>\n" ;
    				print"<span>Texte de la news : (250 caractères maximum)</span><br/>\n" ;
    				print"<input type=\"text\" name=\"description\" onblur=\"verifDescription(this)\"><br/>\n" ;
    				print"<input type=\"submit\" value=\"Creer\" name=\"bouton1\"/>\n";
    				print"</form>\n";
    				print"</p>" ;
    				print"<p>Modification de news\n" ;
    				print"<form action=\"ModifierNews.php\" method=\"post\" onsubmit=\"return verifForm4(this)\">\n";
    				print"<span>Nom de la news :</span><br/>" ;
    				print"<input type=\"text\" name=\"nomnews\" onblur=\"verifSujet(this)\"><br/>\n" ;
    				print"<span>Texte de la news modifiée :</span><br/>\n" ;
    				print"<input type=\"text\" name=\"description\" onblur=\"verifDescription(this)\"><br/>\n" ;
    				print"<input type=\"submit\" value=\"Modifier\" name=\"bouton1\"/>\n";
    				print"</form>\n";
    				print"</p>" ;
    				print"<p>Suppression de news\n" ;
    				print"<form action=\"SupprimerNews.php\" method=\"post\" onsubmit=\"return verifForm5(this)\">\n";
    				print"<span>Nom de la news :</span><br/>" ;
    				print"<input type=\"text\" name=\"nomnews\" onblur=\"verifSujet(this)\">\n" ;
    				print"<input type=\"submit\" value=\"Supprimer\" name=\"bouton1\"/>\n";
    				print"</form>\n";
    				print"</p>" ;
    				print"</section>\n" ;

				}
			}
			else
			{
				print"Erreur de récupération des informations\n";
				print"<br/>" ;
				print"<a href=\"profil.php\" class=\"login\">Redirection</a>\n" ;
			}
	   	}
	   	else
	   	{
		    print"Erreur de récupération des informations\n";
			print"<br/>" ;
			print"<a href=\"profil.php\" class=\"login\">Redirection</a>\n" ;
	   }
           pg_close( $base );


	}












?>