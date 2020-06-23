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

CREATE TABLE Producto     
(
Cod_producto int NOT NULL,
Descripcion varchar(50),
CONSTRAINT PK_Producto PRIMARY KEY (Cod_producto)
);

insert into Producto (Cod_producto,Descripcion) value
	(1,"Diario"),
	(2,"Revista");


CREATE TABLE Suscripcion      
(
Cod_suscripcion int NOT NULL,
Descripcion varchar(50),
Cod_producto int NOT NULL,
CONSTRAINT PK_Suscripcion PRIMARY KEY (Cod_suscripcion),
CONSTRAINT FK_Suscripcion_Producto FOREIGN KEY (Cod_producto) REFERENCES Producto (Cod_producto)
);

insert into Suscripcion (Cod_suscripcion,Descripcion,Cod_producto) value
	(0,"ilimitada",1),
	(1,"Semanal",1),
	(2,"Mensual",2),
	(3,"Anual",1),
	(4,"restringido",1);


CREATE TABLE Provincia     
(
Cod_provincia int NOT NULL,
Descripcion varchar(50),
CONSTRAINT PK_Provincia PRIMARY KEY (Cod_Provincia)
);

insert into Provincia (Cod_provincia,Descripcion) value 
	(1,"CABA"),
    (2,"BsAs");

CREATE TABLE Localidad 
(
Cod_Localidad int,
Descripcion varchar(50),
Cod_Provincia int,
CONSTRAINT PK_Localidad PRIMARY KEY (Cod_Localidad),
CONSTRAINT FK_LocalidadProvincia FOREIGN KEY (Cod_Provincia) REFERENCES Provincia (Cod_provincia)	
);

insert into Localidad (Cod_Localidad,Descripcion,Cod_Provincia) value 
	(1,"Ramos Mejía",2),
    (2,"Villa Luzuriaga",2),
    (3,"San justo",2),
    (4,"Caballito",1);

/* Rol como entidad aparte, relacionada con usuario*/
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
Cod_Localidad int NOT NULL,										
Cod_Usuario int NOT NULL,										 
Pass varchar(50),																						
Cod_Suscripcion int,
CONSTRAINT PK_Usuario PRIMARY KEY (Id_usuario),
CONSTRAINT FK_Usuario_Documento FOREIGN KEY (Cod_doc) REFERENCES Tipo_doc (Cod_doc),
CONSTRAINT FK_Usuario_Suscripcion FOREIGN KEY (Cod_Suscripcion) REFERENCES Suscripcion (Cod_Suscripcion),
CONSTRAINT FK_Usuario_Localidad FOREIGN KEY (Cod_Localidad) REFERENCES Localidad (Cod_Localidad),
CONSTRAINT FK_Usuario_Rol FOREIGN KEY (Cod_Usuario) REFERENCES Rol (Cod_Rol) 
);

insert into Usuario (Nro_doc,Cod_doc,Nombre,Mail,Telefono,Cod_Localidad,Cod_Usuario,Pass,Cod_Suscripcion) value
	(32222333,1,"Alejandro","ale@gmail.com",1144446666,1,1,"1234",0),
	(40111222,1,"Agustin","agus@gmail.com",1122223333,2,3,"1234",1),
	(30555000,1,"Walter","walter@gmail.com",1133445566,3,1,"1234",0),
	(40987654,1,"Lucas","lucas@gmail.com",11444555,4,3,"1234",2),
	(32000000,1,"Diego","diego@gmail.com",113333888,1,3,"1234",1),
	(20456789,1,"Pepe I","pepe1@gmail.com",1598765432,2,3,"1234",3),
	(35123456,1,"Pepe II","pepe2@gmail.com",1533445566,3,2,"1234",0),
	(94000111,2,"Pepe III","pepe3@gmail.com",44448888,4,2,"1234",0);


CREATE TABLE Diario_Revista
(
Id int NOT NULL auto_increment,
Id_Admin int NOT NULL,
Titulo  varchar(50),
Numero int NOT NULL,
Descripcion varchar(100),
CONSTRAINT PK_Revista PRIMARY KEY (Id),
CONSTRAINT FK_Revista_Usuario FOREIGN KEY (Id_Admin) REFERENCES Usuario(Id_usuario)
);


/* Usuario conectado por red social - FALTARIA RESOLVER para integrar API´s*/
CREATE TABLE UsuarioRedSocial    				
(
alias varchar(50),
Mail varchar(64),
Cod_Usuario int,							 
Pass varchar(50)									
);

CREATE TABLE Seccion     
(
Cod_seccion int NOT NULL,
Descripcion varchar(50),
Cod_producto int NOT NULL,
Cod_contenidista int NOT NULL,
CONSTRAINT PK_Descripcion PRIMARY KEY (Cod_seccion),
CONSTRAINT FK_Seccion_Producto FOREIGN KEY (Cod_producto) REFERENCES Producto (Cod_producto),
CONSTRAINT FK_Seccion_Usuario FOREIGN KEY (Cod_contenidista) REFERENCES Usuario (Id_usuario)   
);
insert into Seccion (Cod_seccion,Descripcion,Cod_producto,Cod_contenidista) value
	(1,"POLITICA",1,1),
	(2,"SOCIEDAD",1,2),
	(3,"DEPORTES",2,3),
	(4,"TECNOLOGIA",2,4);


CREATE TABLE Cuota     
(
Cod_cuota int NOT NULL,
Detalle varchar(50),
Id_usuario int NOT NULL,
CONSTRAINT PK_cuota PRIMARY KEY (Cod_cuota),
CONSTRAINT FK_Cuota_Usuario FOREIGN KEY (Id_usuario) REFERENCES Usuario (Id_usuario)
);

insert into Cuota (Cod_cuota,Detalle,Id_usuario) value 
	(1,"Pago Semanal",1),
	(2,"Pago Mensual",2),
	(3,"Pago Anual",3);


CREATE TABLE Lector_Suscripcion
(
Id_usuario int NOT NULL,
Cod_suscripcion int NOT NULL,
CONSTRAINT PK_Lector_Suscripcion PRIMARY KEY (Id_usuario,Cod_suscripcion),
CONSTRAINT FK_Cod_Usuario FOREIGN KEY (Id_usuario) REFERENCES Usuario (Id_usuario),
CONSTRAINT FK_Cod_Suscripcion FOREIGN KEY (Cod_suscripcion) REFERENCES Suscripcion (Cod_suscripcion)
);

insert into Lector_Suscripcion (Id_usuario,Cod_suscripcion) value
	(1,1),
	(2,2),
	(3,3);


/* La GEOREFERENCIA puede ser bueno usarlo como: Grados decimales (DD): 41.40338, 2.17403  (LATITUD-LONGITUD)*/
/* EJ: Buenos aires tiene Latitud: -34.60842 , Longitud: -58.37210 -  o la UNLaM -34.669254, -58.564420 */

CREATE TABLE Georeferencia
(
Cod_georef int NOT NULL,
Latitud real NOT NULL,
Longitud real NOT NULL,
CONSTRAINT PK_Georeferecia PRIMARY KEY (Cod_georef)
);

insert into Georeferencia (Cod_georef,Latitud,Longitud) value
	(1,-34.60842,-58.37210),
	(2,-34.669254,-58.564420);

CREATE TABLE Noticia
(
Cod_noticia int NOT NULL auto_increment,
Titulo varchar(200) NOT NULL, 
Subtitulo varchar(500) NOT NULL, /* Hace referencia al COPETE */
informe_noticia varchar(10000) NOT NULL,
link_noticia varchar(300),									 	
Cod_georef int NOT NULL,									
imagen_noticia varchar(200),									
Cod_seccion int NOT NULL,
Cod_contenidista int NOT NULL,
EstadoAutorizado varchar(2),
Origen varchar(10),
CONSTRAINT PK_Noticia PRIMARY KEY (Cod_noticia),
CONSTRAINT FK_Seccion_Noticia FOREIGN KEY (Cod_seccion) REFERENCES Seccion (Cod_seccion),
CONSTRAINT FK_Noticia_Usuario FOREIGN KEY (Cod_contenidista) REFERENCES Usuario (Id_usuario),   /* ver id usuario/autor de la noticia */	
CONSTRAINT FK_Noticia_Georeferencia FOREIGN KEY (Cod_georef) REFERENCES Georeferencia (Cod_georef)
);

     insert into Noticia (Cod_noticia,Titulo,Subtitulo,informe_noticia,link_noticia,Cod_georef,imagen_noticia
     ,Cod_seccion,Cod_Contenidista,EstadoAutorizado,Origen)
 value (1,"titulo","subtitulo","informe","link",1,"imagen",1,1,"no","diario");
insert into Diario_Revista(Id_Admin,Titulo,Numero,Descripcion) value (1,"aaa",1,"bb");

select * from Noticia


