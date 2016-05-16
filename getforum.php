<?php

function getforum()
{
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $requete="SELECT * FROM forum ORDER BY id_forum ;";
    $reqt=pg_query($base,$requete) ;
    $tuples_courant = pg_fetch_assoc($reqt) ;
    print"<ul id=\"programmation\">\n" ;
    while($tuples_courant)
    {
        print"<li class=\"centrage\">\n" ;
        $id_forum = $tuples_courant['id_forum'] ;
        $createur = $tuples_courant['forum_creator'] ;
        $base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    	$requete="SELECT * FROM profil WHERE id_user='$createur' ;";
    	$reqt2=pg_query($base,$requete) ;
    	$tuples_courant2 = pg_fetch_assoc($reqt2) ;
    	$createur = $tuples_courant2['nom_user'] ;
        $texte = $tuples_courant['forum_texte'] ;
        $date = $tuples_courant['forum_time'] ;
        $sujet = $tuples_courant['forum_sujet'] ;
        print"$date - $createur:\n" ;
        echo'<a href="forumtopic.php?variable='.$id_forum.'">'.$texte.'</a><br/>';
        print"$texte\n" ;
        print"</li>\n" ;
        $tuples_courant = pg_fetch_assoc($reqt) ;
    }
    print"</ul>\n" ;
}




?>