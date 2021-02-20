
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

    <form method="POST" action="show.php" id="myform">

    <div class="form-group">
    <label for="exampleInputName">Enter Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>

  </div>


  <div class="form-group">
    <label for="exampleInputMobile">Mobile Number</label>
    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
  </div>




  <button type="submit"  class="btn btn-primary" id="submit" >Submit</button>


</form>


</div>

<?php
if( !empty( $_REQUEST['Message'] ) )
                {
                    echo sprintf( '<h1>%s</h1>', $_REQUEST['Message'] );
                    
                }

                ?>
</body>
</html>