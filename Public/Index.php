<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\UserController;
use App\Controller\NotFoundController;
use App\Model\Data;

$uri = explode("/", trim($_SERVER["REQUEST_URI"], "/"));
$route = $uri[0] ?? "";

$requestMethod = $_SERVER["REQUEST_METHOD"];

header("Content-Type: application/json");

// Arquivo de clientes
$clientesFile = __DIR__ . '/clientes.json';

if (!file_exists($clientesFile)) {
    $clientes = [
        ["id" => 1, "nome" => "Maria Silva", "contato" => "maria@email.com"],
        ["id" => 2, "nome" => "João Souza", "contato" => "joao@email.com"],
    ];
    file_put_contents($clientesFile, json_encode($clientes));
} else {
    $clientes = json_decode(file_get_contents($clientesFile), true) ?? [];
}

switch ($route) {
    case "freelancers":
        $controller = new UserController();
        $controller->render();
        break;

    case "clientes":
        if ($requestMethod == "GET") {
            echo json_encode($clientes);
        } elseif ($requestMethod == "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            $clientes[] = [
                "id" => count($clientes) + 1,
                "nome" => $data["nome"],
                "contato" => $data["contato"]
            ];
            file_put_contents($clientesFile, json_encode($clientes));
            echo json_encode(["success" => true]);
        }
        break;

    case "orcamentos":
        if ($requestMethod == "GET") 
            {
            echo json_encode([
                ["id" => 1, "cliente" => "Maria Silva", "total" => 3000, "status" => "Aprovado"]
            ]);
        }
        break;

    default:
        http_response_code(404);
        $controller = new NotFoundController
        (controlDefined: false, controlUndefined: true);
        $controller->render();
        break;
}
