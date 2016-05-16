<?php //page qui affiche la programmation prévue par le streamer
  session_start();
  include("miseEnPage.php"); 
  include("affichelogin.php") ;
  include("getprogrammation.php") ;
  enTete() ;
    print"<header>\n" ;
    print"<img id=\"baniere\" src=\"baniere.jpg\" alt=\"banière twich\" >\n" ;
    affichelogin() ;
    print"<ul id=\"onglets\">\n" ;
    print"<li>\n" ;
	print"<a href=\"accueil.php\"> Accueil </a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
	print"<a href=\"forum.php\"> Forum </a>\n" ;
    print"</li>\n" ;
    print"<li class =\"active\">\n" ;
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
    date_default_timezone_set('Europe/Paris') ;
    getprogrammation(date('W'),date('N')) ;
    print"</section>\n" ;

pied() ; 
?>