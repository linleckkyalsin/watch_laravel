<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/latest/css/bootstrap.min.css">
    <title>Document</title>

</head>
<body>

    <div class='container'>
        <div class="card p-5">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        <a href="{{route('category.index')}}">
                            <li class="list-group-item">Category</li>
                        </a>
<a href="{{route('product.index')}}">

    <li class="list-group-item">Product</li>
</a>
                        <li class="list-group-item">Order</li>
                        <a href="{{url('/admin/logout')}}">
                            <li class="list-group-item">Logout</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-9">
                   <div class="card p-3">
                       @if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
                       @endif
                       @if (session()->has('error'))
<div class="alert alert-danger">{{session()->get('error')}}</div>
                       @endif
                       @if ($errors->all())
@foreach ($errors->all() as $e)
<div class="alert alert-danger">{{$e}}</div>
@endforeach
                       @endif
                       @yield('content')
                   </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
