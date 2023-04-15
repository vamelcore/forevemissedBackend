<?php

namespace App\Service;

use App\Contracts\InvitationInterface;

class InvitationService implements InvitationInterface
{
    public function process($request)
    {
        return response()->json([
            'success' => true
        ]);
    }
}
