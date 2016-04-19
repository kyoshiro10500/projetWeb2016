<?php //page qui traite l'envoi d'un message au streamer
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
    print"<li class =\"active\">\n" ;
	print"<a href=\"contact.php\">Contact</a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
    print"<a href=\"profil.php\">Profil</a>\n" ;
    print"</li>\n" ;
    print"</ul>\n" ;
    print"</header>\n" ;
    print"<section>\n" ;
    
    //creation d'un message sur la bdd pour l'user $nom_user 
    //$text = texte du message
    //$sujet = sujet du text
    //$nom_dest = nom du destinataire
    //$nom_envoi = nom du gens qui a envoyé le message

    //schema classique de connection a bdd
    //on verifie que $nom_dest existe
    //on fait une requete insert into ...
    //on verifie que ça a fonctionné

    print '</section>';

pied() ; 
?>