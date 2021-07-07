<?php
if (!defined('APP_ROOT_PATH')) {die('NOT FOUND REQUEST');}

function getRootFolder()
{
    $rootString = $_SERVER['PHP_SELF'];
    return dirname($rootString);
}

function redirect($path = '', $params = [], $type = true)
{
    $arrControllerMethod = explode('/', $path);
    $stringParam = '';
    if(is_array($arrControllerMethod) && $arrControllerMethod){
        if($params){
            foreach ($params as $key => $p) {
                if($type){
                    $stringParam .= (empty($stringParam)) ? $p : '/' . $p ;
                } else {
                    $stringParam .= (empty($stringParam)) ? "?{$key}=".$p : "&{$key}=".$p;
                }
                
            }
        }
        if($stringParam){
            return getRootFolder()."/".$arrControllerMethod[0]."/".$arrControllerMethod[1] .'/' . $stringParam;
        } else {
            return getRootFolder()."/".$arrControllerMethod[0]."/".$arrControllerMethod[1];
        }
    }else{
        return getRootFolder();
    }
}

function getSegment($order = '')
{

    $data = $GLOBALS['fullParams'];
    if($order === ''){
        return $data;
    }
    return (is_numeric($order) && $order >= 0) ? ($data[$order] ?? '') : '' ;
}

function getParamQueryString($praramString = '')
{
    return $_GET[$praramString] ?? '';
}