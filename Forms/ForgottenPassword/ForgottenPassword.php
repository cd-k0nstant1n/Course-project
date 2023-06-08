
<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

try{
if (isset($_POST['submit'])) {
  $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ednevnikbg@gmail.com'; // Replace with your Gmail email address
    $mail->Password = 'llkbyfuqywzzwrhp'; // Replace with your Gmail password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('ednevnikbg@gmail.com'); // Replace with your Gmail email address

    $mail->addAddress($_POST["mail"]);

    $mail->isHTML(true);

    $mail->Subject = "Forgotten password in E-dnevnikbg";
    $mail->Body = " ";

    $mail->send();

    echo "
      <script>
      alert('The email has been sent successfully.');
      </script>
    ";
  }
}catch(Exception $e){
  echo "error";
}
?>
