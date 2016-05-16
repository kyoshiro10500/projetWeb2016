<?php
	$erreur = 0 ;
	$semaine = $_POST['semaine'] ;
	$jour = $_POST['jour'] ;
	$heure_deb = $_POST['heuredeb'] ;
	$heure_fin = $_POST['heurefin'] ;
	$nom_emission = pg_escape_string($_POST['nomcast']) ;
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
	$requete="SELECT * FROM programme WHERE id_semaine='$semaine' AND id_jour='$jour' AND id_heure_debut='$heure_deb' AND id_heure_fin='$heure_fin' ;";
	$reqt =pg_query($base,$requete) ;
	$nbTuple = pg_num_rows($reqt) ;
	if($nbTuple == 0)
	{
		if($heure_deb >= $heure_fin)
		{
			$erreur = 1 ;
		}
		$requete="SELECT * FROM programme WHERE id_semaine='$semaine' AND id_jour ='$jour' ;";
		$reqt =pg_query($base,$requete) ;
		$tuple_courant =pg_fetch_assoc($reqt) ;
		while($tuple_courant)
		{
			if($tuple_courant['id_heure_debut'] <= $heure_deb && $heure_deb < $heure_fin && $heure_fin <= $tuple_courant['id_heure_fin'])
			{
				$erreur = 1 ;
			}
			else if($tuple_courant['id_heure_debut'] <= $heure_deb && $heure_deb <= $tuple_courant['id_heure_fin'] && $tuple_courant['id_heure_fin'] < $heure_fin)
			{
				$heure_deb = $tuple_courant['id_heure_fin'] ;
			}
			else if($heure_deb < $tuple_courant['id_heure_debut'] && $tuple_courant['id_heure_debut'] < $heure_fin && $heure_fin <= $tuple_courant['id_heure_fin'])
			{
				$heure_fin = $tuple_courant['id_heure_debut'] ;
			}
			else if($heure_deb <= $tuple_courant['id_heure_debut'] && $tuple_courant['id_heure_debut'] < $tuple_courant['id_heure_fin'] && $tuple_courant['id_heure_fin']<= $heure_fin)
			{
				$erreur = 1 ;
			}
			$tuple_courant =pg_fetch_assoc($reqt) ;
		}
		$requete="SELECT * FROM emission WHERE nom_cast = '$nom_emission' ;";
		$reqt =pg_query($base,$requete) ;
		$nbTuple = pg_num_rows($reqt) ;
		if($nbTuple == 1 && $erreur == 0)
		{
			$tuple_courant = pg_fetch_assoc($reqt) ;
			$id = $tuple_courant['id_cast'] ;
			$requete="INSERT INTO programme VALUES ('$semaine','$jour','$heure_deb','$heure_fin','$id') ;";
			$reqt = pg_query($base,$requete) ;
			header('Location: profil.php');
		}
		else
		{
			header('Location: profil.php');
		}
	}
	else
	{
		header('Location: profil.php');
	}


?>