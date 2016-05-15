<?php

function getprogrammation($semaine,$jour)
{
	setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
	print"<h1 class=\"underl\">\n" ;
	echo (strftime("%A %d %B"));
	print"</h1>\n" ;
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $requete="SELECT * FROM programme NATURAL JOIN emission WHERE id_semaine = '$semaine' AND id_jour = '$jour' ORDER BY id_heure_debut ;";
    $reqt=pg_query($base,$requete) ;
    $nb_tuples=pg_num_rows($reqt) ;
    $tuples_courant = pg_fetch_assoc($reqt) ;
      if($nb_tuples >0)
         {
         	print"<ul id=\"programmation\">\n" ;
            while($tuples_courant)
            {
            	print"<li class=\"centrage\">\n" ;
            	$nomEmission = $tuples_courant['nom_cast'] ;
            	$description = $tuples_courant['descrip_cast'];
            	$heuredeb = $tuples_courant['id_heure_debut'] ;
            	$heurefin = $tuples_courant['id_heure_fin'] ;
            	print"$nomEmission : $heuredeb h - $heurefin h\n" ;
            	print"<br/>\n";
                print"<br/>\n";
            	print"$description\n" ;
            	print"</li>\n" ;
                $tuples_courant = pg_fetch_assoc($reqt) ;
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