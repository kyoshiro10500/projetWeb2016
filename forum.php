<?php //page où le forum est affiché
session_start();
  include("miseEnPage.php"); 
  include("affichelogin.php") ;
  include("getforum.php") ;
  include("script.php") ;
  enTete() ;
    print"<header>\n" ;
    print"<img id=\"baniere\" src=\"baniere.jpg\" alt=\"banière twich\" id=\"banière\">\n" ;
    affichelogin() ;
    print"<ul id=\"onglets\">\n" ;
    print"<li>\n" ;
	print"<a href=\"accueil.php\"> Accueil </a>\n" ;
    print"</li>\n" ;
    print"<li class =\"active\">\n" ;
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
    print"<section>\n" ;
    getforum() ;
    print"</section>\n" ;
    if(!empty($_SESSION['login']))
    {
    print"<section>\n" ;
    script2() ;
    print"<form action=\"Creeforum.php\" method=\"post\" onsubmit=\"return verifForm1(this)\">\n";
    print"<br/>\n" ;
    print"<p>Sujet (6 caractères minimum)</p>" ;
    print"<input type=\"text\" name=\"sujet\" onblur=\"verifSujet(this)\"><br/><br/>\n" ;
    print"<p>Message (500 caractères maximum)</p>" ;
    print"<textarea cols=\"97\" rows=\"4\" name=\"text\" onblur=\"verifText(this)\"></textarea><br/><br/>\n" ;
    print"<input type=\"submit\" value=\"Répondre\" name=\"bouton1\"/>\n";
    print"</form>\n";
    print"</section>\n" ;
    }



pied() ; 
?>