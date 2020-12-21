<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
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
      Register
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-data-registration')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" id="title" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input type="password" id="title" name="password" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="text" id="title" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
