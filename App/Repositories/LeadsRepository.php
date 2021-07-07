<?php

namespace App\Repositories;

if (!defined('APP_ROOT_PATH')) {die('NOT FOUND REQUEST');}

use App\Repositories\BaseRepository;

class LeadsRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllLeads()
    {
        $response = $this->vtiger->query('*', 'Leads');
        return $response;
    }
}