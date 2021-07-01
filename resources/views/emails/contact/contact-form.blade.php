@component('mail::message')
    # Merci pour votre message

     Name {{ $data['name'] }}
     Email {{ $data['email'] }}

     Message

    {{ $data['message'] }}
@endcomponent
