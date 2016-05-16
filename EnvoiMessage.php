<?php //page qui traite l'envoi d'un message au streamer
  include("miseEnPage.php"); 
  include("affichelogin.php") ;
  session_start();
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
    print"<li class =\"active\">\n" ;
	print"<a href=\"contact.php\">Contact</a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
    print"<a href=\"profil.php\">Profil</a>\n" ;
    print"</li>\n" ;
    print"</ul>\n" ;
    print"</header>\n" ;
    print"<section>\n" ;

    if(isset($_SESSION['login']))
    {
        $nom_envoi = pg_escape_string($_SESSION['login']) ;
        $base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site");
        $nomdest = pg_escape_string($_POST['nomdest']) ;
        $requete="SELECT * FROM profil WHERE nom_user = '$nomdest' ;";
        $reqt=pg_query($base,$requete) ;
        $nb_tuples=pg_num_rows($reqt) ;
        $tuple_courant = pg_fetch_assoc($reqt) ;
        if($nb_tuples == 1)
         {
            $id_dest = $tuple_courant['id_user'] ;
            $requete="SELECT * FROM profil WHERE nom_user = '$nom_envoi' ;";
            $reqt=pg_query($base,$requete) ;
            $nb_tuples=pg_num_rows($reqt) ;
            $tuple_courant = pg_fetch_assoc($reqt) ;
            $id_envoi = $tuple_courant['id_user'] ;
            $requete="SELECT * FROM messageprive ;";
            $reqt=pg_query($base,$requete) ;
            $nb_tuples=pg_num_rows($reqt) ;
            $message = pg_escape_string($_POST['text']) ;
            $message = nl2br($message);
            $sujet = pg_escape_string($_POST['sujet']) ;
            $requete="INSERT INTO messageprive VALUES ($nb_tuples + 1,'$id_dest','$id_envoi','$message','$sujet') ;";
            $reqt=pg_query($base,$requete) ;
            $nb_tuples=pg_num_rows($reqt) ;
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