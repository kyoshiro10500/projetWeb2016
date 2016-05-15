<?php
//formulaire de conection
//nom_user, password_user
include("miseEnPage.php"); 
  include("affichelogin.php") ;
  include("script.php") ;
  enTete() ;
    print"<header>\n" ;
    print"<img id=\"baniere\" src=\"banière.jpg\" alt=\"banière twich\" >\n" ;
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
    print"<li>\n" ;
    print"<a href=\"profil.php\">Profil</a>\n" ;
    print"</li>\n" ;
    print"</ul>\n" ;
    print"</header>\n" ;
    print"<section>\n" ;
    script() ;
    print"<form action=\"login_bdd.php\" method=\"post\" onsubmit=\"return verifForm1(this)\">\n";
    print"<br/>\n" ;
    print"<p>Nom d'utilisateur</p>" ;
    print"<input type=\"text\" name=\"nom_user\" onblur=\"verifPseudo(this)\"/><br/><br/>\n" ;
    print"<p>Mot de passe</p>" ;
    print"<input type=\"password\" name=\"password_user\" onblur=\"verifmdp(this)\"/><br/><br/>\n" ;
    print"<input type=\"submit\" value=\"Se connecter\" name=\"bouton1\"/>\n";
    print("<br/><br/><br/><br/>") ;
    print"</form>\n";
    print"</section>\n" ;

pied() ; 
?>

