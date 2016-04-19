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
if (isset($_POST['nom_user']) && (!empty($_POST['nom_user'])) && (isset($_POST['password_user']) && (!empty($_POST['password_user']))))
  {

   $base=pg_connect("host=localhost port=5000 dbname=Site user=postgres password=Site"); 
   // on teste si le couple username/password est bien dans la base de donnee
   $user = $_POST['nom_user'];
   $mdp = $_POST['password_user'] ;
   $requete="SELECT * FROM profil WHERE nom_user = '$user' AND password_user = '$mdp' ;";
   $reqt=pg_query($base,$requete) ;
   $nb_tuples=pg_num_rows($reqt) ;
      if($nb_tuples ==1)
         {
            session_start();
            $_SESSION['login'] = $user; 
         }
   // si on a pas de resultat, l'utilisateur s'est trompé soit dans son username, soit dans son password
      else
         {
            $erreur = 'Compte non reconnu.';
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
    print"</br>" ;
    print"<a href=\"login.php\" id=\"login\">Retour au login</a>\n" ;
    print"</section>" ;
    pied() ;
  }
  else
  {
    header('Location: accueil.php');
  }
?>

