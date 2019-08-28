#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: service
#------------------------------------------------------------

CREATE TABLE service(
        idService        Int  Auto_increment  NOT NULL ,
        name        Varchar (50) NOT NULL ,
        description Varchar (100) NOT NULL
	,CONSTRAINT PK_service PRIMARY KEY (idService)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id          Int  Auto_increment  NOT NULL ,
        lastName    Varchar (50) NOT NULL ,
        firstName   Varchar (50) NOT NULL ,
        birthDate   Date NOT NULL ,
        address      Text NOT NULL ,
        zipCode     Varchar (5) NOT NULL ,
        phoneNumber Varchar (10) NOT NULL ,
        idService  Int NOT NULL
	,CONSTRAINT PK_users PRIMARY KEY (id)

	,CONSTRAINT FK_users_idService FOREIGN KEY (idService) REFERENCES service(idService)
)ENGINE=InnoDB;

