<!DOCTYPE html>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendMail() {
  // https://github.com/PHPMailer/PHPMailer/blob/master/examples/gmail.phps
  $mail = new PHPMailer;
  $mail->isSMTP();
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->SMTPAuth = true;

  $mail->Username = '4d.garcia6@gmail.com';
  $mail->Password = file_get_contents('../secret.json');

  $mail->setFrom('4d.garcia6@gmail.com', 'Pablo García');
  $mail->addAddress('4d.garcia6@gmail.com');
  $mail->Subject = 'PHPMailer GMail SMTP test';
  $mail->Body = $_POST['name'];

  $success = $mail->send();

  $arr = ['sent' => $success];
  if (!$success) $arr['error'] = $mail->ErrorInfo;

  return $arr;
}

$sent; $error;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $arr = sendMail();
  $sent = $arr['sent'];
  $error = $arr['error'];
}

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="contact.php" method="post">
      <div>
        <label for="name">Enter your name:</label>
        <input id="name" type="text" name="name">
      </div>
      <div>
        <button type="submit">Submit</button>
      </div>
    </form>
    <div>
      <?php if ($sent === true) : ?>
        <p>Email sent!</p>
      <?php elseif ($sent === false) : ?>
        <p><?= 'Mailer Error: ' . $error; ?></p>
      <?php endif; ?>
    </div>
  </body>
</html>