<?php

function getprofil($user)
{
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
	$requete="SELECT mail_user FROM profil WHERE nom_user='$user' ;";
	$reponse =pg_query($base,$requete) ;
    if($reponse)
	   {
		$nbTuples = pg_num_rows($reponse);
		if($nbTuples>0)
		{
			$tupleCourant = pg_fetch_assoc($reponse) ;
			print"<section>\n" ;
			print"<h1>Informations de l'utilisateur</h1>\n" ;
			print"<span>\n" ;
			print"Nom d'utilisateur :\n" ;
			print $user ;
			print"<br/>" ;
			print"Adresse mail :\n" ;
			print $tupleCourant['mail_user'] ;
			print"</span>\n" ;
			print"</section>\n" ;
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