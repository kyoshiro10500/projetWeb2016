<?php

function affichelogin()
{
	if(!isset($_SESSION['login'])) //a modifier si le nom d'user n'est pas nom_user dans la bdd
	{
		print"<a href=\"signin.php\" id=\"login\"> S'enregistrer </a>\n" ;
		print"<a href=\"login.php\" id=\"login\" class=\"marge\"> S'identifier </a>\n" ;
		print"<br/>\n" ;
		print"<br/>\n" ;

	}
	else
	{
		
		print"<a href=\"signout.php\" id=\"login\"> Se déconnecter</a>\n" ;
		print "<span class=\"marge\">\n" ;
		print $_SESSION['login'] ; //a modifier si le nom d'user n'est pas nom_user dans la bdd
		print "</span>\n" ;
		print"<br/>\n" ;
		print"<br/>\n" ;


	}
}

?>