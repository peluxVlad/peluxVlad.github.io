<?php 
if( $_POST){

  require 'phpmailer.php';
  require 'smtp.php';
  
$mail = new PHPMailer;
$mail->isSMTP();

// Настройки
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->CharSet = 'UTF-8';
  $mail->Username = 'dsadassadasdasdas@gmail.com'; // логин от вашей почты
  $mail->Password = 'aopmaks12'; // пароль от почтового ящика
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->From = 'info@gmail.com '; // адрес почты, с которой идет отправка
  $mail->FromName = 'Сообщение с gmail.com'; // имя отправителя
  $mail->addAddress('info@gmail.com');
 
 // Прикрепление файлов
  for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
        $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name'][$ct]));
        $filename = $_FILES['userfile']['name'][$ct];
        if (move_uploaded_file($_FILES['userfile']['tmp_name'][$ct], $uploadfile)) {
            $mail->addAttachment($uploadfile, $filename);
        } else {
            $msg .= 'Failed to move file to ' . $uploadfile;
        }
    }
 
// Письмо
$mail->isHTML(true);
$mail->Body = "Имя: {$_POST['name']}<br> Телефон: {$_POST['nomer']}<br> Email: {$_POST['email']}<br> Сообщение: " . nl2br($_POST['body']);
$mail->AltBody = "Имя: {$_POST['name']}\r\n Телефон: {$_POST['nomer']}\r\n Email: {$_POST['email']}\r\n Сообщение: {$_POST['body']}";
// $mail->SMTPDebug = 0;

  if( $mail->send() ){
    $answer = '1';
  }else{
    $answer = '0';
    echo 'Письмо не может быть отправлено. ';
    echo 'Ошибка: ' . $mail->ErrorInfo;
  }
  die( $answer );

?>


