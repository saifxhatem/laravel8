<!DOCTYPE html>
<html>
<head>
    <title>Edit Address</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

  @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif

  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Edit this address
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('update-address')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          {{$addresses->id}}
          <input type="text" id="title" value = "{{$addresses->address}}" name="address" class="form-control">
            <input type="hidden" id="custId" name="address_id" value="{{$addresses->id}}">
        </div>
        <div class="form-group">
    <label for="name">Area</label>
    <select name= "area_id" class="form-control">
      <option value="{{$current_area->id}}" selected hidden> {{$current_area->id}} - {{$current_area->name}}</option>
      @foreach($areas as $area)
        <option value="{{$area->id}}">{{$area->id}} - {{$area->name}}</option>
      @endforeach
    </select>
  </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
