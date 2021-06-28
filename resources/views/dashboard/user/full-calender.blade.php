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
    <h1 class="text-center">Choississez une date qui vous convient :</h1>
    <br />

    <div id="calendar"></div>

</div>
   
<script>

$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events:'/full-calender',
        eventClick:function(event)
        {
                prompt('this is event.count : ' + event.count);
                prompt('this is event.id : ' + event.id);
                prompt('this is event : ' + event);
                var count = event.count;
                console.log(event);
            if(confirm("voulez vous venir ?"))
            {
                var id = event.id;
                // prompt('this is event.id : ' + event.id);
                // prompt('this is event.id : ' + event.title);
                // prompt('this is event.id : ' + event.start);
                //alert("you are in line 48");
                //alert(count);
                $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    count: count,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated Successfully");
                }
            })
            }
        }

    });

    

});
  
</script>

@endsection