<?php //page de profil de la personne
  session_start() ;
  include("miseEnPage.php"); 
  include("affichelogin.php") ;
  include("getprofil1.php") ;
  include("getmessage.php") ;
  include("script.php") ;
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
    print"<li>\n" ;
    print"<a href=\"programmation.php\">Programmation</a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
	print"<a href=\"contact.php\">Contact</a>\n" ;
    print"</li>\n" ;
    print"<li class =\"active\">\n" ;
    print"<a href=\"profil.php\">Profil</a>\n" ;
    print"</li>\n" ;
    print"</ul>\n" ;
    print"</header>\n" ;
    if(!isset($_SESSION['login']))
    {
        print"<section>\n" ;
        print"<span>Veuillez vous connecter</span>\n" ;
        print"</section>\n" ;
    }
    else
    {
        getprofil1($_SESSION['login']) ;
        script() ;
        getmessage($_SESSION['login']) ;
    }
    pied() ; 
?>