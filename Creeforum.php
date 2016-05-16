<?php
	session_start() ;
	date_default_timezone_set('Europe/Paris') ;
	$text = pg_escape_string($_POST['text']) ;
	$text = nl2br($text);
	$sujet =pg_escape_string($_POST['sujet']) ;
	$sujet = nl2br($sujet);
	$nom_user =$_SESSION['login'] ;
	$jour = date('d') ;
	$mois = date('m') ;
	$annee = date('Y') ;
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $requete="SELECT * FROM profil WHERE nom_user ='$nom_user' ;";
    $reqt=pg_query($base,$requete) ;
    $tuple_courant = pg_fetch_assoc($reqt) ;
    $id_user = $tuple_courant['id_user'] ;
    $requete="SELECT * FROM forum ;";
    $reqt=pg_query($base,$requete) ;
    $nbTuple = pg_num_rows($reqt) ;
    $requete="INSERT INTO forum VALUES ($nbTuple + 1,'$id_user','$text','$annee-$mois-$jour','$sujet') ;";
    $reqt=pg_query($base,$requete) ;
    header('Location: forum.php');

?>