CREATE DATABASE site_stream_grpac2;

CREATE TABLE profil(
id_user INT PRIMARY KEY NOT NULL,
nom_user varchar(32) NOT NULL,
mail_user varchar(50),
password_user varchar(30) NOT NULL,
id_img_user int,
desc_user varchar(500),
genre_user int,
age_user int,
lvl_user int NOT NULL DEFAULT 0,
signature_membre varchar(140),
localisation_membre varchar(50),
membre_inscrit int NOT NULL,
membre_last_visit int NOT NULL,
membre_post int NOT NULL);

CREATE TABLE forum_categorie(
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
);

CREATE TABLE forum_post(
post_id int PRIMARY KEY NOT NULL,
post_creator int NOT NULL,
post_texte text NOT NULL,
post_time int NOT NULL,
id_topic int NOT NULL,
post_forum_id int NOT NULL);

CREATE TABLE moderateur(
id_mod int,
privilege int CHECK (privilege=1 OR privilege=2),
CONSTRAINT fk_modo
FOREIGN KEY (id_mod) REFERENCES profil(id_user)
);

CREATE TABLE emission(
id_cast int PRIMARY KEY NOT NULL ,
nom_cast varchar(100),
descrip_cast varchar(250));

CREATE TABLE programme(
id_prog int PRIMARY KEY NOT NULL,
name_cast varchar(100)[5],
date_cast date[5]);

CREATE TABLE emission_prog(
id_cast int REFERENCES emission(id_cast) ON UPDATE CASCADE ON DELETE CASCADE,
id_prog int REFERENCES programme(id_prog) ON UPDATE CASCADE,
CONSTRAINT emission_prog_pkey PRIMARY KEY (id_cast,id_prog));
