<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Service\RoleService;

class RoleController extends Controller
{
    public function __construct(
        protected RoleService $service
    )
    {
    }

    public function list()
    {
        return $this->service->list();
    }
}
