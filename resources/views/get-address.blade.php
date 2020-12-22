<!DOCTYPE html>
<html>
<head>
    <title>Retrieve Addresses by User ID</title>
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
      Retrieve Addresses by User ID
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('do-get-address')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">User ID</label>
          <input type="text" id="title" name="user_id" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
