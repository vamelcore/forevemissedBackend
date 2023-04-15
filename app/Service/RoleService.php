<?php

namespace App\Service;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Support\Facades\Cache;

class RoleService
{
    public function list()
    {
        return RoleResource::collection(Cache::remember(
            'roles',
            config('cache.default_timeout'),
            function () {
                return Role::all();
            }
        ));
    }
}
