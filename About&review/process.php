<?php

session_start();

if (isset($_POST['submit'])){
    $type = $_POST["type"];
    $numPeople = $_POST["numPeople"];
    $numAdult = $_POST["numAdult"];
    $numChildren = $_POST["numChildren"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $tex = $_POST["tex"];
    $userID=$fname.$lname;


    $_SESSION['type']=$type;
    $_SESSION['numPeople']=$numPeople;
    $_SESSION['numAdult']=$numAdult;
    $_SESSION['numChildren']=$numChildren;
    $_SESSION['userID']=$userID;
    $_SESSION['email']=$email;
    $_SESSION['phone_number']=$phone_number;
    $_SESSION['tex']=$tex;

    $filename='users.txt';
    if(file_exists($filename)){
        $handle = fopen('users.txt', 'a+');
        $str_userID = fwrite($handle, $userID." ");
        $str_email = fwrite($handle, $email." ");
        $str_numPeople = fwrite($handle, $numPeople." ");
        $str_numAdult = fwrite($handle, $numAdult." ");
        $str_numChildren = fwrite($handle, $numChildren." ");
        $str_phonenumber = fwrite($handle, $phone_number." ");
        $str_tex = fwrite($handle, $tex." ");
    }
    fclose($handle);
}
?>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailerTemplate/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
//    $mail->SMTPDebug = 1;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.net';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'caozehui163@gmail.com';                     // SMTP username
    $mail->Password   = 'czh1998915';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('caozehui163@gmail.com', 'Zehui Cao');
    $mail->addAddress('caozehui163@gmail.com');     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');
    $body = '<p>Dear <span style="background-color: yellow">Zehui Cao</span> </p>
<p>&nbsp&nbsp&nbsp&nbsp&nbsp <span>We have already received your request, we will find an expert to help and reply to you as soon as possible</span></p><br><br><p>Best regards,</p><br><p>Sunshine Travel Agency</p>';



    // Attachments
//    $mail->addAttachment("file.txt", "File.txt");
//    $mail->addAttachment("img/logo.png");

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $body;
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Process</title>
    <link rel="stylesheet" href="styleProcess.css">
</head>
<body>
<form action="Rate.html" class="container">
    <fieldset class="fieldset">
    <table class="table">
        <tr>
            <h1 class="h1">We have successfully received your message!</h1>
        </tr>

        <tr>
            Your submitted information as follows:
        </tr>
        <br><br>
        <tr>
            Type of information: <?php echo $_POST['type'];?>
        </tr>
        <br><br>
        <tr>
            Number of people: <?php echo $_POST['numPeople'];?>
        </tr>
        <br><br>
        <tr>
            Number of Adult: <?php echo $_POST['numAdult'];?>
        </tr>
        <br><br>
        <tr>
            Number of Children: <?php echo $_POST['numChildren'];?>
        </tr>
        <br><br>
        <tr>
            User name: <?php echo $_POST['fname'];?> &nbsp; <?php echo $_POST['lname'];?>
        </tr>
        <br><br>
        <tr>
            User email: <?php echo $_POST['email'];?>
        </tr>
        <br><br>
        <tr>
            User phone number: <?php echo $_POST['phone_number'];?>
        </tr>
        <br><br>
        <tr>
            User comments: <?php echo $_POST['tex'];?>
        </tr>
        <br><br>
        <tr>
            <button type="submit">Confirmed</button>
        </tr>
    </table>
    </fieldset>
</form>

</body>
</html>


