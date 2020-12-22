<!DOCTYPE html>
<html>
<head>
    <title>Insert Address Form</title>
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
      Choose your name to insert your address
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-data')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input type="text" id="title" name="address" class="form-control">
        </div>
        <div class="form-group">
      <label for="name">Users</label>
      <select name= "user_id" class="form-control">
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->id}} - {{$user->name}}</option>
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
