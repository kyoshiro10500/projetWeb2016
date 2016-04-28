<?php //page qui traite l'envoi d'un message au streamer
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
    
    //creation d'un message sur la bdd pour l'user $nom_user 
    //$text = texte du message
    //$sujet = sujet du text
    //$nom_envoi = nom du gens qui a envoyé le message

    //schema classique de connection a bdd
    //on verifie que $nom_dest existe
    //on fait une requete insert into ...
    //on verifie que ça a fonctionné

    if(isset($_SESSION['login']))
    {
        $nom_envoi = $_SESSION['login'] ;
        $base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
        $requete="SELECT * FROM profil WHERE lvl_user = 2 ;";
        $reqt=pg_query($base,$requete) ;
        $nb_tuples=pg_num_rows($reqt) ;
        $tuple_courant = pg_fetch_assoc($reqt) ;
        if($nb_tuples == 1)
         {

            //Rajouter le code pour l'envoit

            print"<section>\n" ;
            print"Le message a été envoyé\n" ;
            print"</section>\n" ;
         }
        else
         {
            print"<section>\n" ;
            print"Erreur : Le message n'a pas pu être envoyé" ;
            print"</section>\n" ;
         }
        pg_close( $base );
    }
    else
    {
        print"<section>\n" ;
        print"Veuillez vous connecter\n" ;
        print"</section>\n" ;
    }

pied() ; 
?>