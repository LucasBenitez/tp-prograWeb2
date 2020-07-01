<?php

class Database{

    private $conexion;

    public function __construct(){
        $configuracion = parse_ini_file("config/config.ini");
        $servername = $configuracion["servername"];
        $username = $configuracion["username"];
        $dbname =  $configuracion["dbname"];
        $password =  $configuracion["password"];

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("Fallo la conexion: " . $conn->connect_error);
        }
        $conn->select_db($dbname);
        $this->conexion = $conn;
    }

    public function query($usuario,$clave){
        $stmt = $this->conexion->prepare("SELECT * FROM Usuario WHERE Nombre = ? and Pass = ?");
        $stmt->bind_param('ss', $usuario, $clave);

        // set parameters and execute
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) {
            $_SESSION["loginError"] = "error";
         }

        while($row = $result->fetch_assoc()) {
            $resultado = $row['Id_usuario']."-".$row['Nombre']."-".$row['Cod_Usuario'];
        }
        // se guarda el usuario recuperado de la consulta en SESSION
        $_SESSION["usuarioOK"] = $resultado;
         $stmt->close();
        $this->conexion->close();
    }
    public function queryBuscarRevistas(){

        $stmt = $this->conexion->prepare("SELECT * FROM Diario_Revista");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinDatos"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $id= $row['Id'];
                $titulo=$row['Titulo'];
                $numero = $row['Numero'];
                $descripcion = $row['Descripcion'];

                $resultados[$i]= $id."-".$titulo."-".$numero."-".$descripcion;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["revistas"] = $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function queryBuscarNoticias(){

        $stmt = $this->conexion->prepare("SELECT * FROM Noticia ");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinNoticias"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $codNoticia= $row['Cod_noticia'];
                $titulo=$row['Titulo'];
                $subTitulo = $row['Subtitulo'];
                $estadoAutorizado = $row['EstadoAutorizado'];


                $resultados[$i]= $codNoticia."-".$titulo."-".$subTitulo."-".$estadoAutorizado;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["noticias"] = $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function queryBuscarSeccion(){

        $stmt = $this->conexion->prepare("SELECT * FROM Seccion ");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinSeccion"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $codSeccion= $row['Cod_seccion'];
                $descripcion=$row['Descripcion'];



                $resultados[$i]= $codSeccion."-".$descripcion;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["seccion"] = $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function queryCambiarEstado($idNoticia)
    {

        $stmt = $this->conexion->prepare("UPDATE Noticia SET EstadoAutorizado=?  WHERE Cod_noticia=?");
        $stmt->bind_param('si', $estado, $idNoticia);
        $estado = "SI";
        $stmt->execute();
        $stmt->close();

    }

    public function queryEditarNoticia($idNoticia,$cuerpoNoticia,$titulo)
    {
        $stmt = $this->conexion->prepare("UPDATE Noticia SET  informe_noticia=?  WHERE Cod_noticia=?");
        $stmt->bind_param('si',$cuerpoNoticia, $idNoticia);
        $stmt->execute();
        $stmt->close();

        $stmt2 = $this->conexion->prepare("UPDATE Noticia SET  Titulo=?  WHERE Cod_noticia=?");
        $stmt2->bind_param('si',$titulo, $idNoticia);
        $stmt2->execute();
        $stmt2->close();
    }
    public function queryEditarRevista($idRevista,$titulo)
    {
        $stmt2 = $this->conexion->prepare("UPDATE diario_revista SET  Titulo=?  WHERE Id=?");
        $stmt2->bind_param('si',$titulo, $idRevista);
        $stmt2->execute();
        $stmt2->close();
    }
    public function queryBorrarNoticia($idNoticia)
    {

        $stmt = $this->conexion->prepare("DELETE FROM Noticia  WHERE Cod_noticia=?");
        $stmt->bind_param('i', $idNoticia);
        $stmt->execute();
        $stmt->close();

    }
    public function queryBorrarRevista($idRevista)
    {
        $stmt = $this->conexion->prepare("DELETE FROM Diario_Revista  WHERE Id=?");
        $stmt->bind_param('i', $idRevista);
        $stmt->execute();
        $stmt->close();

    }



    public function queryInsert($sql){
        mysqli_query($this->conexion, $sql);
    }

    public function querySearch($sql){
        mysqli_query($this->conexion, $sql);
    }
    public function close(){
        mysqli_close($this->conexion);
    }
}