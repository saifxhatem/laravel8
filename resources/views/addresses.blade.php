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
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Insert Address and UID
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-data')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input type="text" id="title" name="address" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">User_ID</label>
          <input type="number" id="title" name="user_id" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
