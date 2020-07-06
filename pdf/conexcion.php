<?php

$mysqli=new mysqli('localhost:3307','root','','Infonete');

if($mysqli->connect_error){
    die('Error en la conecxion' . $mysqli->connect_error);
}