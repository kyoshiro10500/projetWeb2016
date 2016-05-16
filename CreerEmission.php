<?php
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
	$nom = pg_escape_string($_POST['nomEmission']) ;
	$description = pg_escape_string($_POST['description']) ;
  $description = nl2br($description);
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