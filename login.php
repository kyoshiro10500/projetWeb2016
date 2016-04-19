<?php
//formulaire de conection
//nom_user, password_user
include("miseEnPage.php"); 
  include("affichelogin.php") ;
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
    print"<form action=\"login_bdd.php\" method=\"post\">\n";
    print"<br/>\n" ;
    print"<p>Nom d'utilisateur</p>" ;
    print"<textarea cols=\"25\" rows=\"1\" name=\"nom_user\"></textarea></br></br>\n" ;
    print"<p>Mot de passe</p>" ;
    print"<textarea cols=\"25\" rows=\"1\" name=\"password_user\"></textarea></br></br>\n" ;
    print"<input type=\"submit\" value=\"Envoyer\" name=\"bouton1\"/>\n";
    print("</br></br></br></br>") ;

    //rajouter un champs hidden qui passe le nom de celui qui envoie $nom_envoi

    print"</form>\n";
    print"</section>\n" ;

pied() ; 
?>

