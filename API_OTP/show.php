<?php
session_start();

$otp = rand(100000, 999999);

$_SESSION["opt"] = $otp;

$fields = array(
    "sender_id" => "CHKSMS",
    "message" => "2",
    "variables_values" => $otp,
    "route" => "s",
    "numbers" => $_POST['mobile'],
);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($fields),
    CURLOPT_HTTPHEADER => array(
        "authorization:jfTF9kUteOhuXxQob4iYlwnaPZC2zSGBsM6rRVL035p8yqKE1JoCEzKQ4cjfI6d09FVeSJ8TbZ7NkOts",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo "<h1>OTP Sent To Your Number :".$_POST['mobile']."</h1>";
}


if (isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['mobile'])  ) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    

    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["mobile"] = $mobile;

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<body>



    <form method="POST" action="success.php" id="myform">

        <div class="form-group">

            <label for="exampleotp">Enter OTP</label>

            <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter otp">

        </div>

        <button class="btn btn-primary" id="submit">Submit</button>


    </form>

   

</body>

</html>