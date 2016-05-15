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
    $tuples_courant = pg_fetch_assoc($reqt) ;
    $nb_tuples=pg_num_rows($reqt) ;
      if($nb_tuples == 1)
         {
         	$id = $tuples_courant['id_cast'] ;
         	if($tuples_courant['id_cast'] == $nb_tuples)
         	{
         		$requete="SELECT * FROM emission ;";
    			$reqt=pg_query($base,$requete) ;
    			$nb_tuples = pg_num_rows($reqt) ;
         		$requete="DELETE FROM emission WHERE id_cast='$id';";
         		$reqt=pg_query($base,$requete) ;
         		$requete="UPDATE emission SET id_cast = '$id' WHERE id_cast = '$nb_tuples';";
    			$reqt=pg_query($base,$requete) ;
         	}
         	else
         	{
         		$requete="DELETE FROM emission WHERE id_cast='$id';";
         		$reqt=pg_query($base,$requete) ;
         	}
         	header('Location: profil.php');
         }
       else
       {
       		header('Location: profil.php');
       }
     pg_close( $base );
     pied() ; 



?>