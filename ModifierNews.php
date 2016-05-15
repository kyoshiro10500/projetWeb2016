<?php
	$nom = $_POST['nomnews'] ;
	$description = $_POST['description'] ;
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $requete="SELECT * FROM news WHERE nom_news ='$nom' ;";
    $reqt=pg_query($base,$requete) ;
    $nbtuple = pg_num_rows($reqt) ;
    if($nbtuple == 1)
    {
    	$requete="UPDATE news SET descrip_news = '$description' WHERE nom_news = '$nom' ;";
        $reqt=pg_query($base,$requete) ;
        header('Location: profil.php');
    }
    else
    {
    	header('Location: profil.php');
    }


?>