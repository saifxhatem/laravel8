<!DOCTYPE html>
<html>
<head>
    <title>List all addresses</title>
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

  <div id= "app">
    <router-link to="/foo">Go to Foo</router-link>
    <router-link to="/bar">Go to Bar</router-link>
    <router-link to="/fetchaddr">Get Address by ID</router-link>
    <router-link to="/fetchaddr">Fetch Address 5;</router-link>
    <router-view :address_id="5"></router-view>

  </div>
</div>
<script src = "{{ mix('js/app.js') }}"> </script>
</body>
</html>
