@extends('layouts.app')
@section('headers')
    <title>Gestionnaire | Calendrier</title>    
   
    
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
        <h3 class="text-center text-secondary">Selectionner une date qui vous convient pour recevoir les donneurs</h3>
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
                events: '/calendar',
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                        $.ajax({
                            url: "/calendar/action",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            success: function(data) {
                                calendar.fullCalendar('refetchEvents');
                                alert("un évenement a été crée avec succès");
                            }
                        })
                    }
                },
                editable: true,
                eventResize: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/calendar/action",
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
                            alert("l'évenement a été mis a jour avec succès");
                        }
                    })
                },
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/calendar/action",
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
                            alert("l'évenement a été mis a jour avec succès");
                        }
                    })
                },
                eventClick: function(event) {
                    if (confirm("Voulez-vous supprimer cet évenement ?")) {
                        var id = event.id;
                        $.ajax({
                            url: "/calendar/action",
                            type: "POST",
                            data: {
                                id: id,
                                type: "delete"
                            },
                            success: function(response) {
                                calendar.fullCalendar('refetchEvents');
                                alert("l'évenement a été supprimé avec succès");
                            }
                        })
                    }
                }
            });
        });

    </script>

@endsection
