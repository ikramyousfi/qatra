@extends('layouts.app')
@section('headers')

    <title>Rendez-vous</title>
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
        <h2 class="text-center">Choisissez une date qui vous convient : </h2>
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
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = "{{ Auth::guard('doctor')->user()->region ?? '' }}";
                    title += "\n";
                    title += "{{ Auth::guard('doctor')->user()->adresse ?? '' }}";
                    var startTest = $.fullCalendar.formatDate(start, 'Y-MM-DD HH');
                    var today = moment().format('YYYY-MM-DD');
                    if (startTest < today) {
                        alert("Impossible d'ajouter un evenement");
                    } else {
                        if (confirm("Voulez-vous vraiment ajouter un évenement ?")) {
                            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                            $.ajax({
                                url: "/full-calender/action",
                                type: "POST",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    type: 'add'
                                },
                                success: function(data) {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("L'évenement a été crée avec succée");
                                }
                            })
                        }
                    }

                },
                editable: true,
                eventResize: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/full-calender/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("L'évenement a été modifié avec succée");
                        }
                    })
                },
                eventDrop: function(event, delta) {

                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/full-calender/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("L'évenement a été modifié avec succée");
                        }
                    })
                },

                eventClick: function(event) {
                    if (confirm("Voulez-vous vraiment supprimer l'évenement ?")) {
                        var id = event.id;
                        $.ajax({
                            url: "/full-calender/action",
                            type: "POST",
                            data: {
                                id: id,
                                type: "delete"
                            },
                            success: function(response) {
                                calendar.fullCalendar('refetchEvents');
                                alert("L'évenement a été supprimé avec succée.");
                            }
                        })
                    }
                }
            });

        });

    </script>

@endsection
