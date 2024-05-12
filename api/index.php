<?php
$request_uri = $_SERVER['REQUEST_URI'];
$request_path = str_replace('/api/', '', $request_uri);
$path_segments = explode('/', $request_path);
$resource = isset($path_segments[0]) ? $path_segments[0] : '';

switch ($resource) {
    case 'empreses':
        if (count($path_segments) == 1) {
            echo "Lista de empresas";
        } elseif (count($path_segments) == 2 && is_numeric($path_segments[1])) {
            $empresa_id = $path_segments[1];
            echo "Detalles de la empresa con ID: $empresa_id";
        } else {
            http_response_code(400);
            echo "Solicitud no válida";
        }
        break;
    case 'valoracions':
        if (count($path_segments) == 1) {
            echo "Lista de valoraciones";
        } else {
            http_response_code(400);
            echo "Solicitud no válida";
        }
        break;
    default:
        http_response_code(404);
        echo "Recurso no encontrado";
        break;
}
?>
