<?php

spl_autoload_register(static function ($class) {
    $class = str_replace('\\', '/', $class);
    include_once __DIR__ . "/$class.php";
});

function router($param): bool
{
    if ($param) {
        $controller = new Controller();
        switch ($param) {
            case '/parseMain':
                $controller->loadEvents();
                break;
            default: return false;
        }
    }
    return false;
}

function answer($data): array
{
    if ($data) {
        return array(
            "result" => "ok",
            "data" => $data
        );
    }
    return array(
        "result" => "error",
        "error" => array(
            "code" => 9000,
            "text" => "unknown error"
        )
    );
}

try {
    echo json_encode(answer(router($_SERVER['REQUEST_URI'])), JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo $e->getMessage();
}