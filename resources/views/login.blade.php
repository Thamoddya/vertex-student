<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vertex Co - Student | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="row mt-5">
                <div class="col-md-5 offset-md-1 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="p-3 text-white">Vertex Co - Student Management</h3>
                        </div>
                        <div class="col-12">
                            <form action="{{route('team.login')}}" method="POST">
                                @csrf
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-white" >Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                                           placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-white">Password</label>
                                    <input type="text" class="form-control" name="password"
                                           placeholder="">
                                </div>

                                @if(session('success'))
                                    <a  href="{{route('home')}}">Login Success.Click Here To Go Admin panel</a>
                                @else
                                    <button type="submit" class="btn btn-primary">Login</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <img src="{{asset('images/pexels-fauxels-3184436.jpg')}}" class="img-fluid rounded rounded-2">
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
