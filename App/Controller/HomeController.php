<?php
namespace App\Controller;

if (!defined('APP_ROOT_PATH')) {die('NOT FOUND REQUEST');}

use App\Controller\Controller;


class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'id' => 10,
            'user' => 'test'
        ];
        echo $this->responseJson($data);
    }

    public function exp()
    {
        echo "<pre>";
        var_dump(getParamQueryString('p'));
    }
}