<?php

function getprogrammation($semaine,$jour)
{
	setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
	print"<h1>\n" ;
	echo (strftime("%A %d %B"));
	print"</h1>\n" ;
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $requete="SELECT * FROM programme NATURAL JOIN emission WHERE programme.id_semaine = '$semaine' AND programme.id_jour = '$jour' ORDER BY programme.id_heure_debut ;";
    $reqt=pg_query($base,$requete) ;
    $nb_tuples=pg_num_rows($reqt) ;
    $tuples_courant = pg_fetch_assoc($reqt) ;
      if($nb_tuples >0)
         {
         	print"<ul id=\"prog\">\n" ;
            while($tuple_courant)
            {
            	print"<li>\n" ;
            	$nomEmission = $tuple_courant['nom_cast'] ;
            	$description = $tuple_courant['descrip_cast'];
            	$heuredeb = $tuple_courant['id_heure_debut'] ;
            	$heurefin = $tuple_courant['id_heure_fin'] ;
            	print"$nomEmission : $heuredeb - $heurefin\n" ;
            	print"<br/>\n";
            	print"$description\n" ;
            	print"</li>\n" ;
            }
            print"</ul>\n" ;
         }
       else
       {
       		print"<span>Aucune programmation aujourd'hui</span>\n" ;
       }
     pg_close( $base );
}

?>