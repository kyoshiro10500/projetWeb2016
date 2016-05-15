<?php
function getemission()
{
	$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
    $requete="SELECT * FROM emission ORDER BY nom_cast ;";
    $reqt=pg_query($base,$requete) ;
    $tuples_courant = pg_fetch_assoc($reqt) ;
    print"<ul>\n" ;
    while($tuples_courant)
    {
        print"<li class=\"nopuce\">\n" ;
        $nomEmission = $tuples_courant['nom_cast'] ;
        print"$nomEmission\n" ;
        print"</li>\n" ;
        $tuples_courant = pg_fetch_assoc($reqt) ;
    }
    print"</ul>\n" ;
}



?>