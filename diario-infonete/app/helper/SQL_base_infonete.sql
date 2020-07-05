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

insert into Diario_Revista values (1,"Todo Deportes",1,"Todo deportes, Diario deportivo líder en Argentina. Noticias deportivas de: Fútbol local e internacional, Selección Nacional, tenis, rugby, autos y más.","revistaDeporte.jpg");
insert into Diario_Revista values (2,"E-Sports",1,"Noticias e-Sports y juegos: equipos, competiciones, análisis, resultados de ligas y torneos. Directo y streaming de partidas en Twitch: CS GO, LOL, COD, HoTs...","esports.png");



CREATE TABLE Seccion     
(
Cod_seccion int NOT NULL auto_increment,
Descripcion varchar(50),
Cod_revista int NOT NULL,
CONSTRAINT PK_Descripcion PRIMARY KEY (Cod_seccion),
CONSTRAINT FK_Seccion_Revista FOREIGN KEY (Cod_revista) REFERENCES Diario_Revista(Id) 
);
insert into Seccion (Cod_seccion,Descripcion,Cod_revista) value
	(1,"Futbol",1),
	(2,"Tenis",1),
    (3,"Basquet",1),
	(4,"CsGo",2),
	(5,"League of legends",2),
    (6,"Fornite",2);
    




CREATE TABLE Lector_SuscripcionRevista
(
Id_usuario int NOT NULL,
Cod_revista int NOT NULL,
CONSTRAINT PK_Lector_Suscripcion PRIMARY KEY (Id_usuario,Cod_revista),
CONSTRAINT FK_Cod_Usuario FOREIGN KEY (Id_usuario) REFERENCES Usuario (Id_usuario),
CONSTRAINT FK_Cod_Revista FOREIGN KEY (Cod_revista) REFERENCES Diario_Revista (Id)
);

insert into Lector_SuscripcionRevista (Id_usuario,Cod_revista) value
	(1,1);
    



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
 value (1,"Lautaro erró el penal del 2-0 y el Inter perdió 2-1","Martínez se hizo cargo de una ejecución que podía cerrar el juego ante Bologna, pero la pateó mal, Skorupski lo atajó y el visitante lo dio vuelta. Todo mal.","Mientras su futuro sigue sin definirse, entre quedarse en el Inter o irse al Barcelona​, Lautaro Martínez se mantiene concentrado en lo suyo y vistiendo la camiseta del Neroazzurro. Pero no la pasa tan bien... El ex Racing se hizo cargo de un penal vs. Bologna, el que podía ser el 2-0 de su equipo, pero lo erró (en realidad lo atajó Skorupski) y el visitante lo terminó dando vuelta por 2-1.
Lautaro fue titular en el Giuseppe Meazza y mostró movilidad de entrada, buscando ser opción uno pasos detrás de Lukaku​, su socio de ataque. Y el Inter encontró rápido el gol, a los 22 minutos, por medio del belga. Parecía que iba a ser un trámite para los de Conte, pero no.
","lautaro.jpg",1,1,"si");

insert into Noticia (Cod_noticia,Titulo,Subtitulo,informe_noticia,imagen_noticia
     ,Cod_seccion,Cod_Contenidista,EstadoAutorizado)
 value (2,"Riquelme podría haber jugado en el Real Madrid","Vicente Del Bosque, eminencia de España y del Merengue, elogió a Román y reveló cuál era su deseo. Además, la comparación entre Maradona y Messi, la final perdida con Boca en el 2000 y la Bombonera.","
 Vicente del Bosque, una eminencia del fútbol mundial, se atreve a hablar de Diego Armando Maradona y de Lionel Messi en el mismo relato. Incluso, hasta juega con comparaciones, remarca virtudes de uno y de otro y da su visión. Sin embargo, en la misma charla también abre la puerta para meter otro nombre pesado, el de Juan Román Riquelme. Fue un jugador que absorbía mucho el juego, que influía mucho en el equipo, se jugaba al ritmo que marcaba él, deslizó el técnico campeón del mundo con España en Sudáfrica 2010 y que hoy tiene 69 años.
Del Bosque no sólo disfrutó del juego de JR en vivo y en directo en la Madre Patria, sino que reconoció que por su forma de jugar, por su elegancia y exquisitez, tranquilamente pudo haber vestido la camiseta del otro gigante de Europa. Riquelme en Europa cumplió sobradamente con las expectativas, fue un jugador de gran talento y podría haber jugado en el Madrid, dijo Vicente, quien como entrenador del Real obtuvo nada menos que nueve títulos, sobre el 10 que no le cumplió el sueño de defender los colores del Merengue pero sí lo hizo con los del Barcelona​.
 ","riquelme.jpg",1,1,"si");
 
 insert into Noticia (Cod_noticia,Titulo,Subtitulo,informe_noticia,imagen_noticia
     ,Cod_seccion,Cod_Contenidista,EstadoAutorizado)
 value (3,"Tiafoe, sexto tenista positivo por coronavirus, se borra de la exhibición de Atlanta","Peligra el regreso del tenis por la pandemia y las cuarentenas","
El estadounidense Frances Tiafoe, 81 del ranking ATP, ha vuelto a encender las alarmas en el mundo del tenis. Y es que se ha convertido en el sexto jugador profesional en dar positivo por coronavirus. Se realizó el test la noche del viernes, después de encontrarse indispuesto, durante el torneo de exhibición de Atlanta del que ya se ha dado de baja. Había ganado su partido ante su compatriota Sam Querrey por 6-4 y 7-6.Se une así a los casos anteriores de Thiago Seyboth Wild, infectado en Brasil, y Novak Djokovic, Borna Coric, Viktor Troicki y Grigor Dimitrov, víctimas del Adria Tour que terminó con un total de diez enfermos por COVID-19.Tiafoe, sustituido en Atlanta por el local Cristopher Eubanks, ha querido remarcar que antes de viajar a Atlanta se había realizado controles de manera periódica en su residencia de Florida y siempre había dado negativo. El yanqui ha iniciado su cuarentena y se realizará un nuevo test la semana que viene.En peligro de estar contagiados, al haber estado en contacto con su compañero, figuran John Isner, Querrey, Taylor Fritz, Reilly Opelka, Tennys Sandgren, Steve Johnson y Tommy Paul, los otros participantes del certamen bautizado con el nombre de 'All American Team Cup'.El positivo de Frances llega cuando está más en duda que nunca el regreso del tenis el mes de agosto en una anunciada gira americana de pista dura que debería iniciarse el 14 de agosto con el Open 500 de Washington. Sería la antesala del Masters 1.000 de Cincinnati y US Open, ambos en las pistas del Billie Jean King Tennis Center de Nueva York.

 ","tifoe.jpg",2,1,"si");
 
 insert into Noticia (Cod_noticia,Titulo,Subtitulo,informe_noticia,imagen_noticia
     ,Cod_seccion,Cod_Contenidista,EstadoAutorizado)
 value (4,"Las 29 consignas políticas que podrán exhibirse en las camisetas NBA","La liga de básquet norteamericana aprobó las frases que los jugadores podrán llevar en sus dorsales, sobre el número, y que reemplazarán a sus nombres","
 
 La NBA autorizó una lista de 29 consignas políticas que podrán exhibirse en las camisetas de los jugadores que lo deseen, como el apoyo al movimiento Black Lives Matter (Las vidas negras importan), cuando se reanude la liga suspendida por la pandemia de coronavirus el 30 de julio. Todo fue motivado por el asesinato, en manos de la Policía, del afroamericano George Floyd.
 ","basquet.jpg",3,1,"si");
 
  insert into Noticia (Cod_noticia,Titulo,Subtitulo,informe_noticia,imagen_noticia
     ,Cod_seccion,Cod_Contenidista,EstadoAutorizado)
 value (5,"CSGO: Se define la Liga Pro Trust Norte y Centro","Este sábado y domingo, la acción se verá en TyC Sports Play con los mejores cuatro equipos de la región buscando el título.","
 Arrancan las definiciones de la Liga Pro Trust de Counter-Strike: Global Offensive organizada por Temporada de Juegos. Primero será el turno de la región Norte y Centro y, una semana después, de la región Sur. Ambas instancias se verán en vivo por TyC Sports Play.
Este sábado se jugarán las semifinales de la competencia y tendrán como protagonistas de la primera semi a Mineros FC Esports -que cuenta con un mix estadounidense y canadiense- se verá las caras con Estral Esports -formado por mexicanos y estadounidenses. La otra semifinal será entre Infinity Esports de Colombia ante Supremacy Gaming de Perú.
Los ganadores de las semifinales chocarán el domingo en la gran final por los más de 3 mil dólares en premios. Una semana más tarde será el turno de la región Sur, que ya tiene semifinales confirmadas entre DETONA Pound de Brasil y Sinisters de Argentina por un lado, y 9Z Team de Argentina e Imperial de Brasil, por el otro.","csgo.jpg",4,1,"si");

insert into Noticia (Cod_noticia,Titulo,Subtitulo,informe_noticia,imagen_noticia
     ,Cod_seccion,Cod_Contenidista,EstadoAutorizado)
 value (6,"SISTEMAS DE COMPORTAMIENTO: NOVEDADES (07/2020)","Os traemos las próximas áreas en las que nos centraremos con los sistemas de comportamiento.","
 ¡Hola! Al habla Cody Riot Codebear Germain. Vengo a comentaros nuestro enfoque en lo relativo a las mejoras del comportamiento de LoL, las ideas y la filosofía que hay detrás de las próximas funciones.

Como hemos mencionado durante los últimos meses, los comportamientos inadecuados de LoL son algo en lo que no hemos avanzado demasiado en los últimos años. En nuestra primera fase de este nuevo intento de cambio, nos ha parecido importante hacer frente a los comportamientos en partida que afectan directamente a los resultados de las mismas. Los hemos definido como los comportamientos que albergan la intención directa de provocar una derrota o aquellos que albergan la intención directa de disminuir las probabilidades de victoria, lo que puede incluir morir a propósito, sabotaje, molestar a los demás en partida, permanecer inactivo o abandonar una partida intencionadamente."
,"lol.jpg",5,1,"si");


insert into Noticia (Cod_noticia,Titulo,Subtitulo,informe_noticia,imagen_noticia
     ,Cod_seccion,Cod_Contenidista,EstadoAutorizado)
 value (7,"IMPERMEABLE","SOBREVIVID A LA TORMENTA Y A LAS CONSECUENCIAS DE SU VENGANZA.MIENTRAS LA ISLA SE ADAPTA A UN NUEVO ESTILO DE VIDA INUNDADO,TENDRÉIS QUE MANTENEROS A FLOTE Y ENFRENTAROS A NUEVOS DESAFÍOS","
 LOS TIBURONES SON PELIGROSOS Y TIENEN UN HAMBRE VORAZ POR LOS OBJETOS,PERO TAMBIÉN SON UN MEDIO DE TRANSPORTE DIVERTIDO.SUJETAD LOS CON UNA CAÑA DE PESCAR PARA MONTAROS EN EL LOS,GUIAR LOS Y SURCAR LAS AGUAS.
"
,"fornite.png",6,1,"si");

 
 
 



