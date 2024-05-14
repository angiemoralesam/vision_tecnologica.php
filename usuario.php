<?php
    //CLASE
    class usuario{

        //ATRIBUTOS
        private $user;
        private $pass;

        //METODOS
        function __construct($_user, $_pass)
        {
            $this->user = $_user;
            $this->pass = $_pass;
        }

        function iniciar_sesion(){
            include_once ("./conexion.php");
            $sql = "SELECT * FROM usuario WHERE nom = '".$this->user."' AND pass = '".$this->pass."' ";
            $res = $conn->query($sql);
            if($res->num_rows == 1){
                $row = $res->fetch_array();
                $this->user = $row[1];
            }
            return $res->num_rows;
        }
        function getUser(){
            return $this->user;
        }
    }
?>