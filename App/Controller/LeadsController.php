<?php
namespace App\Controller;

if (!defined('APP_ROOT_PATH')) {die('NOT FOUND REQUEST');}

use App\Controller\Controller;
use App\Repositories\LeadsRepository;


class LeadsController extends Controller
{
    private $leadsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->leadsRepository = new LeadsRepository();
    }

    public function index()
    {
        $response = $this->leadsRepository->getAllLeads();
        echo $this->responseJson($response);
    }
}