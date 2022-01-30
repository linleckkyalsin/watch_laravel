@extends('Layout.master')
@section('content')
<div>
    <a href="{{route('product.index')}}" class="btn btn-sm btn-success">Back</a>
</div>
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="cat">Category</label>
        <select name="category_id" class="form-control" id="">
            @foreach ($category as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach

        </select>
    </div>
  <div class="form-group">
      @foreach ($watchcolor as $color)
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name='colors[]' value="{{$color->id}}" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          {{$color->name}}
        </label>
      </div>
      @endforeach
  </div>

    {{-- <div class="form-group">
        <label for="color">Color</label>
        <select name="color_id" class="form-control" >
            @foreach ($color as $col)
            <option value="{{$col->id}}">{{$col->name}}</option>
            @endforeach
        </select>
    </div> --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="">
        </div>
        <div class="form-group">
            <label for="price">PRice</label>
            <input type="number" class="form-control" name="price" id="">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
<textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="">
        </div>
<input type="submit" value="Create" class="btn btn-success" name="" id="">


</form>
@endsection
