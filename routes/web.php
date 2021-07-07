<?php
if (!defined('APP_ROOT_PATH')) {die('NOT FOUND REQUEST');}

$uri        = $_SERVER['REQUEST_URI'];
$rootString = $_SERVER['PHP_SELF'];
$rootFolder = dirname($rootString);

$strController = substr($uri,strlen($rootFolder)+1) ;
if(!empty($strController)){
    $arrController = explode('/', $strController);
    
    $GLOBALS['fullParams'] = $arrController;
    $GLOBALS['paramsQuery'] = array_slice($arrController, 2);

    $controller    = ucfirst($arrController[0] ?? 'home');
    $method        = $arrController[1] ?? 'index';
    $queryString   = strpos($method, '?');
    if($queryString !== false){
        $method = substr($method, 0, $queryString);
    }
} else {
    $controller = 'Home';
    $method     = 'index';
    $GLOBALS['fullParams'] = [];
    $GLOBALS['paramsQuery'] = [];
}

$obj = NAME_SPACE_CONTROLLER . "{$controller}Controller";
$checkController = str_replace('\\','/',trim($obj,'\\')).'.php';

if(file_exists($checkController)){
    $request = new $obj();
    $request->$method(...$paramsQuery);
}else {
    header('Content-type: application/json');
    echo json_encode([
        'cod' => 500,
        'message' => 'Not found request'
    ]);
}

