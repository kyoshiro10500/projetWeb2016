DROP DATABASE IF EXISTS Site ;
CREATE DATABASE Site;



CREATE TABLE profil(
id_user INT PRIMARY KEY NOT NULL,
nom_user varchar(32) NOT NULL,
mail_user varchar(50),
password_user varchar(30) NOT NULL,
id_img_user int,
desc_user varchar(500),
age_user int,
lvl_user int NOT NULL DEFAULT 0,
signature_membre varchar(140),
localisation_membre varchar(50),
membre_inscrit date NOT NULL,
membre_last_visit date NOT NULL,
membre_post int NOT NULL,
id_ban int);

/*ces infos doivent etre donnees par le client avant la création de la base*/
INSERT INTO profil(id_user,nom_user,mail_user,password_user,id_img_user,lvl_user,membre_post,membre_inscrit,membre_last_visit,id_ban,age_user) VALUES ('1','Admin1','victorperson10@hotmail.fr','Admin1','1','2','0','2016-05-15','2016-05-15','0','20') ;  

/*CREATE TABLE forum_categorie(
id_cat int primary key not null,
nom_cat varchar (30) NOT NULL,
ordre_cat int NOT NULL UNIQUE);

CREATE TABLE forum_forum(
id_forum int primary key not null,
id_cat_forum int not null,
nom_forum varchar(30) not null,
desc_forum varchar(140) not null,
ordre_forum int not null,
last_post_forum int not null,
topic_forum int not null,
post_forum int not null,
auth_view int not null,
auth_post int not null,
auth_topic int not null,
auth_annonce int not null,
auth_modo int not null);

CREATE TABLE forum_topic(
id_topic int primary key not null,
id_forum int not null,
titre_topic varchar(60) not null,
createur_topic int not null,
visit_topic int not null,
time_topic int not null,
genre_topic varchar(50) not null,
last_post_topic int unique not null,
first_post_topic int not null,
post_topic int not null
);*/

CREATE TABLE forum1_post(
id_post int PRIMARY KEY NOT NULL,
post_creator int NOT NULL,
post_texte varchar(250),
post_time date ,
CONSTRAINT fk_creator
FOREIGN KEY (post_creator) REFERENCES profil(id_user));

CREATE TABLE forum2_post(
id_post int PRIMARY KEY NOT NULL,
post_creator int NOT NULL,
post_texte varchar(250),
post_time date ,
CONSTRAINT fk_creator
FOREIGN KEY (post_creator) REFERENCES profil(id_user));

CREATE TABLE forum3_post(
id_post int PRIMARY KEY NOT NULL,
post_creator int NOT NULL,
post_texte varchar(250),
post_time date ,
CONSTRAINT fk_creator
FOREIGN KEY (post_creator) REFERENCES profil(id_user));

/*CREATE TABLE moderateur(
id_mod int,
privilege int CHECK (privilege=1 OR privilege=2),
CONSTRAINT fk_modo
FOREIGN KEY (id_mod) REFERENCES profil(id_user)
);*/

CREATE TABLE messageprive(
id_message int PRIMARY KEY,
id_dest int,
id_exp int,
message varchar(250),
sujet varchar(100),
CONSTRAINT fk_dest
FOREIGN KEY (id_dest) REFERENCES profil(id_user),
CONSTRAINT fk_exp
FOREIGN KEY (id_exp) REFERENCES profil(id_user)) ;

CREATE TABLE emission(
id_cast int PRIMARY KEY NOT NULL ,
nom_cast varchar(100),
descrip_cast varchar(250));

CREATE TABLE programme(
id_semaine int,
id_jour int,
id_heure_debut int,
id_heure_fin int,
id_cast int,
PRIMARY KEY (id_semaine,id_jour,id_heure_debut,id_heure_fin),
CONSTRAINT fk_cast
FOREIGN KEY (id_cast) REFERENCES emission(id_cast)) ;

CREATE TABLE news(
id_news int PRIMARY KEY NOT NULL ,
nom_news varchar(100),
descrip_news varchar(250),
date_news date) ;