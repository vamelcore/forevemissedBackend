<?php

namespace App\Contracts;

use App\DTOs\InvitationMailDTO;

interface InvitationMailInterface
{
    public function send(string $email, InvitationMailDTO $recipient);
}
