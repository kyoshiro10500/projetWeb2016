<?php //page où le forum est affiché
session_start();
  include("miseEnPage.php"); 
  include("affichelogin.php") ;
  enTete() ;
    print"<header>\n" ;
    print"<img id=\"baniere\" src=\"banière.jpg\" alt=\"banière twich\" id=\"banière\">\n" ;
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
    print"<br/>\n" ;
    print"<ul id=\"forum\">\n" ;
    print"<li>\n" ;
    print"Présentation\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
    print"Règles générales\n" ;
    print"</li>\n";
    print"<li>\n";
    print"Discussions générales\n" ;
    print"</li>\n";
    print"</ul>\n" ;


pied() ; 
?>