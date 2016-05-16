<?php
   $base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
   $user = pg_escape_string($_POST['nomuser']);
   $requete="SELECT * FROM profil WHERE nom_user = '$user' ;";
   $reqt=pg_query($base,$requete) ;
   $tuple_courant = pg_fetch_assoc($reqt) ;
   $nb_tuples=pg_num_rows($reqt) ;
      if($tuple_courant['lvl_user'] >0)
      {
         header('Location: profil.php');
      }
      else if($nb_tuples ==1 && $tuple_courant['lvl_user'] == 0)
         {
            $requete="UPDATE profil SET lvl_user = '1' WHERE nom_user = '$user' ;";
            $reqt=pg_query($base,$requete) ;
            header('Location: profil.php');
         }


?>