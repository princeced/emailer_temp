<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">



    <h2 class="card-title">Registration Form</h2>

    <form method="POST" action="" id="myform">

      <div class="form-group">
        <label for="exampleInputName">Enter Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required />
       
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required />

      </div>


      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
       
      </div>


      <div class="form-group">
        <label for="exampleInputSubject">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required />
        
      </div>

      <div class="form-group">
        <label for="comment">Comments</label>
        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
        
      </div>


      <button type="submit" class="btn btn-primary" id="submit">Submit</button>


    </form>


  </div>

  <h2 id="status"></h2>

  <h4 id="details"></h4>

  <script>
    $(document).ready(function() {
      $("#myform").on('submit', function(e) {
        
        e.preventDefault();
        
      if($("#name")==""){
        $('#error').text("Required");
      }

          $("#status").text("Waiting...");
          $.ajax({
            url: "student.php",
            type: "POST",
            data: $('#myform').serialize(),
            success: function(response) {
              if (response != 0) {
                let jsonData = JSON.parse(response);

                $("h4").html("Name ::" + jsonData.name + " <br>" + "Email ::" + jsonData.email + " <br>" + "Password ::" + jsonData.password + " <br>" + "Subject ::" + jsonData.subject + " <br>" + "Comment ::" + jsonData.comment + " <br>");

                $("#status").hide();
              } else {
                $("#status").text("Failed enter full details...");
                $("#status").show();

              }
            }



          });
        
      });

    });
  </script>




</body>

</html>