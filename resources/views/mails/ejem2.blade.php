@component('mail::message')
    Hola **{{$name}}**,  {{-- use double space for line break --}}
    Te notificamos que hay un nuevo contacto.

    Click below to start working right now
    @component('mail::button', ['url' => $link])
        Go to your inbox
    @endcomponent
    Sincerely,
    Buyday.cl team.
@endcomponent

