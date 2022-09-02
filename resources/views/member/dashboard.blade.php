@extends('layouts.master')

@section('content')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <div id='calendar'></div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Edit Appointment</h4>

                    Start time:
                    <br />
                    <input type="text" class="form-control" name="start_time" id="start_time">

                    End time:
                    <br />
                    <input type="text" class="form-control" name="finish_time" id="finish_time">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="button" class="btn btn-primary" id="appointment_update" value="Save">
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                initialView: 'dayGridMonth',
                selectable: true,
                events : [
                        @foreach(auth()->user()->attendances as $a)
                    {
                        title : '{{ $a->status }}',
                        start : '{{ $a->date }}',
                        color: 'green'
                    },
                    @endforeach
                ],
                eventClick: function(calEvent, jsEvent, view) {
                    alert('Event: ' + calEvent.title);
                },
                dateClick: function(info) {
                    console.log(info)
                    alert('selected ' + info.startStr + ' to ' + info.endStr);
                }
            });
        });
    </script>
@endsection



