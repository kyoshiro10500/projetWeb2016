<?php
	session_start() ;
	include("miseEnPage.php"); 
  	include("affichelogin.php") ;
  	include("getprofil.php") ;
  	include("getpanel.php") ;
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
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
	$nom = $_POST['nomEmission'] ;
	$description = $_POST['description'] ;
    $requete="SELECT * FROM emission WHERE nom_cast = '$nom' ;";
    $reqt=pg_query($base,$requete) ;
    $nb_tuples=pg_num_rows($reqt) ;
      if($nb_tuples == 0)
         {
         	$requete="SELECT * FROM emission ;";
    		$reqt=pg_query($base,$requete) ;
    		$nb_tuples=pg_num_rows($reqt) ;
    		$id = $nb_tuples + 1 ;
         	$requete="INSERT INTO emission VALUES ('$id','$nom','$description') ;";
         	$reqt=pg_query($base,$requete) ;
         	header('Location: profil.php');
         }
       else
       {
       		header('Location: profil.php');
       }
     pg_close( $base );
     pied() ; 
?>