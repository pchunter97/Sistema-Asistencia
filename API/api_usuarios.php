<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once 'usuarios.php';

class ApiUsuarios
{
    function GetAll()
    {
        $usuario = new Usuario();
        $usuarios['users'] = array();
        $data = $usuario->obtenerUsuarios();
        
        if($data->rowCount())
        {
            while($row = $data->fetch(PDO::FETCH_ASSOC))
            {
                $item=array(
                    "id" => $row['idusuario'],
                    "nombre" => $row['nombre'],
                    "apellidos" => $row['apellidos'],
                    "login" => $row['login'],
                    "email" => $row['email'],
                    "idtipousuario" => $row['idtipousuario'],
                    
                );
                array_push($usuarios['users'], $item);
               // $this->printJSON($usuarios);
            }
            http_response_code(200);
            return json_encode($usuarios);
        }
        else
        {
            http_response_code(404);
            echo json_encode(
                array("message" => "No hay usuarios")
            );
        }
        
    }

    function error($mensaje)
    {
        http_response_code(404);
        echo json_encode(
            array("message" => $mensaje)
        );
    }

    function printJSON($data)
    {
        echo '<code>'.json_encode($data).'</code>';
    }
}
?>