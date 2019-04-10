<?php
//Display error :D
ini_set('display_errors', 1);
error_reporting(-1);

/*
    require_once('app/config/Database.php');

    $db = new Database();


$rows = $db -> select('select email from user');
    if($rows != false){
        echo json_encode($rows);
    }else {
        echo "errors";
    }
*/

    $request = $_SERVER['SCRIPT_URL'];
    //print_r($_SERVER["SCRIPT_URL"]);
    //print_r($_SERVER);
    switch ($request) {
        case '/' :
            require __DIR__ . '/app/views/home.php';
            break;
        case '' :
            require __DIR__ . '/app/views/home.php';
            break;
        case '/api/login' :
            require __DIR__ . '/app/controllers/login.php';
            break;
        case '/api/user' :
            $request_method = $_SERVER['REQUEST_METHOD'];
            require __DIR__ . '/app/controllers/UserController.php';

            if($request_method == 'POST'){
                $user = new UserController();
                $user ->create();
            }

            if($request_method == 'GET') {
                $user = new UserController();
                $user -> get();
            }

            break;
        default:
            require __DIR__ . '/app/views/404.php';
            break;
    }


?>
