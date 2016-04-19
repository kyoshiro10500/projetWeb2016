# projetWeb2016


Site personnalisé pour un streamer

Pour ceux qui tournent sous windows, pour voir le site il faut un host. Et pour que ce host tourne avec postgresql, faut en choisir un particulier. Pour ça il faut telecharger wampserver et pgsql pour windows. Normalement en bidouillant un peu ça marche. Pour la bdd changez surtout pas les nom par rapport à ce qui est dans le projet. Pour le moment le nom de la bdd est Site, l'username est postgres et le mdp est Site

La bdd est comme ci dessous pour le moment :

DROP TABLE public.profil;

CREATE TABLE public.profil ( id_user integer NOT NULL, lvl_user integer, nom_user character varying(20), password_user character varying(20), mail_user character varying(30), CONSTRAINT profil_pkey PRIMARY KEY (id_user) )
