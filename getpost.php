<?php
	function getpost($id_forum) 
	{
		$base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site");
		if($id_forum == 1)
    		$requete="SELECT * FROM forum1_post ORDER BY id_post;";
    	if($id_forum == 2)
    		$requete="SELECT * FROM forum2_post ORDER BY id_post;";
    	if($id_forum == 3)
    		$requete="SELECT * FROM forum3_post ORDER BY id_post;";
    	$reqt=pg_query($base,$requete) ;
    	$tuple_courant = pg_fetch_assoc($reqt) ;
    	print"<ul id=\"programmation\">" ;
    	while($tuple_courant)
    	{
    		print"<li class=\"centrage\">\n" ;
    		$texte = $tuple_courant['post_texte'] ;
    		$date = $tuple_courant['post_time'] ;
    		$id_creator = $tuple_courant['post_creator'] ;
    		$requete="SELECT * FROM profil WHERE id_user = '$id_creator' ;";
    		$reqt2=pg_query($base,$requete) ;
    		$tuple_courant2 = pg_fetch_assoc($reqt2) ;
    		$nom = $tuple_courant2['nom_user'] ;
    		print"$date : $nom <br/> $texte \n" ;
    		print"</li>\n" ;
    		$tuple_courant = pg_fetch_assoc($reqt) ;
    	}
    	print"</ul>\n" ;
    	pg_close($base) ;
	}



?>