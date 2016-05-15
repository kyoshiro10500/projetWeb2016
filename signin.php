<?php
//formulaire de creation de compte
//nom_user,password_user,confirmation_password,mail_user
include("miseEnPage.php"); 
include("affichelogin.php") ;
  enTete() ;
  include("script.php") ;
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
    print"<form action=\"signin_bdd.php\" method=\"post\" onsubmit=\"return verifForm2(this)\">\n";
    print"<br/>\n" ;
    print"<p>Nom d'utilisateur (6 caractères minimum)</p>" ;
    print"<input type=\"text\" name=\"nom_user\" onblur=\"verifPseudo(this)\"/><br/><br/>\n" ;
    print"<p>Mail</p>" ;
    print"<input type=\"text\" name=\"mail_user\" onblur=\"verifMail(this)\"/><br/><br/>\n" ;
    print"<p>Mot de passe (6 caractères minimum)</p>" ;
    print"<input type=\"password\" name=\"password_user\" onblur=\"verifmdp(this)\"/><br/><br/>\n" ;
    print"<p>Confirmation du mot de passe</p>" ;
    print"<input type=\"password\" name=\"confirmation_password_user\" onblur=\"verifmdp(this)\"/><br/><br/>\n" ;
    print"<p>Age</p>" ;
    print"<input type=\"number\" name=\"age\" step=\"1\" value=\"1\" min=\"1\" max=\"100\"><br/><br/>\n" ;
    print"<input type=\"submit\" value=\"Envoyer\" name=\"bouton1\"/>\n";
    print("<br/><br/><br/><br/>") ;
    print"</form>\n";
    print"</section>\n" ;

pied() ; 
?>
