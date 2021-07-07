<?php

namespace App\Repositories;

if (!defined('APP_ROOT_PATH')) {die('NOT FOUND REQUEST');}

use App\Vtiger\Adapter\BuzzAdapter;
use App\Vtiger\Vtiger;

class BaseRepository
{
    protected $adapter;
    protected $vtiger;

    public function __construct()
    {
        $this->adapter = new BuzzAdapter();
        $this->vtiger  = new Vtiger(
            $this->adapter,
            CRM_URL,
            CRM_USER,
            CRM_ACCESS_KEY
        );
    }
}