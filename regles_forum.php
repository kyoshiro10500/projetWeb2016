<?php
	session_start();
    include("miseEnPage.php"); 
    include("affichelogin.php") ;
    include("getpost.php") ;
    include("script.php") ;
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
    print"<a href=\"forum.php\" class=\"nolink2\"> Forum >> </a>" ;
    getpost(2);
    print"</section>\n" ;
    if(!empty($_SESSION['login']))
    {
    print"<section>\n" ;
    script2() ;
    print"<form action=\"Creepost.php\" method=\"post\" onsubmit=\"return verifForm7(this)\">\n";
    print"<br/>\n" ;
    print"<p>Message (500 caractères maximum)</p>" ;
    print"<textarea cols=\"97\" rows=\"4\" name=\"text\" onblur=\"verifText(this)\"></textarea><br/><br/>\n" ;
    print"<input type=\"hidden\" name=\"id_forum\" value=\"2\" />\n" ;
    print"<input type=\"submit\" value=\"Répondre\" name=\"bouton1\"/>\n";
    print"</form>\n";
    print"</section>\n" ;
    }


?>