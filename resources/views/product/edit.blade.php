@extends('Layout.master')
@section('content')
<div>
    <a href="{{route('product.index')}}" class="btn btn-sm btn-success">Back</a>
</div>
<form action="{{route('product.update',$watch->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="cat">Category</label>
        <select name="category_id" class="form-control" id="">
            @foreach ($category as $cat)
            <option value="{{$cat->id}}"
                @if ($cat->id==$watch['category-id'])
                  selected
                @endif >{{$cat->name}}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        @foreach ($watchcolor as $c)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name='colors[]' value="{{$c->id}}" id="{{$c->name}}"
@foreach ($tag as $t)
@if ($t->watchcolor_id===$c->id)
checked
@endif
@endforeach
            >
            <label class="form-check-label" for="{{$c->name}}">
              {{$c->name}}
            </label>
          </div>
        @endforeach
    </div>
    {{-- <div class="form-group">
        <label for="color">Color</label>
        <select name="color_id" class="form-control" >
            @foreach ($color as $col)
            <option value="{{$col->id}}"
                @if ($col->id==$watch->color_id)
                selected
                @endif
                >{{$col->name}}</option>
            @endforeach
        </select>
    </div> --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{$watch->name}}" name="name" id="">
        </div>
        <div class="form-group">
            <label for="price">PRice</label>
            <input type="number" class="form-control" value="{{$watch->price}}" name="price" id="">
        </div>
        <div class="form-group">
            <label for="description">Description</label>


            <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{$watch->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="" >
        </div>
        <img src="{{asset('/images/'.$watch->image)}}" width="100px" height="100px" alt="">
<input type="submit" value="Update" class="btn btn-success" name="" id="">


</form>

@endsection
