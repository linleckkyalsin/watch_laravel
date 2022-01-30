@extends('Layout.master')
@section('content')
<div>

    <a href="{{route('product.create')}}" class="btn btn-sm btn-success">Create</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>

            @foreach ($watch as $c)
            <tr>
<td>
    <img src="{{asset('/images/'.$c->image)}}" width='100px' height="100px" alt="">
</td>
            <td>{{$c->name}}</td>
            <td>
                <a href="{{route('product.edit',$c->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{route('product.destroy',$c->id)}}" class="d-inline" method="POST" >
                    @csrf
                    @method('DELETE')
                     <input type="submit" class="btn btn-danger d-inline" value='Delete'>
                </form>

            </td>
        </tr>
            @endforeach


    </tbody>
</table>
{{$watch->links()}}
@endsection
