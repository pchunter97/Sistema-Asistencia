<?php
    include_once 'api_usuarios.php';
    $api = new ApiUsuarios();

    if(isset($_GET)){
        $api->getAll();
        echo $api->getAll();
        return $api->getAll();
    }
?>