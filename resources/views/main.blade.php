<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vertex Co - Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mt-3">ADD AN EVENT</h4>
                    <hr class="text-white">
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('addEvent')}}">
                        @csrf
                        @if(session('event_message'))
                            <p class="text-success">{{session('event_message')}}</p>
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Event Name :- </span>
                            <input type="text" class="form-control" placeholder="Type Event Name" aria-label="Username"
                                   name="name" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Event Venue :- </span>
                            <input type="text" class="form-control" placeholder="Type Event Venue" aria-label="Username"
                                   name="venue" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Event Date :- </span>
                            <input type="date" class="form-control" placeholder="Type Date" name="date"
                                   aria-label="date" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="submit">Add Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mt-3">ADD A STUDENT</h4>
                    <hr class="text-white">
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('addStudent')}}">
                        @csrf
                        @if(session('student_message'))
                            <p class="text-success">{{session('student_message')}}</p>
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Student Name :- </span>
                            <input type="text" class="form-control @error('student_name') is-invalid @enderror" placeholder="Type Student Name" aria-label="Student Name" name="student_name" aria-describedby="basic-addon1">
                            @error('student_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Student Mobile :- </span>
                            <input type="text" class="form-control @error('mobile') is-invalid @enderror"
                                   placeholder="Type Student Mobile" aria-label="Mobile" name="mobile"
                                   aria-describedby="basic-addon1">
                            @error('mobile')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Student Email :- </span>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Type Student Email" aria-label="Email" name="email"
                                   aria-describedby="basic-addon1">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <select class="form-select @error('event_id') is-invalid @enderror" name="event_id"
                                aria-label="Default select example">
                            <option selected>Select An Event</option>
                            @foreach($events as $event)
                                <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                            @endforeach
                        </select>
                        @error('event_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="input-group mt-2">
                            <button class="btn btn-primary" type="submit">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mt-3">ADD A ATTENDANCE DATE</h4>
                    <hr class="text-white">
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('addDate')}}">
                        @csrf
                        @if(session('dateMessage'))
                            <p class="text-success">{{session('dateMessage')}}</p>
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Name :- </span>
                            <input type="text" class="form-control" placeholder="Type Date Name" aria-label="Username"
                                   name="date_name" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Date :- </span>
                            <input type="date" class="form-control" placeholder="Type Date" name="date"
                                   aria-label="date" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="submit">Add Date</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mt-3">MARK ATTENDANCE</h4>
                    <hr class="text-white">
                </div>
                <div class="col-12">
                    <form method="get" action="{{route('addAttendance')}}" >
                        @csrf
                        @if(session('attendanceMessage'))
                            <p class="text-success">{{session('attendanceMessage')}}</p>
                        @endif
                        <select class="form-select mb-3" aria-label="eventSelector" id="eventSelector" >
                            <option selected >Select An Event To Load Student</option>
                            @foreach($events as $event)
                                <option data-event-id="{{ $event->id }}">{{ $event->event_name }}</option>
                            @endforeach
                        </select>
                        <select class="form-select mb-3" aria-label="studentSelector" id="studentSelector" name="student_id">

                        </select>
                        <select class="form-select mb-3" aria-label="studentSelector"  name="day_id" >
                            <option>Select A Event Date</option>
                            @foreach($dates as $date)
                                <option value="{{$date->id}}">{{$date->day_name}}</option>
                            @endforeach
                        </select>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="submit">Add Attendance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const eventSelector = document.getElementById('eventSelector');
        const studentSelector = document.getElementById('studentSelector');

        eventSelector.addEventListener('change', function () {
            const selectedEventId = eventSelector.options[eventSelector.selectedIndex].getAttribute('data-event-id');

            fetch(`/getStudentsByEvent/${selectedEventId}`)
                .then(response => response.json())
                .then(data => {
                    // Clear existing student options
                    studentSelector.innerHTML = '';

                    data.forEach(student => {
                        const option = document.createElement('option');
                        option.text = student.name;
                        option.value = student.id;
                        studentSelector.add(option);
                    });
                });
        });
    });
</script>

</body>
</html>
