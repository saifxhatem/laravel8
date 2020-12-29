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
      User's Addresses: <br>
      @foreach ($addresses as $address)
        <tr>
        <td>{{ $address->address }}<br></td>

        </tr>
      @endforeach
    </div>
    {{ $addresses->links() }}






    </div>
  </div>
</div>
</body>
</html>
