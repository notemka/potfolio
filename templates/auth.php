<?php
//session_start();
//require_once '../config.php';
//header('Content-Type: aplication-json');
//
//$data = array();

//if($_SERVER['REQUEST_METHOD'] == 'POST'){
//
//	$login = clear_str($_POST['login']);
//	$password = md5($_POST['password']);
//
//	$sql = "SELECT COUNT(users.id) as count FROM users WHERE login = '{$login}' AND password = '{$password}'";
//	$dbcon = connectToDB();
//	$check_user = getDataAsArray($dbcon, $sql);
//	$is_admin = $check_user[0]['count'];
//
//	if($is_admin){
//		$_SESSION['auth'] = true;
//		$data['status'] = 'OK';
//		$data['mes'] = "Добро пожаловать";
//	} else{
//		$data['status'] = "NO";
//		$data['mes'] = "Такого пользователя в системе нет";
//	}
//} else{
//	$data['status'] = "NO";
//	$data['mes'] = "Ошибка при обращении к файлу";
//}
//echo json_encode($data);
//exit;
//?>
<!doctype html>
<html lang="ru-RU">
<?php require_once 'head.php'; ?>
<body>
<div class="wrapper clearfix">
	<div class="form-wrapper">
		<form action="POST" class="authorization-form" id="form">
			<h2 class="form-title">Авторизируйтесь</h2>
			<label class="login" for="input-login">Логин</label>
			<input type="text" id = "input-login" class="login-field" data-validation="user-name" placeholder = "Введите логин">
			<label class="password" for="input-password">Пароль</label>
			<input type="password" id = "input-password" class="password-field" data-validation="user-email" placeholder = "Введите пароль">
			<input type="submit" class="enter-btn" value = "Войти">
		</form>
	</div>
</div>
<?php require_once 'footer.php'; ?>

