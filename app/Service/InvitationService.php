<?php

namespace App\Service;

use App\Contracts\InvitationInterface;
use App\Contracts\InvitationMailInterface;
use App\DTOs\InvitationMailDTO;
use App\Http\Requests\InvitationRequest;
use Illuminate\Http\Response;

class InvitationService implements InvitationInterface
{
    public function __construct(
        protected InvitationMailInterface $sendMail
    )
    {
    }
    public function process(InvitationRequest $request)
    {
        $recipients = $request->validated();

        foreach ($recipients['data'] as $recipient) {
            $dto = new InvitationMailDTO();
            $dto->setEmail($recipient['email']);
            $dto->setName($recipient['name']);
            $dto->setRole($recipient['role']);
            $this->sendMail->send($recipient['email'], $dto);
        }

        return response()->json([
            'success' => true
        ], Response::HTTP_CREATED);
    }
}
