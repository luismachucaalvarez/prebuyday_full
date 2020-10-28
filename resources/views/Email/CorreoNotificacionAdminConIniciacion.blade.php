@component('mail::message')

    Hola:

    Te notificamos que se acaba de registrar un nuevo vendedor en el sistema de Preinscripcion:

    Nombre Completo: {{ $mailData['nombre_contacto'] }}
    Telefono de contacto: {{ $mailData['telefono_contacto'] }}
    Correo: {{ $mailData['email_contacto'] }}
    Nombre Fantasia Comercio: {{ $mailData['nombre_fantasia_comercio'] }}
    Iniciación de actividades: {{ $mailData['iniciacion'] }}


    Puedes encontrar la ficha del nuevo contacto en la siguiente dirección:





@endcomponent
