


<?php //page de contact du streamer pour lui envoyer un message quand le stream n'est pas diffusé
  include("miseEnPage.php"); 
  include("affichelogin.php") ;
  session_start();
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
    print"<li class =\"active\">\n" ;
	print"<a href=\"contact.php\">Contact</a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
    print"<a href=\"profil.php\">Profil</a>\n" ;
    print"</li>\n" ;
    print"</ul>\n" ;
    print"</header>\n" ;
    print"<section>\n" ;
    print"<form action=\"EnvoiMessage.php\" method=\"post\">\n";
    print"<br/>\n" ;
    print"<p>Sujet</p>" ;
    print"<input type=\"text\" name=\"sujet\"><br/><br/>\n" ;
    print"<p>Message</p>" ;
    print"<textarea cols=\"100\" rows=\"8\" name=\"text\"></textarea><br/><br/>\n" ;
    print"<input type=\"submit\" value=\"Envoyer\" name=\"bouton1\"/>\n";
    print"</form>\n";
    print"</section>\n" ;

pied() ; 
?>