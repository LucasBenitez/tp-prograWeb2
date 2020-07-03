/* base infonete */

DROP SCHEMA IF EXISTS  Infonete;
CREATE SCHEMA IF NOT EXISTS Infonete;
USE Infonete;


CREATE TABLE Tipo_doc
(
Cod_doc int NOT NULL,
Descripcion varchar(20),
CONSTRAINT PK_Tipo_doc PRIMARY KEY (Cod_doc)
);

insert into Tipo_doc (Cod_doc,Descripcion) value
	(1,"DNI"),
	(2,"DNI ext");

CREATE TABLE Rol     
(
Cod_rol int NOT NULL,
Descripcion_rol varchar(20),
CONSTRAINT PK_Rol PRIMARY KEY (Cod_Rol)
);

insert into Rol (Cod_Rol,Descripcion_rol) value
	(1,"ADMIN"),
	(2,"CONTENIDISTA"),
	(3,"LECTOR");

CREATE TABLE Usuario    				
(
Id_usuario int NOT NULL auto_increment,
Nro_doc int NOT NULL,
Cod_doc int NOT NULL,
Nombre varchar(50),
Mail varchar(64),
Telefono int,
Cod_Usuario int NOT NULL,										 
Pass varchar(50),																						
CONSTRAINT PK_Usuario PRIMARY KEY (Id_usuario),
CONSTRAINT FK_Usuario_Documento FOREIGN KEY (Cod_doc) REFERENCES Tipo_doc (Cod_doc),
CONSTRAINT FK_Usuario_Rol FOREIGN KEY (Cod_Usuario) REFERENCES Rol (Cod_Rol) 
);

insert into Usuario (Nro_doc,Cod_doc,Nombre,Mail,Telefono,Cod_Usuario,Pass) value
	
	(40111222,1,"lector","agus@gmail.com",1122223333,3,"1234"),
	(30555000,1,"admin","walter@gmail.com",1133445566,1,"1234"),
	(35123456,1,"contenidista","pepe2@gmail.com",1533445566,2,"1234");


CREATE TABLE Diario_Revista
(
Id int NOT NULL auto_increment,
Titulo  varchar(50),
Numero int NOT NULL,
Descripcion varchar(100),
imagen_revista varchar(200),
CONSTRAINT PK_Revista PRIMARY KEY (Id)
);

insert into Diario_Revista values (1,"revista1",1,"revistadesc","imagen1.jpg");
insert into Diario_Revista values (2,"revista2",1,"revistadesc2","imagen2.jpg");



CREATE TABLE Seccion     
(
Cod_seccion int NOT NULL auto_increment,
Descripcion varchar(50),
Cod_revista int NOT NULL,
CONSTRAINT PK_Descripcion PRIMARY KEY (Cod_seccion),
CONSTRAINT FK_Seccion_Revista FOREIGN KEY (Cod_revista) REFERENCES Diario_Revista(Id) 
);
insert into Seccion (Cod_seccion,Descripcion,Cod_revista) value
	(1,"POLITICA",1),
	(2,"SOCIEDAD",1),
	(3,"DEPORTES",2),
	(4,"TECNOLOGIA",2);
    




CREATE TABLE Lector_SuscripcionRevista
(
Id_usuario int NOT NULL,
Cod_revista int NOT NULL,
CONSTRAINT PK_Lector_Suscripcion PRIMARY KEY (Id_usuario,Cod_revista),
CONSTRAINT FK_Cod_Usuario FOREIGN KEY (Id_usuario) REFERENCES Usuario (Id_usuario),
CONSTRAINT FK_Cod_Revista FOREIGN KEY (Cod_revista) REFERENCES Diario_Revista (Id)
);

insert into Lector_SuscripcionRevista (Id_usuario,Cod_revista) value
	(1,1),
	(2,2),
	(3,2),
    (1,2);
    



CREATE TABLE Noticia
(
Cod_noticia int NOT NULL auto_increment,
Titulo varchar(200) NOT NULL, 
Subtitulo varchar(500) NOT NULL, /* Hace referencia al COPETE */
informe_noticia varchar(10000) NOT NULL,									 									
imagen_noticia varchar(200),									
Cod_seccion int NOT NULL,
Cod_contenidista int NOT NULL,
EstadoAutorizado varchar(2),
CONSTRAINT PK_Noticia PRIMARY KEY (Cod_noticia),
CONSTRAINT FK_Seccion_Noticia FOREIGN KEY (Cod_seccion) REFERENCES Seccion (Cod_seccion),
CONSTRAINT FK_Noticia_Usuario FOREIGN KEY (Cod_contenidista) REFERENCES Usuario (Id_usuario)  
);

     insert into Noticia (Cod_noticia,Titulo,Subtitulo,informe_noticia,imagen_noticia
     ,Cod_seccion,Cod_Contenidista,EstadoAutorizado)
 value (1,"titulo","subtitulo","informe","imagen",1,1,"no");
 


