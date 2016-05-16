<?php
	session_start() ;
	$text = pg_escape_string($_POST['text']) ;
	$text = nl2br($text);

	$id_forum =$_POST['id_forum'] ;
	$nom_user =$_SESSION['login'] ;
	$jour = date('d') ;
	$mois = date('m') ;
	$annee = date('Y') ;
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $requete="SELECT * FROM profil WHERE nom_user ='$nom_user' ;";
    $reqt=pg_query($base,$requete) ;
    $tuple_courant = pg_fetch_assoc($reqt) ;
    $id_user = $tuple_courant['id_user'] ;
    if($id_forum == 1)
    {
    	$requete="SELECT * FROM forum1_post ;";
    	$reqt=pg_query($base,$requete) ;
    	$nbTuple = pg_num_rows($reqt) ;
    	$requete="INSERT INTO forum1_post VALUES ($nbTuple + 1,'$id_user','$text','$annee-$mois-$jour') ;";
    	$reqt=pg_query($base,$requete) ;
    	header('Location: presentation_forum.php');
    }
    if($id_forum == 2)
    {
    	$requete="SELECT * FROM forum2_post ;";
    	$reqt=pg_query($base,$requete) ;
    	$nbTuple = pg_num_rows($reqt) ;
    	$requete="INSERT INTO forum2_post VALUES ($nbTuple + 1,'$id_user','$text','$annee-$mois-$jour') ;";
    	$reqt=pg_query($base,$requete) ;
    	header('Location: regles_forum.php');
    }
    if($id_forum == 3)
    {
    	$requete="SELECT * FROM forum3_post ;";
    	$reqt=pg_query($base,$requete) ;
    	$nbTuple = pg_num_rows($reqt) ;
    	$requete="INSERT INTO forum3_post VALUES ($nbTuple + 1,'$id_user','$text','$annee-$mois-$jour') ;";
    	$reqt=pg_query($base,$requete) ;
    	header('Location: discussions_forum.php');
    }





?>