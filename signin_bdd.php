<?php
include("miseEnPage.php"); 
  include("affichelogin.php") ;
  enTete() ;
    print"<header>\n" ;
    print"<img id=\"baniere\" src=\"banière.jpg\" alt=\"banière twich\" >\n" ;
    affichelogin() ;
    print"<ul id=\"onglets\">\n" ;
    print"<li>\n" ;
  print"<a href=\"accueil.php\"> Accueil </a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
  print"<a href=\"forum.php\"> Forum </a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
    print"<a href=\"programmation.php\">Programmation</a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
  print"<a href=\"contact.php\">Contact</a>\n" ;
    print"</li>\n" ;
    print"<li>\n" ;
    print"<a href=\"profil.php\">Profil</a>\n" ;
    print"</li>\n" ;
    print"</ul>\n" ;
    print"</header>\n" ;
// on test si les champs sont vides 
if ((isset($_POST['nom_user']) && !empty($_POST['nom_user'])) && (isset($_POST['mail_user']) && !empty($_POST['mail_user'])) && (isset($_POST['password_user']) && !empty($_POST['password_user'])) && (isset($_POST['confirmation_password_user']) && !empty($_POST['confirmation_password_user']))) 
  {
  // on teste si les deux mots de passe sont identiques 
    if ($_POST['password_user'] != $_POST['confirmation_password_user']) 
      {
        $erreur = 'Les deux mots de passe sont différents.';
        break ;
      }
      else 
      {
        $base = pg_connect( "host=localhost port=5000 dbname=Site user=postgres password=Site" );
      }
    $user = pg_escape_string($_POST['nom_user']);
    $mdp = pg_escape_string($_POST['password_user']) ;
    $mail =pg_escape_string($_POST['mail_user']) ;

    $requete = "SELECT * FROM profil WHERE nom_user='$user' ;";
    $reqt = pg_query($base,$requete) ;
    if ($reqt) 
     {
       $nbTuples = pg_num_rows($reqt) ;
       if($nbTuples == 0)
       {
        date_default_timezone_set('Europe/Paris') ;
        $requete = "SELECT * FROM profil ;" ;
        $reqt = pg_query($base,$requete) ;
        $nbTuples = pg_num_rows($reqt) ;
        $jour = date('d');
        $mois = date('m'); 
        $annee = date('o');
        $age = $_POST['age'] ;
        $requete = "INSERT INTO profil(id_user,lvl_user,nom_user,password_user,mail_user,membre_post,membre_inscrit,membre_last_visit,id_img_user,id_ban,age_user) VALUES($nbTuples+1,'0','$user','$mdp','$mail','0','$annee-$mois-$jour','$annee-$mois-$jour','1','0','$age') ;";
        pg_query($base,$requete) ;
        session_start();
        $_SESSION['login'] = $user ;
        pg_close( $base );
       }
       else 
       {
         $erreur = 'Un membre possède déjà ce login.';
       }
      }

  }
else
  {
    $erreur = 'Au moins un des champs est vide.';
  }
    if(!empty($erreur))
  {
    print"<section>" ;
    print"$erreur" ;
    print"<br/>" ;
    print"<a href=\"login.php\" id=\"login\">Retour au login</a>\n" ;
    print"</section>" ;
    pied() ;
  }
  else
  {
    header('Location: accueil.php');
  }
?>
