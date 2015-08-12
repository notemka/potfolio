<?php
session_start();

require_once '../phplibs/autoload.php';
require_once '../phplibs/phpmailer/phpmailer/language/phpmailer.lang-ru.php';
require_once '../phplibs/phpmailer/phpmailer/PHPMailerAutoload.php';
require_once '../config.php';

$answer = array();
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == "POST"){

	$ip = $_SERVER['REMOTE_ADDR'];
	$capcha = $_POST['g-recaptcha-response'];

	$my_email = 'emma.saitgaraeva@gmail.com';

	$name = clear_str($_POST['name']);
	$email = clear_str($_POST['email']);
	$message = clear_str($_POST['message']);


	if(empty($name) || empty($email) || empty($message)) {
		$answer = 'Заполните все поля';
//	}
//	if else(!check_captcha(SECRET_KEY, $capcha, $ip)){
//		$answer = 'Вы не правильно вввели капчу';
	}else {
		$mail = new PHPMailer();
		$mail->isSendMail();
		$mail->CharSet = 'UTF-8';
		$mail->setFrom($email, $name);
		$mail->addAddress($my_email, 'Эмме Хайруллиной');
		$mail->Subject = 'Сообщение с сайта портфолио';
		$mail->msgHtml('Письмо от: '.$name.'<br>email: '.$email.'<br>Сообщение: '.$message);

		$mail->send();

		if($mail->send()){
			$answer['message'] = 'OK';
		} else {
			$answer['message'] = "ERROR";
		}
	}
}
echo json_encode($answer);
exit;
?>