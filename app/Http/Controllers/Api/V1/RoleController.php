<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\RoleInterface;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct(
        protected RoleInterface $service
    )
    {
    }

    public function list()
    {
        return $this->service->list();
    }
}
