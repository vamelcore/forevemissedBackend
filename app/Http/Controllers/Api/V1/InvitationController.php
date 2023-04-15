<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\InvitationInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\InvitationRequest;

class InvitationController extends Controller
{
    public function __construct(
        protected InvitationInterface $service
    )
    {}

    public function process(InvitationRequest $request)
    {
        return $this->service->process($request);
    }
}
