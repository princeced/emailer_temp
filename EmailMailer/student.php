<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;

require_once "Mailer/PHPMailer.php";
require_once "Mailer/SMTP.php";
require_once "Mailer/Exception.php";



if (isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['password'])  && isset($_POST['subject']) && isset($_POST['comment'])) {

    $otp = rand(100000, 999999);

    $_SESSION["opt"] = $otp;
    

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $subject = $_POST['subject'];
    $comment = $_POST['comment'];


    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "";
    $mail->Password = ;
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addaddress($_POST['email']);

    $mail->Subject = ("Get Ready");
    $mail->Body = 'Your OTP ' . $_SESSION["opt"];

    $mail->send();
}



$_SESSION["name"]=$name;
$_SESSION["email"]=$email;
$_SESSION["password"]=$password;
$_SESSION["subject"]=$subject;
$_SESSION["comment"]=$comment;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>

<h1>OTP Sent Successfully To Your MailId:<?php echo $_SESSION["email"]=$email; ?></h1>

    <form method="POST" action="show.php" id="myform">

        <div class="form-group">

            <label for="exampleotp">Enter OTP</label>

            <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter otp">

        </div>

        <button class="btn btn-primary" id="submit">Submit</button>


    </form>

    <?php

if( !empty( $_REQUEST['Message'] ) )

                {
                    echo sprintf( '<h2>%s</h2>', $_REQUEST['Message'] );
                    
                }

                ?>
</body>

</html>
