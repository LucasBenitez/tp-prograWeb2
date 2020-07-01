<?php
include_once("helper/Database.php");

class RevistaModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }


    public function executeBuscarNoticias(){
        $this->conexion->queryBuscarNoticias();
    }
    public function executeBuscarSeccion(){
        $this->conexion->queryBuscarSeccion();
    }

    public function executeGuardarRevista($titulo,$nroRevista,$descripcion){

        $sql = "INSERT INTO Diario_Revista(Titulo,Numero,Descripcion)
                value('$titulo',$nroRevista,'$descripcion')";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }
    public function executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista,$cod_seccion){

        $sql = "insert into Noticia (Titulo,Subtitulo,informe_noticia
                 ,Cod_seccion,Cod_Contenidista,EstadoAutorizado)
      value ('$tituloNoticia','$subtitulo','$informe',$cod_seccion,$cod_contenidista,'no')";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }
    public function executeGuardarSeccion($descripcion,$cod_revista){

        $sql = "insert into Seccion (Descripcion,Cod_Revista)
      value ('$descripcion',$cod_revista);";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }
    public function executeCambiarEstadoNoticia($idNoticia){
    $this->conexion->queryCambiarEstado($idNoticia);
}
    public function executeEditarNoticia($idNoticia,$cuerpoNoticia,$titulo){
        $this->conexion->queryEditarNoticia($idNoticia,$cuerpoNoticia,$titulo);
    }
    public function executeEditarRevista($idRevista,$titulo){
        $this->conexion->queryEditarRevista($idRevista,$titulo);
    }
    public function executeEditarSeccion($idSeccion,$titulo){
        $this->conexion->queryEditarSeccion($idSeccion,$titulo);
    }
    public function executeBorrarNoticia($idNoticia){
        $this->conexion->queryBorrarNoticia($idNoticia);
    }
    public function executeBorrarRevista($idRevista){
        $this->conexion->queryBorrarRevista($idRevista);
    }
    public function executeBorrarSeccion($idSeccion){
        $this->conexion->queryBorrarSeccion($idSeccion);
    }
}


