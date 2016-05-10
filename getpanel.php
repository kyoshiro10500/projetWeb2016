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

				print"<form action=\"Changement.php\" method=\"post\" onsubmit=\"return verifForm3(this)\">\n";
    			print"<br/>\n" ;
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
    			print"<input type=\"submit\" value=\"Envoyer\" name=\"bouton1\"/>\n";
    			print"</form>\n";
				if($tupleCourant['lvl_user']==1)
				{
					//panel des moderateurs
				}
				if($tupleCourant['lvl_user']==2)
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