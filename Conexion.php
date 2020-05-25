<?php
class Conexion {
    private $con;
    public function _contruct()
    {
        $this-> = new mysql('localhost','root','Oaxacaqueando');
    }
    public function getUsers(){
        $query = $this->con->$query('SELECT * FROM usuarios');
        $retorno = [];
        $i = 0;
        while ($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
        retorno $retorno;
    }
} 

?>