<?php

class Database
{

    private $conexion;

    public function __construct()
    {
        $configuracion = parse_ini_file("config/config.ini");
        $servername = $configuracion["servername"];
        $username = $configuracion["username"];
        $dbname = $configuracion["dbname"];
        $password = $configuracion["password"];

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("Fallo la conexion: " . $conn->connect_error);
        }
        $conn->select_db($dbname);
        $this->conexion = $conn;
    }

    public function query($usuario, $clave)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM Usuario WHERE Nombre = ? and Pass = ?");
        $stmt->bind_param('ss', $usuario, $clave);

        // set parameters and execute
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            $_SESSION["loginError"] = "error";
        }

        while ($row = $result->fetch_assoc()) {
            $resultado = $row['Id_usuario'] . "-" . $row['Nombre'] . "-" . $row['Cod_Usuario'];
        }
        // se guarda el usuario recuperado de la consulta en SESSION
        $_SESSION["usuarioOK"] = $resultado;
        $stmt->close();
        $this->conexion->close();
    }

    public function queryBuscarUsuarios()
    {

        $stmt = $this->conexion->prepare("SELECT * FROM usuario  where Cod_Usuario=1");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $_SESSION["sinDatos"] = "0";
        } else {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $id = $row['Id_usuario'];
                $nombre = $row['Nombre'];
                $clave = $row['Pass'];
                $nroDoc = $row['Nro_doc'];
                $codDoc = $row['Cod_doc'];
                $mail = $row['Mail'];
                $telefono = $row['Telefono'];
                $cod_usuario = $row['Cod_Usuario'];


                $resultados[$i] = $id . "-" . $nombre . "-" . $clave . "-" . $nroDoc . "-" . $codDoc . "-" . $mail . "-" . $telefono . "-" . $cod_usuario;

                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["admin"] = $resultados;
        }

        $stmt->close();

        $stmt2 = $this->conexion->prepare("SELECT * FROM usuario  where Cod_Usuario=2");
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($result2->num_rows === 0) {
            $_SESSION["sinDatos"] = "0";
        } else {
            $i = 1;
            while ($row = $result2->fetch_assoc()) {
                $id = $row['Id_usuario'];
                $nombre = $row['Nombre'];
                $clave = $row['Pass'];
                $nroDoc = $row['Nro_doc'];
                $codDoc = $row['Cod_doc'];
                $mail = $row['Mail'];
                $telefono = $row['Telefono'];
                $cod_usuario = $row['Cod_Usuario'];


                $resultados[$i] = $id . "-" . $nombre . "-" . $clave . "-" . $nroDoc . "-" . $codDoc . "-" . $mail . "-" . $telefono . "-" . $cod_usuario;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["contenidista"] = $resultados;
        }

        $stmt2->close();

        $stmt3 = $this->conexion->prepare("SELECT * FROM usuario  where Cod_Usuario=3");
        $stmt3->execute();
        $result3 = $stmt3->get_result();

        if ($result3->num_rows === 0) {
            $_SESSION["sinDatos"] = "0";
        } else {
            $i = 1;
            while ($row = $result3->fetch_assoc()) {
                $id = $row['Id_usuario'];
                $nombre = $row['Nombre'];
                $clave = $row['Pass'];
                $nroDoc = $row['Nro_doc'];
                $codDoc = $row['Cod_doc'];
                $mail = $row['Mail'];
                $telefono = $row['Telefono'];
                $cod_usuario = $row['Cod_Usuario'];


                $resultados[$i] = $id . "-" . $nombre . "-" . $clave . "-" . $nroDoc . "-" . $codDoc . "-" . $mail . "-" . $telefono . "-" . $cod_usuario;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["lector"] = $resultados;
        }

        $stmt3->close();
        $this->conexion->close();
    }

    public function queryBuscarNoticias()
    {

        $resultados = array();
        $stmt = $this->conexion->prepare("SELECT * FROM Noticia ");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $_SESSION["sinNoticias"] = "0";
        } else {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $codNoticia = $row['Cod_noticia'];
                $titulo = $row['Titulo'];
                $subTitulo = $row['Subtitulo'];
                $estadoAutorizado = $row['EstadoAutorizado'];
                $imagen=$row ["imagen_noticia"];


                $resultados[$i] = $codNoticia . "-" . $titulo . "-" . $subTitulo . "-" . $estadoAutorizado . "-".$imagen;
                $i++;
            }


            return $resultados;
        }

        $stmt->close();
    }

    public function queryBuscarRevistas()
    {
        $resultados = array();
        $stmt2 = $this->conexion->prepare("SELECT * FROM Diario_Revista");
        $stmt2->execute();
        $result = $stmt2->get_result();

        if ($result->num_rows === 0) {
            $_SESSION["sinDatos"] = "0";
        } else {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $id = $row['Id'];
                $titulo = $row['Titulo'];
                $numero = $row['Numero'];
                $descripcion = $row['Descripcion'];
                $imagen = $row['imagen_revista'];

                $resultados[$i] = $id . "-" . $titulo . "-" . $numero . "-" . $descripcion . "-".$imagen;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION


            return $resultados;

        }
        $stmt2->close();
        $this->conexion->close();

    }

    public function queryBuscarSeccion()
    {
        $resultados=array();

        $stmt = $this->conexion->prepare("SELECT * FROM Seccion ");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $_SESSION["sinSeccion"] = "0";
        } else {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $codSeccion = $row['Cod_seccion'];
                $descripcion = $row['Descripcion'];


                $resultados[$i] = $codSeccion . "-" . $descripcion;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            return $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function queryBuscarSuscripcionRevista()
    {
        $resultados=array();

        $stmt = $this->conexion->prepare("SELECT * FROM lector_SuscripcionRevista ");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $_SESSION["sinSeccion"] = "0";
        } else {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $id = $row['Id'];
                $titulo = $row['Titulo'];
                $numero = $row['Numero'];
                $descripcion = $row['Descripcion'];
                $imagen = $row['imagen_revista'];

                $resultados[$i] = $id . "-" . $titulo . "-" . $numero . "-" . $descripcion . "-".$imagen;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            return $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function queryBuscarNoticiasPorLector($idUsuario)
    {
        $resultados=array();
        $stmt = $this->conexion->prepare("  select * from diario_revista 
                                                where id in (select Cod_revista
					                            from Lector_SuscripcionRevista
                                                where id_usuario = 1);
                                                ");
        $stmt->bind_param('i', $idUsuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $_SESSION["sinDatos"] = "0";
        } else {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $id_usuario = $row['Id_usuario'];
                $cod_revista = $row['Cod_revista'];


                $resultados[$i] = $id_usuario . "-" . $cod_revista ;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            var_dump($resultados);
            exit;
            return $resultados;
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

    public function queryEditarNoticia($idNoticia, $cuerpoNoticia, $titulo)
    {
        $stmt = $this->conexion->prepare("UPDATE Noticia SET  informe_noticia=?  WHERE Cod_noticia=?");
        $stmt->bind_param('si', $cuerpoNoticia, $idNoticia);
        $stmt->execute();
        $stmt->close();

        $stmt2 = $this->conexion->prepare("UPDATE Noticia SET  Titulo=?  WHERE Cod_noticia=?");
        $stmt2->bind_param('si', $titulo, $idNoticia);
        $stmt2->execute();
        $stmt2->close();
    }

    public function queryEditarRevista($idRevista, $titulo)
    {
        $stmt2 = $this->conexion->prepare("UPDATE diario_revista SET  Titulo=?  WHERE Id=?");
        $stmt2->bind_param('si', $titulo, $idRevista);
        $stmt2->execute();
        $stmt2->close();
    }

    public function queryEditarSeccion($idSeccion, $titulo)
    {
        $stmt2 = $this->conexion->prepare("UPDATE Seccion SET  Descripcion=?  WHERE Cod_seccion=?");
        $stmt2->bind_param('si', $titulo, $idSeccion);
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
        $stmt2 = $this->conexion->prepare("DELETE FROM Seccion  WHERE Cod_revista=?");
        $stmt2->bind_param('i', $idRevista);
        $stmt2->execute();
        $stmt2->close();
        $stmt = $this->conexion->prepare("DELETE FROM Diario_Revista  WHERE Id=?");
        $stmt->bind_param('i', $idRevista);
        $stmt->execute();
        $stmt->close();

    }

    public function queryBorrarSeccion($idSeccion)
    {
        $stmt = $this->conexion->prepare("DELETE FROM Seccion  WHERE Cod_seccion=?");
        $stmt->bind_param('i', $idSeccion);
        $stmt->execute();
        $stmt->close();

    }

    public function queryBorrarUsuario($idUsuario)
    {
        $stmt = $this->conexion->prepare("DELETE FROM usuario  WHERE Id_usuario=?");
        $stmt->bind_param('i', $idUsuario);
        $stmt->execute();
        $stmt->close();

    }


    public function queryInsert($sql)
    {
        mysqli_query($this->conexion, $sql);
    }

    public function querySearch($sql)
    {
        mysqli_query($this->conexion, $sql);
    }

    public function close()
    {
        mysqli_close($this->conexion);
    }
}