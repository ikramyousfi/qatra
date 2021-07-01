@extends('layouts.app')
@section('headers')

    <title>Donneur | Calendrier</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>


@endsection
@section('content')
    <div class="container">
        <br />
        <h1 class="text-center">Choississez une date qui vous convient :</h1>
        <br />

        <div id="calendar"></div>

    </div>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    center: 'title',
                    left: 'prev,next today',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: '/full-calender',
                eventClick: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH');
                    var today = moment().format('YYYY-MM-DD');
                    if (start < today) {
                        alert("Cette évenement est inaccessible");
                    } else {
                        alert(event.title);
                    }
                }
            });



        });

    </script>

@endsection
