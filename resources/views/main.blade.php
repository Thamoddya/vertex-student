<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vertex Co - Student</title>
    <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css')}}">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- FullCalendar CSS -->
    <!-- FullCalendar CSS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        let currentTimestamp = {{ time() * 1000 }};
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'today prev,next ',
                    center: 'title',
                    right: 'dayGridYear,dayGridMonth,timeGridWeek'
                },
                initialView: 'dayGridYear',
                initialDate: new Date(currentTimestamp),
                editable: true,
                selectable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                // businessHours: true,
                weekends: true,
                events: {!! json_encode($siteDate['events'])  !!},

            });

            calendar.render();
        });
    </script>

    <style>
        .fc-toolbar-title {
            color: aliceblue;
        }
    </style>

</head>

<body class="bg-dark" id="body-pd">

<div class="container-fluid" id="dashboard">
    @include('components.sidebar')
    <div class="row mt-5" >
        <div class="col-md-4 bg-secondary border border-dark border-2">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mt-3">DASHBOARD</h4>
                    <hr class="text-white">
                </div>
                <div class="col-12">
                    <table class="table table-success table-bordered ">
                        <tr>
                            <td>STUDENTS :-<span> {{$siteDate['studentCount']}}</span></td>
                            <td>EVENTS :- <span> {{$siteDate['eventCount']}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 bg-secondary border border-dark border-2">
            <div class="row">
                <div class="col-4 d-flex p-2 align-items-center justify-content-center ">
                    <img src="https://vertexcooperation.com/image/{{$siteDate['userData']['username']}}.png" alt="image"
                         style="border-radius: 50%;width: 100px;border: 2px solid aqua;">
                </div>
                <div class="col-8 p-3 text-justify">
                    <h5 class="text-white">{{$siteDate['userData']['name']}}
                        <span> <p>{{$siteDate['userRole']}}</p>  <p>{{$siteDate['userData']['mobile']}}</p></span>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 bg-secondary border border-dark border-2">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mt-3">UPCOMING EVENTS</h4>
                    <hr class="text-white">
                </div>
                <div class="col-12">
                    <ul>
                        <li class="text-white">{{$siteDate['upcomingEvent']['day_name']}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
       @if($siteDate['userRole'] == 'Founder')
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-white mt-3">ADMIN AREA</h4>
                        <hr class="text-white">
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-white mt-3">TEAM MEMBERS</h5>
                                        <hr class="text-white">
                                    </div>
                                    <div class="col-12">
                                       <div class="row">
                                           @foreach($siteDate['users'] as $user)
                                               <a class="btn btn-primary col-6 mb-2 border border-dark border-3" data-bs-toggle="collapse"
                                                  href="#{{$user['username']}}"
                                                  role="button" aria-expanded="false" aria-controls="multiCollapseExample1">{{$user['name']}}
                                               </a>
                                               <div class="collapse multi-collapse" id="{{$user['username']}}">
                                                   <div class="card card-body">
                                                       <div class="row">
                                                           <div class="col-12">
                                                               <p>Name :- {{$user['name']}}</p>
                                                               <p>Username :- {{$user['username']}}</p>
                                                               <p>Last Login:- {{ \Carbon\Carbon::parse($user['last_login'])->format('l, F j, Y \a\t g:i A') }}</p>
                                                               <p>Mobile :-{{$user['mobile']}}</p>
                                                               <form method="post" action="{{route('send-team-email')}}">
                                                                   @csrf
                                                                   <input type="text" class="form-control d-none" name="email" value="{{$user['email']}}">
                                                                   <div class="input-group input-group-sm mb-3">
                                                                       <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
                                                                       <input type="text" class="form-control" name="message" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                   </div>
                                                                   <button type="submit">Send Message</button>
                                                               </form>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           @endforeach
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-white mt-3">MEMBER REGISTER</h5>
                                        <hr class="text-white">
                                    </div>
                                    <div class="col-12">
                                        <form method="post" class="row" action="{{route('add-team-member')}}">
                                            @csrf
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">Name </span>
                                                    <input type="text" class="form-control" name="Name" aria-label="Name" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">Email </span>
                                                    <input type="text" class="form-control" name="email" aria-label="Email" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">Mobile </span>
                                                    <input type="text" class="form-control" name="mobile" aria-label="Mobile" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">Username </span>
                                                    <input type="text" class="form-control" name="username" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">Password </span>
                                                    <input type="text" class="form-control" name="password" aria-label="Password" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <select class="form-select" name="role" aria-label="Default select example">
                                                    @foreach($siteDate['role'] as $role)
                                                        <option value="{{$role['id']}}">{{$role['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" class="btn btn-primary">REGISTER</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       @endif
    </div>
    <hr class="mt-3 mb-3 text-secondary">
    <div class="row " id="users">

    </div>
    <hr class="text-success">
    <div id="calender">
        <div class="col-12 mt-3 mb-3" id="calendar"></div>
    </div>
    <hr class="mt-3 mb-3 text-secondary">
    <div class="row" id="events">
        <div class="col-4">
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
        <div class="col-md-6">
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
    </div>
    <hr class="mt-3 mb-3 text-secondary">
    <div class="row" id="student">
        <div class="col-6">
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
                            <input type="text" class="form-control @error('student_name') is-invalid @enderror"
                                   placeholder="Type Student Name" aria-label="Student Name" name="student_name"
                                   aria-describedby="basic-addon1">
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
        <div class="col-md-6">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mt-3">MARK ATTENDANCE</h4>
                    <hr class="text-white">
                </div>
                <div class="col-12">
                    <form method="get" action="{{route('addAttendance')}}">
                        @csrf
                        @if(session('attendanceMessage'))
                            <p class="text-success">{{session('attendanceMessage')}}</p>
                        @endif
                        <select class="form-select mb-3" aria-label="eventSelector" id="eventSelector">
                            <option selected>Select An Event To Load Student</option>
                            @foreach($events as $event)
                                <option data-event-id="{{ $event->id }}">{{ $event->event_name }}</option>
                            @endforeach
                        </select>
                        <select class="form-select mb-3" aria-label="studentSelector" id="studentSelector"
                                name="student_id">

                        </select>
                        <select class="form-select mb-3" aria-label="studentSelector" name="day_id">
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
    </div>
</div>

<script src="{{asset('js/script.js')}}"></script>
@if(session('success'))
    <script>
        Toastify({
            text: '{{ session('success') }}',
            duration: 5000,
            close: true,
            gravity: 'top',
            style: {
                background: "linear-gradient(to right, #ff0000, #cc0000)",
            },
        }).showToast();
    </script>
@endif
</body>
</html>
