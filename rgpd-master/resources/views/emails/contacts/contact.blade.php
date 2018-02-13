
@component('mail::message')
# Contact RGPD

@component('mail::panel')
## Information Client :

Client : {{ $contact['nom'] }}

Email Client : {{ $contact['email'] }}
@endcomponent

@component('mail::panel')
### Messsage du client :

{{ $contact['message'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
