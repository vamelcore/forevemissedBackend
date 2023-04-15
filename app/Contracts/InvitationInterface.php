<?php

namespace App\Contracts;

use App\Http\Requests\InvitationRequest;

interface InvitationInterface
{
    public function process(InvitationRequest $request);
}
