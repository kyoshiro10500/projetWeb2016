<?php
function getnews()
{
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $requete="SELECT * FROM news ORDER BY nom_news ;";
    $reqt=pg_query($base,$requete) ;
    $tuples_courant = pg_fetch_assoc($reqt) ;
    print"<ul>\n" ;
    while($tuples_courant)
    {
        print"<li class=\"nopuce\">\n" ;
        $nomnews = $tuples_courant['nom_news'] ;
        print"$nomnews\n" ;
        print"</li>\n" ;
        $tuples_courant = pg_fetch_assoc($reqt) ;
    }
    print"</ul>\n" ;
}



?>