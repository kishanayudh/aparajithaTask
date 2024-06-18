<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        @if(session('status'))
        <div class='alert alert-danger'>{{ session('status') }}</div>
        @endif
        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li class="">{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <div class="card">
            <div class="card-header">Login
            </div>
            <div class="card-body">
                <form action="{{ url('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Username</label>
                        <input type="text" class="form-control" placeholder="Enter Username" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>

                </form>
            </div>
        </div>
    </div>

</body>

</html>