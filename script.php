<?php

function script() 
{
	print"<script>
                function surligne(champ, erreur)
                {
                    if(erreur)
                        champ.style.backgroundColor = \"#fba\";
                    else
                        champ.style.backgroundColor = \"\";
                }
                function verifPseudo(champ)
                {
                    if(champ.value.length < 6 || champ.value.length > 25)
                    {
                        surligne(champ, true);
                        return false;
                    }
                    else
                    {
                        surligne(champ, false);
                        return true;
                    }
                }
                function verifmdp(champ)
                {
                    if(champ.value.length < 6)
                    {
                        surligne(champ, true);
                        return false;
                    }
                    else
                    {
                        surligne(champ, false);
                        return true;
                    }
                }
 
                function verifMail(champ)
				{
  					 var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
  					 if(!regex.test(champ.value))
  				 	{
     				 	surligne(champ, true);
    				    return false;
   					}
   					else
   					{
     					 surligne(champ, false);
     					 return true;
   					}
				}

                function verifForm1(f)
                {
                    var pseudoOk = verifPseudo(f.nom_user);
                    var mdpOk = verifmdp(f.password_user);
                    if(pseudoOk && mdpOk)
                        return true;
                    else
                    {
                        alert(\"Veuillez remplir correctement tous les champs\");
                        return false;
                    }
                }

                function verifForm2(f)
                {
                    var mailOk = verifMail(f.mail_user) ;
                    var pseudoOk = verifPseudo(f.nom_user);
                    var mdpOk = verifmdp(f.password_user);
                    var mdpVerifOk = verifmdp(f.confirmation_password_user) ;
                    if( mailOk && pseudoOk && mdpOk && mdpVerifOk)
                        return true;
                    else
                    {
                        alert(\"Veuillez remplir correctement tous les champs\");
                        return false;
                    }
                }

                function verifForm3(f)
                {
                    var mailOk = verifMail(f.newmail) ;
                    var pseudoOk = verifPseudo(f.newnom);
                    var mdpOk = verifmdp(f.mdp);
                    var newmdpOk = verifmdp(f.newmdp) ;
                    var newmdpverifOk = verifmdp(f.newmdpverif) ;
                    if(pseudoOk)
                        return true;
                    else if (mailOk)
                    {
                    	return true ;
                    }
                    else if( (newmdpOk && newmdpVerifOk && mdpOk))
                    {
                    	return true ;
                    }
                    else
                    {
                        alert(\"Veuillez remplir correctement au moins une des rubrique de changement\");
                        return false;
                    }
                }

               

        </script> " ;
}



function script2()
{
	print("<script>
				function surligne(champ, erreur)
                {
                    if(erreur)
                        champ.style.backgroundColor = \"#fba\";
                    else
                        champ.style.backgroundColor = \"\";
                }
                function verifSujet(champ)
                {
                    if(champ.value.length < 6)
                    {
                        surligne(champ, true);
                        return false;
                    }
                    else
                    {
                        surligne(champ, false);
                        return true;
                    }
                }
                function verifText(champ)
                {
                	if(champ.value.lenght > 500 || champ.value.length < 10)
                    {
                        surligne(champ, true);
                        return false;
                    }
                    else
                    {
                        surligne(champ, false);
                        return true;
                    }
                }
                function verifDescription(champ)
                {
                    if(champ.value.lenght > 250 || champ.value.length < 10)
                    {
                        surligne(champ, true);
                        return false;
                    }
                    else
                    {
                        surligne(champ, false);
                        return true;
                    }
                }
                function verifForm1(f)
                {
                    var SujetOk = verifSujet(f.sujet);
                    var TextOk = verifText(f.text);
                    if(SujetOk && TextOk)
                        return true;
                    else
                    {
                        alert(\"Veuillez remplir correctement tous les champs\");
                        return false;
                    }
                }
                function verifForm4(f)
                {
                    var NomemissionOk = verifSujet(f.nomEmission);
                    var DescriptionOk = verifDescription(f.description);
                    if(NomemissionOk && DescriptionOk)
                        return true;
                    else
                    {
                        alert(\"Veuillez remplir correctement tous les champs\");
                        return false;
                    }
                }
                function verifForm5(f)
                {
                    var NomemissionOk = verifSujet(f.nomEmission);
                    if(NomemissionOk)
                        return true;
                    else
                    {
                        alert(\"Veuillez remplir correctement tous les champs\");
                        return false;
                    }
                }
                function verifForm6(f)
                {
                    var nomuserOk = verifSujet(f.nomuser);
                    if(nomuserOk)
                        return true;
                    else
                    {
                        alert(\"Veuillez remplir correctement tous les champs\");
                        return false;
                    }
                }
           </script>\n") ;
}

?>