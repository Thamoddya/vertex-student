<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vertex Co - Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mt-3">ADD A DAY</h4>
                    <hr class="text-white">
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('addDate')}}" >
                        @csrf
                        @if(session('message'))
                            <p>{{session('message')}}</p>
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Name :- </span>
                            <input type="text" class="form-control" placeholder="Type Date Name"  aria-label="Username" name="date_name" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Date :- </span>
                            <input type="date" class="form-control" placeholder="Type Date" name="date" aria-label="date" aria-describedby="basic-addon1">
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
                    <h4 class="text-white mt-3">ADD A DAY</h4>
                    <hr class="text-white">
                </div>
            </div>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select A User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>




</body>
</html>
