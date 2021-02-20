<?php
session_start();

$otp = rand(100000, 999999);

$_SESSION["opt"] = $otp;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    #otpform {
      display: none;
    }
  </style>
</head>

<body>

  <div class="container">



    <h2 class="card-title">Registration Form</h2>

    <form method="POST" action="" id="myform">

      <div class="form-group">
        <label for="exampleInputName">Enter Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">

      </div>


      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">

      </div>


      <div class="form-group">
        <label for="exampleInputMobile">Mobile Number</label>
        <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
      </div>




      <button class="btn btn-primary" id="submit">Submit</button>


    </form>



    <form method="POST" action="" id="otpform">

      <div class="form-group">
        <label for="exampleInputOtp">OTP</label>
        <input type="number" class="form-control" id="otpp" name="otpp" placeholder="OTP">
      </div>

      <button class="btn btn-primary" id="submitotp">Submit</button>


    </form>


    <h1 id="status"></h1>

    <h4></h4>

  </div>


  <script>

    let ottp;


    $(document).ready(function() {


      $("#submit").on('click', function(e) {
        e.preventDefault();

        let otp = Math.floor(100000 + Math.random() * 900000);
        let name = $("#name").val();
        let email = $("#email").val();
        let mobile = $("#mobile").val();



        $("#otpform").css({
          "display": "block"
        });

        $("#status").text("Waiting...");
        $.ajax({
          url: "show.php",
          type: "POST",
          data: {
            "mobile": mobile,
            "otp": otp,
            "ajx": 1,
          },
          success: function(response) {
            if (response != 0) {
              let jsonData = JSON.parse(response);

              ottp = jsonData.otp;
              console.log(jsonData);

            } else {
              $("#status").text("Failed enter full details...");
              $("#status").show();

            }
          }


        });
      });


    });

    $("#submitotp").on('click', function(e) {
      e.preventDefault();

      let otpp = $("#otpp").val();
      let name = $("#name").val();
      let email = $("#email").val();
      let mobile = $("#mobile").val();

      $.ajax({
        url: "show.php",
        type: "POST",
        data: {
          "ottp": ottp,
          "otpp": otpp,
          "ajx": 0,
        },

        success: function(response) {

          if (response != 0) {

            let jsonData = JSON.parse(response);

           


            $("h4").html("Name :: " + name + " <br>" + "Email :: " + email + " <br>" + "Mobile Number :: " + mobile + " <br>");

            $("#status").text("Registered Successfully...");

          } else {

            $("#status").text("Failed ...");
            $("#status").show();

          }
        }


      });





    });
  </script>


</body>

</html>