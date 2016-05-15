<?php
	function getinfo()
	{
		$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site");
    	$requete="SELECT * FROM news ORDER BY id_news;";
    	$reqt=pg_query($base,$requete) ;
    	$tuple_courant = pg_fetch_assoc($reqt) ;
    	print"<ul>" ;
    	while($tuple_courant)
    	{
    		print"<li>\n" ;
    		$nom_news = $tuple_courant['nom_news'] ;
    		$decrip_news = $tuple_courant['descrip_news'] ;
    		$date = $tuple_courant['date_news'] ;
    		print"$date : $nom_news <br/> $decrip_news \n" ;
    		print"</li>\n" ;
    		$tuple_courant = pg_fetch_assoc($reqt) ;
    	}
    	print"</ul>\n" ;
    	pg_close($base) ;

	}


?>