<?php 

namespace App\Controller;

if (!defined('APP_ROOT_PATH')) {die('NOT FOUND REQUEST');}

class Controller
{
	public $method;

	public function __construct()
	{
		$this->method = trim(strtoupper($_SERVER['REQUEST_METHOD']));
	}

	protected function responseJson($data = [])
	{
		header('Content-type: application/json');
		return json_encode($data);
	}

	protected function isMethodPost()
	{
		if($this->method === 'POST'){
			return true;
		} else {
			return $this->responseJson([
				'cod' => 404,
				'message' => 'Request method invalid'
			]);
		}
	}

	public function __call($method,$arguments){
       $errors = [
		   'cod' => 500,
		   'message' => "{$method} not exists"
	   ];
	   $this->responseJson($errors);
    }
	
}