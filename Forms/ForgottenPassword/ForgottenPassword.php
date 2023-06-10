
<?php
session_start();
include '../../Home/db_connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 20; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

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
	$newpass = randomPassword();
    $mail->Body = "Use this password to log in and make a new one: " . $newpass;

    $mail->send();
	$newpass = password_hash($newpass, PASSWORD_BCRYPT);
	$newpass = mysqli_real_escape_string($connection, $newpass);
	$usermail = $_POST["mail"];
	
	$sql = "SELECT * FROM students WHERE mail='$usermail'";
	$result = mysqli_query($connection, $sql);
	$tableName = "none";
	
	if(mysqli_num_rows($result) > 0)
	{
		$tableName = "students";
	}
	else
	{
		$sql = "SELECT * FROM parents WHERE mail='$usermail'";
		$result = mysqli_query($connection, $sql);
		
		if(mysqli_num_rows($result) > 0)
		{
			$tableName = "parents";
		}
		else
		{
			$sql = "SELECT * FROM teachers WHERE mail='$usermail'";
			$result = mysqli_query($connection, $sql);
			
			if(mysqli_num_rows($result) > 0)
			{
				$tableName = "teachers";
			}
		}
	}
	
	if($tableName != "none")
	{
		$sql = "UPDATE " . $tableName . " SET password = '" . $newpass . "' WHERE mail = '" . $_POST["mail"] . "'";
		$result = mysqli_query($connection, $sql);
		
		echo "
      <script>
      alert('The email has been sent successfully.');
	  document.location.href = '../LoginForm/Login_form.php';
      </script>
    ";
	}
  }
}catch(Exception $e){
  echo "error";
}
?>
