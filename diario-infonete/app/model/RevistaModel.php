<?php
include_once("helper/Database.php");

class RevistaModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function executeBuscarNoticiasPorLector($idUsuario)
    {
        $this->conexion->queryBuscarNoticiasPorLector($idUsuario);
    }

    public function executeBuscarRevistas()
    {
        return $this->conexion->queryBuscarRevistas();

    }
    public function executeBuscarSeccionesPorRevista($idUsuario , $id_revista)
    {
        return $this->conexion->queryBuscarSeccionesPorRevista($idUsuario , $id_revista);

    }

    public function executeBuscarNoticiasPorSeccion($codSeccion)
    {
        return $this->conexion->queryBuscarNoticiasPorSeccion($codSeccion);

    }

    public function executeBuscarNoticias()
    {

       return $this->conexion->queryBuscarNoticias();

    }

    public function executeBuscarSeccion()
    {
         return $this->conexion->queryBuscarSeccion();
    }

    public function executeGuardarRevista($titulo, $nroRevista, $descripcion, $imagen)
    {

        $sql = "INSERT INTO Diario_Revista(Titulo,Numero,Descripcion,imagen_revista)
                value('$titulo',$nroRevista,'$descripcion','$imagen')";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }

    public function executeGuardarNoticia($tituloNoticia, $subtitulo, $informe, $cod_contenidista, $cod_seccion,$imagen)
    {


        $sql = "insert into Noticia (Titulo,Subtitulo,informe_noticia,imagen_noticia,Cod_seccion,Cod_contenidista,EstadoAutorizado)
        value ('$tituloNoticia','$subtitulo','$informe','$imagen',$cod_seccion,$cod_contenidista,'No') ";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }

    public function executeGuardarSeccion($descripcion, $cod_revista)
    {

        $sql = "insert into Seccion (Descripcion,Cod_Revista)
      value ('$descripcion',$cod_revista);";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }

    public function executeCambiarEstadoNoticia($idNoticia)
    {
        $this->conexion->queryCambiarEstado($idNoticia);
    }

    public function executeEditarNoticia($idNoticia, $cuerpoNoticia, $titulo)
    {
        $this->conexion->queryEditarNoticia($idNoticia, $cuerpoNoticia, $titulo);
    }

    public function executeEditarRevista($idRevista, $titulo)
    {
        $this->conexion->queryEditarRevista($idRevista, $titulo);
    }

    public function executeEditarSeccion($idSeccion, $titulo)
    {
        $this->conexion->queryEditarSeccion($idSeccion, $titulo);
    }

    public function executeBorrarNoticia($idNoticia)
    {
        $this->conexion->queryBorrarNoticia($idNoticia);
    }

    public function executeBorrarRevista($idRevista)
    {
        $this->conexion->queryBorrarRevista($idRevista);
    }

    public function executeBorrarSeccion($idSeccion)
    {
        $this->conexion->queryBorrarSeccion($idSeccion);
    }
    public function executeSuscribirse($idUsuario, $idRevista)
    {
        $sql = "insert into Lector_SuscripcionRevista (Id_usuario,Cod_revista)
      value ($idUsuario,$idRevista);";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }

    public function executeFiltrarRevistas($idUsuario)
    {
        $this->conexion->queryBuscarNoticiasPorLector($idUsuario);

    }

}


