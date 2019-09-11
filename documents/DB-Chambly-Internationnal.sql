#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


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
# Table: Article
#------------------------------------------------------------

CREATE TABLE Article(
        id      Int  Auto_increment  NOT NULL ,
        title   Varchar (100) NOT NULL ,
        text    Text NOT NULL ,
        picture Varchar (100) NOT NULL ,
        id_User Int
	,CONSTRAINT Article_PK PRIMARY KEY (id)

	,CONSTRAINT Article_User_FK FOREIGN KEY (id_User) REFERENCES User(id) ON DELETE SET NULL
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Gallery
#------------------------------------------------------------

CREATE TABLE Gallery(
        id      Int  Auto_increment  NOT NULL ,
        picture Varchar (100) NOT NULL ,
        title   Varchar (100) NOT NULL ,
        id_User Int NOT NULL
	,CONSTRAINT Gallery_PK PRIMARY KEY (id)

	,CONSTRAINT Gallery_User_FK FOREIGN KEY (id_User) REFERENCES User(id)
)ENGINE=InnoDB;

