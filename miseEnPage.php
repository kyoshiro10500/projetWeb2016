<?php //fuction de mise en page.

function enTete()
{
	print("<!DOCTYPE html>\n") ;
	print("<html>\n") ;
	print("<head>\n") ;
	print("<meta charset=\"utf-8\" />\n") ;
	print("<title>Site</title>\n") ;
	print("<link rel=\"stylesheet\" type=\"text/css\" href=\"siteStyle.css\">\n") ;
	print("</head>\n") ;
	print("<body>\n") ;
}


function pied()
{
   print("</body>\n") ;
   print("</html>\n") ;
}

?>