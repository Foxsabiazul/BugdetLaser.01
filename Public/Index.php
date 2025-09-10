<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\UserController;
use App\Controller\NotFoundController;

$uri = $_SERVER['REQUEST_URI'];

$pages = [
    '/freelancers' => new UserController()
];

$controller = $pages[$uri] ?? new NotFoundController();
$controller->render();

header("Content-Type: application/json");
    $controller->render();

$requestMethod = $_SERVER["REQUEST_METHOD"];
$uri = explode("/", trim($_SERVER["REQUEST_URI"], "/"));
$requestMethod = $_SERVER["REQUEST_METHOD"];
$clientesFile = __DIR__ . '/clientes.json';
if (file_exists($clientesFile)) {
    $clientes = json_decode(file_get_contents($clientesFile), true);
    if (!is_array($clientes)) {
        $clientes = [];
    }
} else {
    $clientes = [
        ["id" => 1, "nome" => "Maria Silva", "contato" => "maria@email.com"],
        ["id" => 2, "nome" => "João Souza", "contato" => "joao@email.com"],
    ];
    file_put_contents($clientesFile, json_encode($clientes));
}
    ["id" => 2, "nome" => "João Souza", "contato" => "joao@email.com"];

switch ($uriParts[0]) {
    case "clientes":
        if ($requestMethod == "GET") {
            echo json_encode($clientes);
        } elseif ($requestMethod == "POST") {
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
        if ($requestMethod == "GET") {
            echo json_encode([
                ["id" => 1, "cliente" => "Maria Silva", "total" => 3000, "status" => "Aprovado"]
            ]);
        }
        break;
    default:
        http_response_code(404);
        echo json_encode(["erro" => "Endpoint não encontrado"]);
        break;
}
?>  