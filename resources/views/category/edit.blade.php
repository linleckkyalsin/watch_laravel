@extends('Layout.master')
@section('content')
<div>
    <a href="{{route('category.index')}}" class="btn btn-sm btn-success">Back</a>
</div>
<form action="{{route('category.update',$category->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Enter Category</label>
        <input type="text" name="name" value="{{$category->name}}" id="">
        <div class="mt-3">
<input type="submit" class="btn btn-sm btn-danger"  value="Update">
        </div>
    </div>

</form>
@endsection
