<?php
    include_once 'db.php';
    class Usuario extends DB
    {
        function obtenerUsuarios()
        {
            $query= $this->connect()->query("SELECT * FROM usuarios");
            return $query;
        }
    }
?>