<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      .error-msg{
          background: #f2dedf;
          color: #9c4150;
          border: 1px solid #e7ced1;
      }
      .success-msg{
          background: #e0efda;
          color: #407a4a;
          border: 1px solid #c6dfb2; 
      }
      .process-msg{
          background: #d9edf6;
          color: #377084;
          border: 1px solid #c8dce5; 
      }
  </style>
</head>
<body style="margin-top: 97px;">

<div class="container">

<form id="submit_form">
  <div class="form-group row">
    <label for="fullname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="age" class="col-sm-2 col-form-label">Age</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="age" name="age" placeholder="Age">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" value="male">
          <label class="form-check-label">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" value="female">
          <label class="form-check-label">
            Female
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <label for="inputcountry" class="col-sm-2 col-form-label">Country</label>
    <div class="col-sm-10">
      <select name="country" class="form-control">
      <option value="">Select Country</option>
        <option value="ind">India</option>
        <option value="pk">Pakistan</option>
        <option value="ne">Nepal</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button id="submit" type="button" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<div id="response"></div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            // alert("Alert");
            var name = $('#fullname').val();
            //alert(name);
            var age = $('#age').val();
            //alert(age);
            if(name == "" || age == "" || !$('input:radio[name=gender]').is(':checked')){
               // alert("Alert");
               $('#response').fadeIn();
               $('#response').removeClass('success-msg').addClass('error-msg').html('All fields are required..!');
            } else {
                // alert("Alert US");
                // $('#response').html($('#submit_form').serialize());
                $.ajax({
                    url: "save_form.php",
                    type: "POST",
                    data: $('#submit_form').serialize(),

                    beforeSend: function(){
                        $('#response').fadeIn();
                        $('#response').removeClass('success-msg error-msg').addClass('process-msg').html('Loading response..!'); 
                    },

                    success: function(data){
                        $('#submit_form').trigger("reset");
                        $('#response').fadeIn();
                        $('#response').removeClass('error-msg').addClass('success-msg').html(data);

                        setTimeout(function(){
                            $('#response').fadeOut("slow");
                        },4000);
                    }
                });
            }
        });
    });
</script>

</body>
</html>
