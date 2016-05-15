<?php
	function getprogramme()
	{
		$jour = date('N') ;
		$semaine = date('W') ;
        $base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
		$requete="SELECT * FROM programme NATURAL JOIN emission WHERE id_semaine = '$semaine' AND id_jour = '$jour' ORDER BY id_heure_debut ;";
    	$reqt=pg_query($base,$requete) ;
    	$tuples_courant = pg_fetch_assoc($reqt) ;
    	print"<ul>\n" ;
    	while($tuples_courant)
    	{
    		$heure_debut = $tuples_courant['id_heure_debut'] ;
    		$heure_fin = $tuples_courant['id_heure_fin'] ;
    		$nom_emission = $tuples_courant['nom_cast'] ;
    		print"<li>\n" ;
    		print"$heure_debut - $heure_fin : $nom_emission\n" ;
    		print"</li>\n" ;
    		$tuples_courant = pg_fetch_assoc($reqt) ;
    	}
    	print"</ul>\n";
	}
?>