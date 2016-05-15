<?php
	$nom = pg_escape_string($_POST['nomnews']) ;
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $requete="SELECT * FROM news WHERE nom_news ='$nom' ;";
    $reqt=pg_query($base,$requete) ;
    $nbtuple = pg_num_rows($reqt) ;
    $tuple_courant = pg_fetch_assoc($reqt) ;
    $id = $tuple_courant['id_news'] ;
    if($nbtuple == 1)
    {
    	$requete="DELETE FROM news WHERE id_news = '$id' ;";
    	$reqt=pg_query($base,$requete) ;
        $requete="SELECT * FROM news ORDER BY id_news ;";
        $reqt=pg_query($base,$requete) ;
        $tuple_courant = pg_fetch_assoc($reqt) ;
        while($tuple_courant)
        {
            if($tuple_courant['id_news']>$id)
            {
                $id2 = $tuple_courant['id_news'] ;
                $id3 = $id2 - 1 ;
                $requete="UPDATE news SET id_news = '$id3' WHERE id_news = '$id2' ;";
                pg_query($base,$requete) ;
            }
            $tuple_courant = pg_fetch_assoc($reqt) ;
        }
    	header('Location: profil.php');
    }
    else
    {
    	header('Location: profil.php');
    }


?>