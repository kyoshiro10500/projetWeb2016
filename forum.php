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
    print"<section>\n" ;
    print"<ul id=\"programmation\">\n" ;
    print"<li class=\"centrage\">\n" ;
    print"<a href=\"presentation_forum.php\" class=\"nolink\">Présentation\n</a><br/><br/>" ;
    print"Apprenons à nous connaitre pour mieux pouvoir communiquer\n";
    print"</li>\n" ;
    print"<li class=\"centrage\">\n" ;
    print"<a href=\"regles_forum.php\" class=\"nolink\">Règles générales\n</a><br/><br/>" ;
    print"Les règles du forum, à lire avant de poster\n";
    print"</li>\n";
    print"<li class=\"centrage\">\n";
    print"<a href=\"discussions_forum.php\" class=\"nolink\">Discussions générales</a><br/><br/>\n" ;
    print"Discutons de tout, de rien !\n";
    print"</li>\n";
    print"</ul>\n" ;
    print"</section>\n" ;



pied() ; 
?>