<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Ajax Request example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

    <div class="container">
        <h1>Laravel 8 Ajax Request example</h1>

        <form id='area_selector'>
          <div id="success-message">

          </div>
          <div class="form-group">
        <label for="name">All Addresses</label>
        <select name= "address_id" id = "address_id" class="form-control">
          @foreach($addresses as $address)
            <option value="{{$address->id}}">{{$address->id}} - {{$address->address}}</option>
          @endforeach
        </select>
      </div>

                <button class="btn btn-success btn-submit">Edit Address</button>


        </form>
    </div>


    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit your address:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <form name = "edit_address" id = "edit_address">
                <div id = "ajax-response">
                  <div id = 'all-areas'>
                    <label for="name">Area:</label>
                    <div id = 'current_area'>
                    <select name= "area_id" id = "area_id" class="form-control">

        </div>
        @foreach($areas as $area)
          <option value="{{$area->id}}">{{$area->id}} - {{$area->name}}</option>
        @endforeach
      </select>
    </div>
              </form>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-submit2">Save changes</button>
          </div>
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



</body>
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();
        var formData = $('#area_selector').serialize();

        $.ajax({
           type:'POST',
           url:"{{ url('ajaxRequest') }}",
           data: formData,
           success:function(data, response)
           {

              console.log(data);
              let current_area_id = data.current_area.id;
              let current_area_name = data.current_area.name;
              let current_area_div = $(
                '<option value="' + current_area_id +'" selected hidden>' + current_area_id + ' - ' + current_area_name + '</option>'
              );
              let address = data.addresses.address;
              let address_id = data.addresses.id;
              let area = data.current_area.name;
              let form = $(
                '<label for="exampleInputEmail1" id="address_label">Address</label>' +
                '<input type="text" id="address" value ="' + address + '" name="address" class="form-control">' +
                '<input type="hidden" id="address_id" name="address_id" value="' + address_id + '">'
              );
              $('#area_id').prepend(current_area_div);
              $('#ajax-response').prepend(form);
              $("#exampleModal").modal('show');

              //clean up on button close
              $(".btn-close").click(function(e){
                  console.log("Close function works")
                  $("#exampleModal").modal('hide');

                  $("#address").remove();
                  $("#address_label").remove();
              });

              $(".btn-submit2").click(function(e){
                  console.log("Submit function works.")
                  e.preventDefault();
                  var updated_address = $('#edit_address').serialize();
                  console.log (updated_address);
                  $.ajax({
                     type:'POST',
                     url:"{{ url('ajaxRequest-2') }}",
                     data: updated_address,
                     success:function(data, response) {

                       $("#exampleModal").modal('hide');
                       $("#address").remove();
                       $("#address_label").remove();
                       $("#success-message").replaceWith('<p>Your address has been updated successfully! </p>');
                       $( "#area_selector" ).load(window.location.href + " #area_selector" ); //this will break the button once

                     }
                   });
              });

           }
        });

    });
</script>
