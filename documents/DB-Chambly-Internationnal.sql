#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id        Int  Auto_increment  NOT NULL ,
        lastName  Varchar (50) NOT NULL ,
        firstName Varchar (50) NOT NULL ,
        email     Varchar (100) NOT NULL ,
        passWord  Varchar (100) NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


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
        title   Varchar (100) NOT NULL ,
        date    Varchar (100) NOT NULL
	,CONSTRAINT Gallery_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

