<?php 

$name = $_POST['user_name'];
$mail = $_POST['user_mail']; 

if( $_POST){

  require 'mail.php';
  require 'smtp.php';
  
$mail = new PHPMailer;
$mail->isSMTP();
$mail->CharSet = 'utf-8'

// Настройки
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'dsadassadasdasdas@gmail.com'; 
  $mail->Password = 'aopmaks12'; 
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->setFrom('info@gmail.com'); 
  $mail->addAddress('dsadassadasdasdas@gmail.com');

$mail->isHTML(true);
$mail->Subject = 'ssaddas';
$mail->Body = '
	Польв отпар сообщения <br>
	Имя: ' . $name . ' <br>
	Почта: ' . $mail . '';
$mail->AltBody = 'dsaddas';

  if(!$mail->send() ){
    echo 'Письмо не может быть отправлено. ';
    echo 'Ошибка: ' . $mail->ErrorInfo;
 } else{
   	echo "Отправлено"; 
      }
?>


