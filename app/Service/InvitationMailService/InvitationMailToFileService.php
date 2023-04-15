<?php

namespace App\Service\InvitationMailService;

use App\Contracts\InvitationMailInterface;
use App\DTOs\InvitationMailDTO;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;

class InvitationMailToFileService implements InvitationMailInterface
{
    public function send(string $email, InvitationMailDTO $recipient)
    {
        Mail::mailer('file')
            ->to($email)
            ->later(now()->addMinute(), new InvitationMail($recipient));
    }
}
