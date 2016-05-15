
  <?php //page d'accueil du site où se trouve le stream, le chat et les infos & anecdotes
  include("miseEnPage.php"); 
  include("affichelogin.php") ;
  include("getinfo.php") ;
  session_start();
  enTete() ;
    print"<header>\n" ;
    print"<img id=\"baniere\" src=\"banière.jpg\" alt=\"banière twich\" >\n" ;
    affichelogin() ;
    print"<ul id=\"onglets\">\n" ;
    print"<li class =\"active\">\n" ;
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
    print"<section>\n" ;
    print"<br/>\n";
    print"<iframe src=\"https://player.twitch.tv/?channel=ogamingsc2\" frameborder=\"0\" scrolling=\"no\" height=\"500\" width=\"800\"></iframe>\n" ;
    print"<iframe src=\"https://www.twitch.tv/ogamingsc2/chat?popout=\" frameborder=\"0\" scrolling=\"no\" height=\"500\" width=\"382\"></iframe>\n" ;
    print"</section>" ;
    print"<section>" ;
    getinfo() ;
    print"</section>" ;
pied() ; 
?>
