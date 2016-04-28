<?php

	function getpanel($user)
	{
		$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
		$requete="SELECT lvl_user FROM profil WHERE nom_user='$user' ;";
		$reponse =pg_query($base,$requete) ;
    	if($reponse)
	   	{
			$nbTuples = pg_num_rows($reponse);
			if($nbTuples>0)
			{
				$tupleCourant = pg_fetch_assoc($reponse) ;
				print"<form action=\"Changement.php\" method=\"post\">\n";
    			print"<br/>\n" ;
    			print"<p>Changement de nom d'utilisateur :</p>\n" ;
    			print"<input type=\"text\" name=\"newnom\"><br/>\n" ;
    			print"<p>Changement d'adresse mail :</p>\n" ;
    			print"<input type=\"text\" name=\"newmail\"><br/>\n" ;
    			print"<p>Changement de mot de passe :\n" ;
    			print"<br/>\n" ;
    			print"<span>Mot de passe actuel :</span>\n" ;
    			print"<br/>\n" ;
    			print"<input type=\"password\" name=\"mdp\"><br/>\n" ;
    			print"<br/>\n" ;
    			print"<span>Nouveau mot de passe :</span>\n" ;
    			print"<br/>\n" ;
    			print"<input type=\"password\" name=\"newmdp\"><br/>\n" ;
    			print"<br/>\n";
    			print"<span>Confirmation du mot de passe:</span>\n" ;
    			print"<br/>\n" ;
    			print"<input type=\"password\" name=\"newmdpverif\"><br/></p>\n" ;
    			print"<input type=\"submit\" value=\"Envoyer\" name=\"bouton1\"/>\n";
    			print"</form>\n";
				if($tupleCourant['lvl_user']==1)
				{
					//panel des moderateurs
				}
				if($tupleCourant['lvl_user']==1)
				{
					//panel admin
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