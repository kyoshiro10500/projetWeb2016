<?php
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
	$nom = pg_escape_string($_POST['nomEmission']) ;
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