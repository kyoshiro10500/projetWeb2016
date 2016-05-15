<?php
	$nom = $_POST['nomnews'] ;
	$description = $_POST['description'] ;
	$jour = date('d') ;
	$mois = date('m') ;
	$annee = date('Y') ;
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $requete="SELECT * FROM news WHERE nom_news ='$nom' ;";
    $reqt=pg_query($base,$requete) ;
    $nbtuple = pg_num_rows($reqt) ;
    if($nbtuple == 0)
    {
    	$requete="SELECT * FROM news ;";
    	$reqt=pg_query($base,$requete) ;
    	$nbtuple = pg_num_rows($reqt) ;
    	if($nbtuple == 10)
    	{
    		$requete="DELETE FROM news WHERE id_news = 10 ;" ;
    		$reqt=pg_query($base,$requete) ;
    	}
    	$requete="SELECT * FROM news ORDER BY id_news DESC ;" ;
    	$reqt=pg_query($base,$requete) ;
    	$tuple_courant = pg_fetch_assoc($reqt) ;
    	while($tuple_courant)
    	{
    		$id = $tuple_courant['id_news'] ;
    		$requete="UPDATE news SET id_news = id_news + 1 WHERE id_news = '$id' ;" ;
    		pg_query($base,$requete) ;
    		$tuple_courant = pg_fetch_assoc($reqt) ;

    	}
    	$requete="INSERT INTO news VALUES ('1','$nom','$description','$annee-$mois-$jour') ;";
    	$reqt=pg_query($base,$requete) ;
    	header('Location: profil.php');
    }
    else
    {
    	header('Location: profil.php');
    }


?>