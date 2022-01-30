<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/latest/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    Admin Login
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/login')}}" method="POST">
@csrf
                    <div class="form-group">
                        <label for="email">
                            Email
                        </label>
                        <input type="email" name="email" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="password" class="form-control" id="">
                    </div>
                    <input type="submit" name="" value="Login" class="btn btn-primary mt-3" id="">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
