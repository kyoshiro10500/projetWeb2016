<?php
	$semaine = $_POST['semaine'] ;
	$jour = $_POST['jour'] ;
	$heure_deb = $_POST['heuredeb'] ;
	$heure_fin = $_POST['heurefin'] ;
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
	$requete="SELECT * FROM programme WHERE id_semaine='$semaine' AND id_jour ='$jour' AND id_heure_debut = '$heure_deb' AND id_heure_fin = '$heure_fin' ;";
	$reqt =pg_query($base,$requete) ;
	$nbTuple = pg_num_rows($reqt) ;
	if($nbTuple == 1)
	{
		$requete="DELETE FROM programme WHERE id_semaine='$semaine' AND id_jour ='$jour' AND id_heure_debut='$heure_deb' AND id_heure_fin='$heure_fin' ;";
		$reqt =pg_query($base,$requete) ;
		header('Location: profil.php');
	}
	else
	{
		header('Location: profil.php');
	}


?>