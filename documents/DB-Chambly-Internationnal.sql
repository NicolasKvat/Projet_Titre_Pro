#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Article
#------------------------------------------------------------

CREATE TABLE Article(
        id      Int  Auto_increment  NOT NULL ,
        title   Varchar (100) NOT NULL ,
        text    Text NOT NULL ,
        picture Varchar (100) NOT NULL
	,CONSTRAINT Article_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Gallery
#------------------------------------------------------------

CREATE TABLE Gallery(
        id      Int  Auto_increment  NOT NULL ,
        picture Varchar (100) NOT NULL ,
        title   Varchar (100) NOT NULL
	,CONSTRAINT Gallery_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: status
#------------------------------------------------------------

CREATE TABLE status(
        idStatus Int  Auto_increment  NOT NULL ,
        name     Varchar (50) NOT NULL
	,CONSTRAINT status_PK PRIMARY KEY (idStatus)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id        Int  Auto_increment  NOT NULL ,
        lastName  Varchar (50) NOT NULL ,
        firstName Varchar (50) NOT NULL ,
        email     Varchar (100) NOT NULL ,
        passWord  Varchar (100) NOT NULL ,
        idStatus  Int NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (id)

	,CONSTRAINT User_status_FK FOREIGN KEY (idStatus) REFERENCES status(idStatus)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ajouter
#------------------------------------------------------------

CREATE TABLE ajouter(
        id      Int NOT NULL ,
        id_User Int NOT NULL
	,CONSTRAINT ajouter_PK PRIMARY KEY (id,id_User)

	,CONSTRAINT ajouter_Article_FK FOREIGN KEY (id) REFERENCES Article(id)
	,CONSTRAINT ajouter_User0_FK FOREIGN KEY (id_User) REFERENCES User(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: insérer
#------------------------------------------------------------

CREATE TABLE inserer(
        id      Int NOT NULL ,
        id_User Int NOT NULL
	,CONSTRAINT inserer_PK PRIMARY KEY (id,id_User)

	,CONSTRAINT inserer_Gallery_FK FOREIGN KEY (id) REFERENCES Gallery(id)
	,CONSTRAINT inserer_User0_FK FOREIGN KEY (id_User) REFERENCES User(id)
)ENGINE=InnoDB;

