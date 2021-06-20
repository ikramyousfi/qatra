@component('mail::message')
    # Thank you for your message

     Name {{ $data['name'] }}
     Email {{ $data['email'] }}

     Message

    {{ $data['message'] }}
@endcomponent
