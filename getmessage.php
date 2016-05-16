<?php
	function getmessage($user)
	{
		print"<section id=\"panel\">" ;
		$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site");
		$requete="SELECT * FROM profil WHERE nom_user = '$user' ;";
    	$reqt=pg_query($base,$requete) ;
    	$tuple_courant = pg_fetch_assoc($reqt) ;
    	$id = $tuple_courant['id_user'] ;
    	$requete="SELECT * FROM messageprive WHERE id_dest = '$id' ORDER BY id_message DESC;";
    	$reqt=pg_query($base,$requete) ;
    	$tuple_courant = pg_fetch_assoc($reqt) ;
    	$nbTuple = pg_num_rows($reqt) ;
    	if($nbTuple == 0)
    	{
    		print"<ul id=\"programmation\">" ;
    		print"<li class=\"centrage\">\n" ;
    		print"Pas de nouveaux messages" ;
    		print"</li>\n" ;
    		print"</ul>\n" ;
    	}
    	print"<ul id=\"programmation\">" ;
    	while($tuple_courant)
    	{
    		print"<li class=\"centrage\">\n" ;
    		$id2 = $tuple_courant['id_exp'] ;
    		$requete="SELECT * FROM profil WHERE id_user = '$id2' ;";
    		$reqt2=pg_query($base,$requete) ;
    		$tuple_courant2 = pg_fetch_assoc($reqt2) ;
    		$nomexp = $tuple_courant2['nom_user'] ;
    		$message = $tuple_courant['message'] ;
    		$sujet = $tuple_courant['sujet'] ;
    		print"$nomexp : $sujet <br/> $message \n" ;
    		print"</li>\n" ;
    		$tuple_courant = pg_fetch_assoc($reqt) ;
    	}
    	print"</ul>\n" ;
		print"</section>" ;
	}

?>