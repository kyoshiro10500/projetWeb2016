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
    $requete="SELECT * FROM forum_post ;";
    $reqt=pg_query($base,$requete) ;
    $nbTuple = pg_num_rows($reqt) ;
    $requete="INSERT INTO forum_post VALUES ($nbTuple + 1,'$id_forum','$id_user','$text','$annee-$mois-$jour') ;";
    $reqt=pg_query($base,$requete) ;
    $requete="UPDATE profil SET membre_post = membre_post +1 WHERE id_user='$id_user' ;";
    $reqt=pg_query($base,$requete) ;
    header('Location: forum.php');

?>