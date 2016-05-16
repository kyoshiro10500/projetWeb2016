<?php
	function getpanel($user)
	{
        date_default_timezone_set('Europe/Paris') ;
		$semaine = date('W') ;
		$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
		$requete="SELECT lvl_user FROM profil WHERE nom_user='$user' ;";
		$reponse =pg_query($base,$requete) ;
    	if($reponse)
	   	{
			$nbTuples = pg_num_rows($reponse);
			if($nbTuples>0)
			{
				$tupleCourant = pg_fetch_assoc($reponse) ;
                print"<section id=\"panel\">\n";
				print"<h1>Changement des informations du compte</h1>\n" ;
				print"<form action=\"Changement.php\" method=\"post\" onsubmit=\"return verifForm3(this)\">\n";
    			print"Changement de nom d'utilisateur : (6 caractères minimum)<br/>\n" ;
    			print"<input type=\"text\" name=\"newnom\" onblur=\"verifPseudo(this)\"><br/>\n" ;
    			print"Changement d'adresse mail :<br/>\n" ;
    			print"<input type=\"text\" name=\"newmail\" onblur=\"verifMail(this)\"><br/>\n" ;
    			print"Changement de mot de passe :\n" ;
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
    			print"<input type=\"password\" name=\"newmdpverif\" onblur=\"verifmdp(this)\"><br/>\n" ;
    			print"<input type=\"submit\" value=\"Changer\" name=\"bouton1\"/>\n";
    			print"</form>\n";
    			print"</section>\n" ;
				if($tupleCourant['lvl_user']>=1)
				{
					//panel des moderateurs (l'admin est aussi modo)
					print"<section id=\"panel\">\n" ;
					print"<h1>Gestion des utilisateurs</h1>\n" ;
                    print"Banissement\n" ;
                    print"<form action=\"Bannir.php\" method=\"post\" onsubmit=\"return verifForm6(this)\">\n";
                    print"<span>Nom de l'utilisateur à bannir : (6 caractères minimum)</span><br/>\n" ;
                    print"<input type=\"text\" name=\"nomuser\" onblur=\"verifSujet(this)\"><br/>\n" ;
                    print"<input type=\"submit\" value=\"Bannir\" name=\"bouton1\"/>\n";
                    print"</form>\n";
                    if($tupleCourant['lvl_user']==1)
                    {
                        print"</section>\n" ;
                    }
				}
				if($tupleCourant['lvl_user']==2)
				{
					//panel admin 
                    print"</br>\n" ;
                    print"</br>\n" ;
                    print"Monter un utilisateur de grade\n" ;
                    print"</br>\n" ;
                    print"<form action=\"elevergrade.php\" method=\"post\" onsubmit=\"return verifForm6(this)\">\n";
                    print"<span>Nom de l'utilisateur à augmenter : (6 caractères minimum)</span><br/>\n" ;
                    print"<input type=\"text\" name=\"nomuser\" onblur=\"verifSujet(this)\"><br/>\n" ;
                    print"<input type=\"submit\" value=\"Monter en grade\" name=\"bouton1\"/>\n";
                    print"</form>\n";
                    print"</br>\n" ;
                    print"</br>\n" ;
                    print"Baisser un utilisateur de grade\n" ;
                    print"</br>\n" ;
                    print"<form action=\"baissergrade.php\" method=\"post\" onsubmit=\"return verifForm6(this)\">\n";
                    print"<span>Nom de l'utilisateur à destituer : (6 caractères minimum)</span><br/>\n" ;
                    print"<input type=\"text\" name=\"nomuser\" onblur=\"verifSujet(this)\"><br/>\n" ;
                    print"<input type=\"submit\" value=\"Baisser en grade\" name=\"bouton1\"/>\n";
                    print"</form>\n";
                    print"</section>\n" ;
					include("getnews.php") ;
					include("getprogramme.php") ;
					include("getemission.php") ;
					print"<section id=\"panel\">\n" ;
					print"<h1>Gestion des émissions</h1>\n" ;
					getemission() ;
					script2() ;
					print"Création d'émission\n" ;
					print"<form action=\"CreerEmission.php\" method=\"post\" onsubmit=\"return verifForm4(this)\">\n";
    				print"<span>Nom de l'émission : (6 caractères minimum)</span><br/>\n" ;
    				print"<input type=\"text\" name=\"nomEmission\" onblur=\"verifSujet(this)\"><br/>\n" ;
    				print"<span>Description de l'émission : (250 caractères maximum)</span><br/>\n" ;
    				print"<input type=\"text\" name=\"description\" onblur=\"verifDescription(this)\"><br/>\n" ;
    				print"<input type=\"submit\" value=\"Creer\" name=\"bouton1\"/>\n";
    				print"</form>\n";
                    print"</br>\n" ;
    				print"Suppression d'émission\n" ;
    				print"<form action=\"SupprimerEmission.php\" method=\"post\" onsubmit=\"return verifForm5(this)\">\n";
    				print"<span>Nom de l'émission :</span><br/>" ;
    				print"<input type=\"text\" name=\"nomEmission\" onblur=\"verifSujet(this)\">\n" ;
    				print"<input type=\"submit\" value=\"Supprimer\" name=\"bouton1\"/>\n";
    				print"</form>\n";
    				print"</section>\n" ;
    				print"<section id=\"panel\">\n" ;
					print"<h1>Gestion du programme</h1>\n" ;
					getprogramme() ;
    				print"Création de programme : (semaine actuelle n°$semaine)\n" ;
					print"<form action=\"creerprogramme.php\" method=\"post\">\n";
    				print"<span>Nom de l'emission : (6 caractères minimum)</span><br/>\n" ;
    				print"<input type=\"text\" name=\"nomcast\"><br/>\n" ;
    				print"<span>Semaine concernée :</span><br/>\n" ;
    				print"<input type=\"number\" name=\"semaine\" step=\"1\" value=\"$semaine\" min=\"1\" max=\"52\"><br/>\n" ;
    				print"<span>Jour concerné : (Lundi = 1 ... Dimanche = 7)</span><br/>\n" ;
    				print"<input type=\"number\" name=\"jour\" step=\"1\" value=\"1\" min=\"1\" max=\"7\"><br/>\n" ;
    				print"<span>Heure de début et de fin :</span><br/>\n" ;
    				print"<input type=\"number\" name=\"heuredeb\" step=\"1\" value=\"1\" min=\"0\" max=\"23\">\n" ;
    				print"<input type=\"number\" name=\"heurefin\" step=\"1\" value=\"1\" min=\"1\" max=\"24\"><br/>\n" ;
    				print"<input type=\"submit\" value=\"Creer\" name=\"bouton1\"/>\n";
    				print"</form>\n";
                    print"</br>\n";
    				print"Suppression de programme : (semaine actuelle n°$semaine )\n" ;
					print"<form action=\"supprimerprogramme.php\" method=\"post\">\n";
    				print"<span>Semaine concernée :</span><br/>\n" ;
    				print"<input type=\"number\" name=\"semaine\" step=\"1\" value=\"$semaine\" min=\"1\" max=\"52\"><br/>\n" ;
    				print"<span>Jour concerné : (Lundi = 1 ... Dimanche = 7)</span><br/>\n" ;
    				print"<input type=\"number\" name=\"jour\" step=\"1\" value=\"1\" min=\"1\" max=\"7\"><br/>\n" ;
    				print"<span>Heure de début et de fin :</span><br/>\n" ;
    				print"<input type=\"number\" name=\"heuredeb\" step=\"1\" value=\"1\" min=\"0\" max=\"23\">\n" ;
    				print"<input type=\"number\" name=\"heurefin\" step=\"1\" value=\"1\" min=\"1\" max=\"24\"><br/>\n" ;
    				print"<input type=\"submit\" value=\"Supprimer\" name=\"bouton1\"/>\n";
    				print"</form>\n";
    				print"</section>\n" ;
    				print"<section id=\"panel\">\n" ;
					print"<h1>Gestion des news</h1>\n" ;
					getnews() ;
					print"Création de news (10 max : supprimera la plus ancienne)\n" ;
					print"<form action=\"creernews.php\" method=\"post\" onsubmit=\"return verifForm4(this)\">\n";
    				print"<span>Nom de la news : (6 caractères minimum)</span><br/>\n" ;
    				print"<input type=\"text\" name=\"nomnews\" onblur=\"verifSujet(this)\"><br/>\n" ;
    				print"<span>Texte de la news : (250 caractères maximum)</span><br/>\n" ;
    				print"<input type=\"text\" name=\"description\" onblur=\"verifDescription(this)\"><br/>\n" ;
    				print"<input type=\"submit\" value=\"Creer\" name=\"bouton1\"/>\n";
    				print"</form>\n";
                    print"</br>\n";
    				print"Modification de news\n" ;
    				print"<form action=\"ModifierNews.php\" method=\"post\" onsubmit=\"return verifForm4(this)\">\n";
    				print"<span>Nom de la news :</span><br/>" ;
    				print"<input type=\"text\" name=\"nomnews\" onblur=\"verifSujet(this)\"><br/>\n" ;
    				print"<span>Texte de la news modifiée :</span><br/>\n" ;
    				print"<input type=\"text\" name=\"description\" onblur=\"verifDescription(this)\"><br/>\n" ;
    				print"<input type=\"submit\" value=\"Modifier\" name=\"bouton1\"/>\n";
    				print"</form>\n";
    				print"Suppression de news\n" ;
    				print"<form action=\"SupprimerNews.php\" method=\"post\" onsubmit=\"return verifForm5(this)\">\n";
    				print"<span>Nom de la news :</span><br/>" ;
    				print"<input type=\"text\" name=\"nomnews\" onblur=\"verifSujet(this)\">\n" ;
    				print"<input type=\"submit\" value=\"Supprimer\" name=\"bouton1\"/>\n";
    				print"</form>\n";
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