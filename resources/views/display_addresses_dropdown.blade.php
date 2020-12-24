<!DOCTYPE html>
<html>
<head>
    <title>List All Addresses</title>
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
      <div class="card-body">
        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('edit-address')}}">
         @csrf
          <div class="form-group">
        <label for="name">All Addresses</label>
        <select name= "address_id" class="form-control">
          @foreach($addresses as $address)
            <option value="{{$address->id}}">{{$address->id}} - {{$address->address}}</option>
          @endforeach
        </select>
      </div>
          <button type="submit" class="btn btn-primary">Edit Address</button>
        </form>
    </div>

    </div>
  </div>
</div>
</body>
</html>
