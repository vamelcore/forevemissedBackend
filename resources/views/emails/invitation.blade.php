<x-mail::message>
Hello: {{ $recipient->getName() }}, you are invited to service as a {{ $recipient->getRole() }}
Please click on Link Below.

<x-mail::button :url="''">
    Invitation Link
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
